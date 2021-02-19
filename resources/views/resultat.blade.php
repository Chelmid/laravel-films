@extends('template')

@section('resultat')

@if(request('search') == '')
    <div class="alert alert-danger text-center" role="alert">
        Veuillez mettre un nom de la série ou film
    </div>
@elseif($result == false)
    <div class="alert alert-danger text-center" role="alert">
        Recherche non trouvé
    </div>
@endif

    @foreach ($result as $reponse)
    <div class='container mt-3 list-group-item-success'>
        <img class="img-fluid" src="{{$reponse['show']['image']['medium']}}">

        <p>Titre: {{$reponse['show']['name']}}</p>

        <p>Date: {{ $reponse['show']['premiered'] }}</p>

        <p>Genre:
            @for ($i = 0; $i < count($reponse['show']['genres']) ;$i++)
                {{$reponse['show']['genres'][$i]}}
            @endfor
        </p>

        <p>Episode: {{$reponse['show']['weight']}}</p>

        <p>Note:{{ $reponse['show']['rating']['average'] }}</p>

        <p>Résumé:{!! $reponse['show']['summary'] !!}</p>

        <a href="lefilm-{{$reponse['show']['id']}}-0">lire la suite ...</a>
    </div>

    @endforeach
@endsection

