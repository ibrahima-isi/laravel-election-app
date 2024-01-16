<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>
    <style>
        /* Ajoutez du style CSS selon vos besoins */
        .hidden-text {
            display: none;
        }

        .read-more-btn {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
@php
    $routeName = request()->route()->getName(); // recuperation des chemins-url de la page courante
@endphp
<body class="bg-light m-5">
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <a class="navbar-brand  @if($routeName === 'home') active @endif" href=" {{ route('home') }}  ">{{ strtoupper('Home') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link @if($routeName === 'candidat') active @endif" href="{{ route('candidat') }}">{{ strtoupper('Candidats') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if($routeName === 'electeur') active @endif" href="{{ route('electeur') }}">{{ strtoupper('electeurs') }} </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if($routeName === 'programme') active @endif" href="{{ route('programme')}}">{{ strtoupper('Programmes') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if($routeName === 'secteur') active @endif" href="{{ route('secteur') }}">{{ strtoupper('Secteurs') }}</a>
                </li>
            </ul>
        </div>
        <div class="navbar-nav ms-auto mb-2 mb-lg-0">
            @auth
               <button class="btn btn-danger">
                   {{ \Illuminate\Support\Facades\Auth::user()->name }}
                   <form  class="nav-item" action="{{ route('auth.logout') }}" method="post">
                       @method('delete')
                       @csrf
                       <button class="nav-link bg-dark">Se deconnecter</button>
                   </form>
               </button>
            @endauth
            @guest
                    <a href=" {{ route('auth.login') }}" class="nav-link ">
                    @if($routeName !== 'auth.login')
                            Se connecter
                        @else
                        <a href="{{ route('auth.register')}}" class="nav-link">
                            register
                        </a>
                    @endif
                    </a>
            @endguest
        </div>
    </nav>
    @yield('content')
</body>
<script>
    function toggleText() {
        var additionalText = document.getElementById("additional-text");
        additionalText.classList.toggle("hidden-text");
        var readMoreBtn = document.querySelector(".read-more-btn");
        readMoreBtn.textContent = additionalText.classList.contains("hidden-text") ? "Lire la suite" : "Réduire";
    }
</script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</html>
