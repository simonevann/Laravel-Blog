<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;

    public $password;

    public $showLogin = false;

    public $message = 'O_O';

    public function submit()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            $this->addError('message', 'Login successful.');
            $this->showLogin = false;
        } else {
            $this->addError('message', 'Invalid email or password.');
        }
    }

    public function closeModal()
    {
        $this->showLogin = false;
    }

    public function logout()
    {
        Auth::logout();
        $this->showLogin = false;

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
