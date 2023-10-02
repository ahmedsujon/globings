<?php

namespace App\Livewire\App\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginComponent extends Component
{
    public $email, $password;
    public $first_name, $last_name, $confirm_password, $account_type = 'private', $agree_checkbox;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
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
                return redirect()->route('app.index');
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
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if($this->agree_checkbox == 1){
            $user = new User();
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->password = Hash::make($this->password);
            $user->account_type = $this->account_type;
            if($user->save()){
                Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);

                session()->flash('success', 'Registration Successful');
                return redirect()->route('app.index');
            }
        } else {
            session()->flash('agree_error', 'Must agree to terms and conditions');
        }
    }

    public function render()
    {
        return view('livewire.app.auth.login-component')->layout('livewire.app.layouts.base');
    }
}
