<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Site de films / séries</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://bootswatch.com/4/lumen/bootstrap.min.css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="#">Site de films / séries 2.5v</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->url() == url('/welcome') || request()->url() == url('/user/welcome') ? 'active' : null }}">
                    <a class="nav-link" href="./welcome">Accueil <span class="sr-only">(current)</span></a>
                </li>
                @auth
                <li class="nav-item {{ request()->url() == url('/user/films-'.request('page')) ? 'active' : null }}">
                    <a class="nav-link" href="./films-0">Liste des films et séries</a>
                </li>
                @endauth
                @guest
                <li class="nav-item  {{ request()->url() == url('/create') ? 'active' : null }}">
                    <a class="nav-link" href="./create">Créer un compte</a>
                </li>
                <li class="nav-item {{ request()->url() == url('/login') ? 'active' : null }}">
                    <a class="nav-link " href="./login">Se connecter</a>
                </li>
                @else
                <li class="nav-item {{ request()->url() == url('/user/mon-compte') ? 'active' : null }}">
                    <a class="nav-link " href="./mon-compte">Compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../">Deconnexion</a>
                </li>
                @endguest
            </ul>

            @auth
            {!! Form::open(['url' => './user/resultat', 'class' => 'form-inline']) !!}
                <!--{!! Form::label('search', null, ['class' => 'text-white']) !!}-->
                {!! Form::text('search', null , ['class' => 'form-control', 'placeholder' => 'Search']) !!}
                {!! Form::submit('Recherche', ['class' => 'btn btn-secondary']) !!}
            {!! Form::close() !!}
            @endauth
        </div>
    </nav>

    @yield('bienvenue')

    @yield('afficherToutLesFilms')

    @yield('lefilm')

    @yield('creationCompte')

    @yield('resultat')

    @yield('inscription')

    @yield('login')

    @yield('login_on')

    @yield('utilisateur_on')

    @yield('monCompte')

    @yield('trier')

    @yield('mot_de_passe_oublier')

    @yield('mot_de_passe_new')

    <button class='buttonBot btn btn-primary'>Go to up</button>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous">
            </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    @auth
        <script src="{{ asset('js/script.js') }}"></script>
    @endauth
</body>
</html>
