<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class AccueilController extends Controller
{
    public function accueil(){
        //var_dump(auth()->guest());
        if(auth()->guest() === true){
            return redirect('/create');
        }
    }

    public function off(){
        auth()->logout();
        return redirect('./welcome')->with('deconnexion','Vous êtez bien deconnecté');
    }

}
