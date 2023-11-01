<?php

namespace App\Livewire\App\Auth;

use App\Models\Shop;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginComponent extends Component
{
    public $email, $password;
    public $first_name, $last_name, $confirm_password, $account_type = 'private', $agree_checkbox, $phone, $otp, $generated_otp;

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

                if ($this->refer_code) {
                    $ref_user = User::where('referral_code', $this->refer_code)->first();
                    $usr->referred_by = $ref_user->id;
                }

                $usr->save();

                Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);

                session()->flash('success', 'Registration Successful');
                return redirect()->route('app.home');
            }
        } else {
            session()->flash('agree_error', 'Must agree to terms and conditions');
        }
    }

    public function forgetPassword()
    {
        $this->validate([
            'phone' => 'required',
        ]);

        $getUser = User::where('phone', $this->phone)->first();

        if($getUser){
            $otp = rand(10000,99999);

            $getUser->verification_code = $otp;
            $getUser->save();

            //function to send sms/email
            $this->generated_otp = $otp;

            $this->dispatch('code_sent');

        } else {
            session()->flash('phone_user_error', 'Invalid phone number');
        }
    }

    public function submitOtp()
    {
        // $this->validate([
        //     'otp' => 'required',
        // ]);

        dd($this->otp);

        $getUser = User::where('phone', $this->phone)->first();

        if($getUser->verification_code == $this->otp){
            session()->flash('otp_success', 'Otp Verified. redirecting to update password page...');
        } else {
            session()->flash('otp_error', 'Invalid code');
        }
    }

    public function render()
    {
        return view('livewire.app.auth.login-component')->layout('livewire.app.layouts.base');
    }
}
