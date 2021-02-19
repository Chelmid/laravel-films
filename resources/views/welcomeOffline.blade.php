@extends('template')

@section('bienvenue')

@guest
@if(session('deconnexion'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('deconnexion')}}
    </div>
@endif
@endguest

    <div class='container mt-3'>
        <h3 class='text-center'>Bienvenue sur Monsite de Films et séries</h3>
        <div class='mt-5 col'>
            <h4 class='text-center'>Inscrivez-vous pour voir la suite.</h4>
        </div>
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
