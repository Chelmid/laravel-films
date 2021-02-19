@extends('template')

@section('login')

@if(session('valider'))
    <div class="alert alert-success" role="alert">
        <p class='text-success text-center'>{{ session('valider')}}</p>
    </div>
@endif
@if(session('new_MDP'))
    <div class="alert alert-danger text-center" role="alert">
        {{session('new_MDP')}}
    </div>
@endif
@if(session('changerMDPO_reussi'))
    <div class="alert alert-success text-center" role="alert">
        {{session('changerMDPO_reussi')}}
    </div>
@endif

<form action="./login" method="post" class='d-flex'>
    @csrf
    <div class='container mt-3 field'>
        <h2 class='text-center'>Login</h2>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            <label for="username">Username</label>
            <input type="text" class='form-control' name='username' value="{{ old('username')}}">
            @if($errors->first('username'))
                <p class='text-danger'>{{$errors->first('username')}}</p>
            @endif
        </div>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            <label for="email">Email</label>
            <input type="text" class='form-control' name='email' value="{{ old('email')}}">
            @if($errors->first('email'))
                <p class='text-danger'>{{$errors->first('email')}}</p>
            @endif
        </div>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            <label for="password">Mot de passe</label>
            <input type="password" class='form-control' name='password'>
            @if($errors->first('password'))
                <p class='text-danger'>{{$errors->first('password')}}</p>
            @endif
        </div>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            <a href="./login-MDPO" class='float-right'>Mot de passe oublié ?</a>
        </div>
        <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
            <div class='mt-4'>
            <input class="form-control btn-primary" type="submit" value='Se connecter'>
            </div>
        </div>
    </div>
</form>
@endsection
