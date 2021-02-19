@extends('template')

    @section('lefilm')
        <div class='container mt-3 list-group-item-danger'>
            <div class="">
                <img class='imageSolo' src="{{$leFilm['image']['medium']}}">
            <div>
                <p>Titre: {{$leFilm['name']}}</p>
                <p>Date: {{ $leFilm['premiered'] }}</p>
                <p>Genre:
                    @for ($i = 0; $i < count($leFilm['genres']) ;$i++)
                        {{$leFilm['genres'][$i]}}
                    @endfor
                </p>
                <p>Note: {{$leFilm['rating']['average']}}</p>
                <p>Résumé : {!!$leFilm['summary']!!}</p>
                </div>
                <div class='d-flex'>
                    @include('like')
                </div>
            </div>
            @foreach ($saisons as $saison)
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#saison{{$saison['number']}}" aria-expanded="false" aria-controls="saison{{$saison['number']}}">
                Saison{{$saison['number']}}
            </button>
            <div class="collapse mt-3" id="saison{{$saison['number']}}">
                <div class="card card-body bg-secondary">
                    <div class='d-flex flex-wrap smallSize'>
                    @foreach ($episodes as $episode)
                        @if($saison['number'] === $episode['season'])
                            <div>
                                <p>{{ $episode['name'] }}</p>
                                    @if($episode['image'] === null || $episode['image'] == "")
                                        <div class='d-flex smallSize'>
                                            <div>
                                                <img style='height:140px;width:250px;' src="">
                                            </div>
                                            @if($episode['summary'] === null || $episode['summary'] == "")
                                            <div style='height:140px;width:400px;'>résumé indisponible</div>
                                            @else
                                            <div>{!! $episode['summary'] !!}</div>
                                            @endif
                                        </div>
                                    @else
                                    <div class='d-flex smallSize'>
                                        <div>
                                            <img src="{{$episode['image']['medium']}}">
                                        </div>
                                        <div>{!! $episode['summary'] !!}</div>
                                    </div>
                                    @endif
                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
            @endforeach
            <div>
                <a href="./films-{{ request('page') }}">Retour</a>
            </div>
        </div>
    @endsection
