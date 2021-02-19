@extends('template')

@section('mot_de_passe_new')

@if(session('trouverMail'))
<div class="alert alert-success text-center" role="alert">
        {{session('trouverMail')}}
    </div>
@endif

<form action="/login-MDPO-new-{{request('email')}}" method="post" class='d-flex'>
    @csrf
    <div class='container mt-3 field'>
        <h2 class='text-center'>Nouveau Mot de passe</h2>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            <label for="password">Nouveau Mot de passe</label>
            <input type="password" class='form-control' name='password' value="{{ old('email')}}">
            @if($errors->first('password'))
                <p class='text-danger'>{{$errors->first('password')}}</p>
            @endif
        </div>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            <label for="password_confirmation">Retapez le nouveau mot de passe</label>
            <input type="password" class='form-control' name='password_confirmation' value="{{ old('email')}}">
            @if($errors->first('password_confirmation'))
                <p class='text-danger'>{{$errors->first('password_confirmation')}}</p>
            @endif
        </div>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            <div class='mt-4'>
            <input class="form-control btn-primary" type="submit" value='Confirmer'>
            </div>
        </div>
</form>

@endsection
