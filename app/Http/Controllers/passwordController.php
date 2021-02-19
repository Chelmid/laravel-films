<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

class passwordController extends Controller
{
    public function changerPassword(){

        if(auth()->guest()){
            return redirect('./login')-> with('connecter','Vous devez vous connectez pour continuer');
        }

        request()->validate([
            'password' => ['required','confirmed','min:8'],
            'password_confirmation' => ['required']
        ]);

        auth()->user()->update([
            'password_confirmation' => request('password_confirmation'),
        ]);
    }
}
