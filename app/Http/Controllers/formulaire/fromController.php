<?php

namespace App\Http\Controllers\formulaire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\form\postForm;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Users;
use App\config\database;

//test builder form

class fromController extends Controller
{
    private $formBuilder;

    //contructor
    public function __construct(FormBuilder $formBuilder){
        $this->formBuilder = $formBuilder;
    }

    //creation du formulaire
    public function create(FormBuilder $formBuilder){
        $form = $this->getForm();
        return view('./create' , compact('form'));
    }

    //validation et envoie du formulaire
    public function store(FormBuilder $formBuilder){
        $form = $this->getForm();
        $form->redirectIfNotValid();
        //dd($form->getFieldValues());

        if(request('username') && request('email') && request('password') && request('password_confirmation') == true){

            $user = new Users;
            $user->username = request('username');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));
            $user->password_confirmation = request('password_confirmation');
            $user->save();

            return redirect('./login')->with('valider', 'Votre compte est bien crée');
        }else{
            return view('email_no_ok');
        }
    }


    public function getForm(){
        return $this->formBuilder->create(postForm::class,[
            'method' => 'POST',
        ]);
    }
}
