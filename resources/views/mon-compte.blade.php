@extends('template')

@section('monCompte')
@if(session('bien_changer'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('bien_changer')}}
    </div>
@endif
    <div class='container mt-3'>
        <h3 class='text-center'>Mon compte : {{auth()->user()->username}}</h3>
        <h4 class='text-center'>Adresse mail : {{auth()->user()->email}}</h4>
        <div class='mt-5 col'>
    </div>

    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#modifie_password" aria-expanded="false" aria-controls="modifie_password">
    Changer le mot de passe
    </button>

    <div class="collapse {{ $errors->first('password') == true || $errors->first('confirmation_password') == true  ? 'show' : ''}}  mt-3" id="modifie_password">
        <div class="card card-body bg-secondary">
            <form action="./mon-compte" method="post">
            @csrf
            <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
                <label for="password">Nouveau mot de passe</label>
                <input type="password" name='password' class="form-control">
                @if($errors->first('password'))
                <p class='text-danger'>{{$errors->first('password')}}</p>
                @endif
            </div>
            <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
                <label for="password_confirmation"> Retaper le nouveau mot de passe</label>
                <input type="password" name='password_confirmation' class="form-control">
                @if($errors->first('password_confirmation'))
                    <p class='text-danger'>{{$errors->first('password_confirmation')}}</p>
                @endif
            </div>
            <div class='col-md-8 col-lg-6 col-xl-6 m-auto'>
                <div class='mt-3'>
                    <button type="submit" class='btn btn-primary'>Confirmer</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
