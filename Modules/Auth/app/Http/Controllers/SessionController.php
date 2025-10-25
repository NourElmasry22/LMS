<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{
   public function login(Request $request){

      $validated = $request->validate([
         'email' =>'required|email',
         'password'=> 'required|string'
      ]);

      if(Auth::attempt($validated)){
         $request -> session()->regenerate();
        
         return redirect()->route('dashboard')->with('success', 'LoggedIn successful!');
      }

      throw ValidationException::withMessages([
         'credentials' => 'Sorry, incorrect credentials provided.',
      ]);
    
   }

   public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('home')->with('success', 'Logged out successfully!');
   
   }
}
