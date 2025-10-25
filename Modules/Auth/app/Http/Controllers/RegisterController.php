<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Users\Mails\WelcomeMail;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            
        ]);
        $user = User::create($validated);
        Mail::to($user->email)->send(new WelcomeMail());
      

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful!');

        
    }
}
