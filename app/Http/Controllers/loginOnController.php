<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class loginOnController extends Controller
{

    public function a(){
        return view('mon-compte',['info' => $user]);
    }

    public function dirige(){

    }
}
