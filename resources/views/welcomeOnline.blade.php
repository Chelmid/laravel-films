@extends('template')

@section('utilisateur_on')

@if(session('connecter'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('connecter')}}
    </div>
@endif
    <div class='container mt-3'>
        <h3 class='text-center'>bienvenue {{auth()->user()->username}}</h3>
        <div class='mt-5 col'></div>
    </div>

    <div class='border border-primary container'>
        <h3 class='text-center'>Mise à jour</h3>
        <div>
            <p>- ajouter du contenu dans la page des films et le responsive</p>
            <p>- ajouter d'une bouton qui remonte la page</p>
            <p>- ajouter un system de like et de disliker</p>
        </div>
    </div>

@endsection
