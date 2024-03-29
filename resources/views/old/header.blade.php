<header class="container p-0 fixed-top ">
    <nav class="navbar navbar-expand-lg navbar-dark sin-bg-3">
        <a class="navbar-brand font-weight-bold" href="{{ route('acceuil') }}">
            <img src="{{ asset('/img/edicapp.png ')}}" width="32" height="auto" class="d-inline-block align-middle" alt="logo EDICApp">
            EDIC
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--ul class="navbar-nav ml-auto">
            <li class="nav-item "><a class="nav-link active" href="{{ route('acceuil') }}">Accueil <span class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('datas.info') }}">Données</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('actu') }}">Actualités</a></li>
            <li class="nav-item"><a class="nav-link sin-nav-link" href="{{ route('forum') }}">Forum</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
         </ul-->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active"><a class="nav-link" href="{{ route('acceuil') }}">Accueil <span
                            class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('datas.info', isset($dataCommune) ? $dataCommune['slug'] : 'info_general') }}">Données</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('actu') }}">Actualités</a></li>
                <li class="nav-item"><a class="nav-link sin-nav-link" href="{{ route('forum') }}">Forum</a></li>
                <!-- Authentication Links -->
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
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Se déconnecter') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>

            <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
</header>