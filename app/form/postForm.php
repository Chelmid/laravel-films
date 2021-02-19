<?php

namespace App\form;

use Kris\LaravelFormBuilder\Form;

class postForm extends Form
{
    //builder from rules et la construction du formulaire
    public function buildForm()
    {
        $this->add('username','text',[
            'label' => 'username',
            'rules' => ['required','min:3','unique:users'],
            'error_messages' => ['username.required' => '']
        ])
            ->add('email', 'email', [
            'label' => 'email',
            'rules' => ['required','email','unique:users'],
            'error_messages' => ['email.required' => '']
        ])
            ->add('password', 'password',[
                'label' => 'mot de passe',
                'rules' => ['required','min:8','confirmed'],
                'error_messages' => ['password.required' => '']
        ])
            ->add('password_confirmation', 'password',[
                'label' => 'confirmation du mot de passe',
                'rules' => ['required','min:8'],
                'error_messages' => ['password_confirmation.required' => '']
        ])
            ->add("S'enrengistrer", 'submit', [
                'attr' => ['class' => 'btn-primary form-control']
        ]);
    }
}
