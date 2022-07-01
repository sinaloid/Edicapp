<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    @yield('css')
    <!--script src="https://kit.fontawesome.com/8b7c4e5629.js" crossorigin="anonymous"></script-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @yield('script')
</head>

<body>
    <div class="container-fluid">
        <header class="row bg-white fixed-top">
            <div class="col-12 col-md-10 mx-auto px-4">
                <nav class="navbar navbar-expand-md navbar-white bg-white">
                    <a class="navbar-brand" href="{{ route('acceuil') }}">
                        <img class="logo" src="{{ asset('assets/img/edic.png') }}" alt="logo edic" />
                        <span
                            class="d-inline-block align-middle font-weight-bold animate__animated animate__rotateInDownRight">EDIC</span>
                    </a>

                    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('acceuil') }}">Accueil</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{route('datas.info')}}">Données</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('actualites') }}">Actualités</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Forum</a>
                            </li>

                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                                @if (Route::has('register1'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Compte') }}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                            {{ __('Se déconnecter') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div class="row m-top">
            <div class="col-12 text-center citation">
                <span>@include('pages.includes.mgs')</span>
            </div>
        </div>
        @yield('content')
    </div>

    <div class="container-fluid">
        <footer class="row">
            <div class="col-12 text-center my-3">
                <span><a href="#">à propos</a></span> -
                <span><a href="#">contact</a></span> -
                <span><a href="#">mentions légales</a></span> -
                <span><a href="#">facebook</a></span>
            </div>
        </footer>
    </div>
</body>

</html>
