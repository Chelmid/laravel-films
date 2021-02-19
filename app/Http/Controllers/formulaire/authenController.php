<?php

namespace App\Http\Controllers\formulaire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;

class authenController extends Controller
{
    private $_info;

    public function afficher(){

        return view('./login');
    }

    //validation du login et des erreurs
    public function traitement() {

        request()->validate([
            'username'=> ['required','min:3'],
            'email' => ['required', 'email'],
            'password' => ['required','min:8']
        ]);

        $resu = auth()->attempt([
            'username' => request('username'),
            'email' => request('email'),
            'password' => request('password')
        ]);
        //dd($resu);

        if($resu === true){
            $this->_info = (Users::where('username', request('username'))->first());
            return redirect('./user/welcome')->with('connecter','Vous étez bien connecté');
        }

        return back()->withInput()->withErrors([
            'password' => 'le mot de passe est incorrect',
        ]);
    }
}
