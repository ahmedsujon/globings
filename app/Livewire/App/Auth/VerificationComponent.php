<?php

namespace App\Livewire\App\Auth;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class VerificationComponent extends Component
{
    public $code;

    public function verifyAccount(){
        $this->validate([
            'code' => 'required'
        ]);

        $verification_code = user()->verification_code;

        if($verification_code == $this->code){
            $user = User::find(user()->id);
            $user->email_verified_at = Carbon::parse(now());
            $user->verification_code = NULL;
            $user->save();

            session()->flash('verification_success');
            return redirect()->route('app.home');
        } else {
            session()->flash('error', 'Invalid verification code');
        }
    }

    public function resendCode(){
        $getUser = User::where('id', user()->id)->first();

        $otp = rand(100000,999999);

        $getUser->verification_code = $otp;
        $getUser->save();

        //function to send sms/email
        $data['email'] = user()->email;
        $data['verification_code'] = $otp;

        Mail::send('emails.account-verification', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject('Account Verification');
        });

        $this->dispatch('resend_success');
    }

    public function render()
    {
        return view('livewire.app.auth.verification-component')->layout('livewire.app.layouts.base');
    }
}
