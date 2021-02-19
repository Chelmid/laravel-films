@extends('template')

    @section('inscription')
    @if(empty(request()))
    <div class="alert alert-danger text-center" role="alert">
        Veuillez remplir les champs vides
    </div>
    @endif

    <div class='container mt-3'>
        <h2 class='text-center'> Inscription</h2>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            {!! form_start($form) !!}
        <div>
            {!! form_row($form->username) !!}
        </div>
        <div>
            {!! form_row($form->email) !!}
        </div>
        <div>
            {!! form_row($form->password) !!}
        </div>
        <div>
            {!! form_row($form->password_confirmation) !!}
        </div>
            {!! form_rest($form) !!}
            {!! form_end($form) !!}
        </div>
    </div>

    @endsection
