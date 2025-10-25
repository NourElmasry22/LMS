<?php

namespace Modules\Auth\Livewire;

use Livewire\Component;

class Login extends Component
{
    public function login()
    {
        return view('auth::livewire.login');
    }
}
