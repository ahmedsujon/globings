<?php

namespace App\Livewire\App\Auth;

use App\Models\Shop;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\BingsHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginComponent extends Component
{
    public $email, $password;
    public $first_name, $last_name, $confirm_password, $account_type = 'private', $agree_checkbox, $phone, $otp, $generated_otp, $refer_code, $forget_password_email, $otp_status = '';

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
    }

    public function userLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $getUser = User::where('email', $this->email)->first();

        if ($getUser) {
            if (Hash::check($this->password, $getUser->password)) {
                Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);

                session()->flash('success', 'Login Successful');
                return redirect()->route('app.home');
            } else {
                session()->flash('error', 'Incorrect email or password');
            }
        } else {
            session()->flash('error', 'Incorrect email or password');
        }
    }

    public function accountType($value){
        $this->account_type = $value;
    }

    public function userRegistration()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($this->refer_code) {
            $ref_user = User::where('referral_code', $this->refer_code)->first();

            if($ref_user) {

                if($this->agree_checkbox == 1){
                    $user = new User();
                    $user->first_name = $this->first_name;
                    $user->last_name = $this->last_name;
                    $user->username = Str::lower($this->first_name).'-'.Str::lower(Str::random(7));
                    $user->email = $this->email;
                    $user->phone = $this->phone;
                    $user->avatar = 'assets/images/avatar.png';
                    $user->password = Hash::make($this->password);
                    $user->account_type = $this->account_type;
                    if($user->save()){
                        if($this->account_type == 'professional'){
                            $shop = new Shop();
                            $shop->user_id = $user->id;
                            $shop->name = $this->first_name . "'s" . ' Shop';
                            $shop->description = '';
                            $shop->profile_image = 'assets/images/placeholder.jpg';
                            $shop->cover_photos = ['assets/images/placeholder-rect.jpg'];
                            $shop->latitude = '';
                            $shop->longitude = '';
                            $shop->address = '';
                            $shop->visited = 0;
                            $shop->save();
                        }

                        $usr = User::find($user->id);
                        $usr->referral_code = 'GL-' . $user->id . Str::upper(Str::random(7));
                        $usr->referred_by = $ref_user->id;
                        $usr->save();

                        $bings = rand(10, 15);
                        $ref_user->total_bings += $bings;
                        $ref_user->bings_balance += $bings;
                        $ref_user->save();

                        $bings_history = new BingsHistory();
                        $bings_history->user_id = $ref_user->id;
                        $bings_history->bings_for = 'Refer a friend';
                        $bings_history->description = 'You referred your friend';
                        $bings_history->bings = $bings;
                        $bings_history->type = 'referral';
                        $bings_history->status = 1;
                        $bings_history->save();

                        Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);

                        session()->flash('success', 'Registration Successful');
                        return redirect()->route('app.home');
                    }
                } else {
                    session()->flash('agree_error', 'Must agree to terms and conditions');
                }

            } else {
                session()->flash('ref_error', 'Invalid referral code!');
            }
        } else {
            if($this->agree_checkbox == 1){
                $user = new User();
                $user->first_name = $this->first_name;
                $user->last_name = $this->last_name;
                $user->username = Str::lower($this->first_name).'-'.Str::lower(Str::random(7));
                $user->email = $this->email;
                $user->phone = $this->phone;
                $user->avatar = 'assets/images/avatar.png';
                $user->password = Hash::make($this->password);
                $user->account_type = $this->account_type;
                if($user->save()){
                    if($this->account_type == 'professional'){
                        $shop = new Shop();
                        $shop->user_id = $user->id;
                        $shop->name = $this->first_name . "'s" . ' Shop';
                        $shop->description = '';
                        $shop->profile_image = 'assets/images/placeholder.jpg';
                        $shop->cover_photos = ['assets/images/placeholder-rect.jpg'];
                        $shop->latitude = '';
                        $shop->longitude = '';
                        $shop->address = '';
                        $shop->visited = 0;
                        $shop->save();
                    }

                    $usr = User::find($user->id);
                    $usr->referral_code = 'GL-' . $user->id . Str::upper(Str::random(7));
                    $usr->save();

                    Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);

                    session()->flash('success', 'Registration Successful');
                    return redirect()->route('app.home');
                }
            } else {
                session()->flash('agree_error', 'Must agree to terms and conditions');
            }
        }

    }

    public function forgetPassword()
    {
        $this->validate([
            'forget_password_email' => 'required|email',
        ]);

        $getUser = User::where('email', $this->forget_password_email)->first();

        if($getUser){
            $otp = rand(100000,999999);

            $getUser->verification_code = $otp;
            $getUser->save();

            //function to send sms/email
            $data['email'] = $this->forget_password_email;
            $data['verification_code'] = $otp;

            Mail::send('emails.reset-password', $data, function ($message) use ($data) {
                $message->to($data['email'])
                    ->subject('Reset Password');
            });

            $this->otp_status = '';
            $this->dispatch('code_sent');

        } else {
            session()->flash('phone_user_error', 'Invalid email address');
        }
    }

    public function resendCode()
    {
        $getUser = User::where('email', $this->forget_password_email)->first();

        $otp = rand(100000,999999);

        $getUser->verification_code = $otp;
        $getUser->save();

        //function to send sms/email
        $data['email'] = $this->forget_password_email;
        $data['verification_code'] = $otp;

        Mail::send('emails.reset-password', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject('Reset Password');
        });

        session()->flash('resend_success');
    }

    public function submitOtp()
    {
        $this->validate([
            'otp' => 'required',
        ]);

        $getUser = User::where('email', $this->forget_password_email)->first();

        if($getUser->verification_code == $this->otp){
            $this->otp = '';
            $this->otp_status = 'verified';
        } else {
            session()->flash('otp_error', 'Invalid code');
        }
    }

    public $new_password, $confirm_new_password;
    public function changePassword()
    {
        $this->validate([
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password'
        ]);

        $user = User::where('email', $this->forget_password_email)->first();
        $user->password = Hash::make($this->new_password);
        $user->save();

        $this->forget_password_email = '';
        $this->new_password = '';
        $this->confirm_new_password = '';
        $this->dispatch('password_updated');
    }

    public function render()
    {
        return view('livewire.app.auth.login-component')->layout('livewire.app.layouts.base');
    }
}
