@extends('layout.app')
@section('title')
    <title>Edic - Profile</title>
@endsection
@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col col-md-10 bg-white mx-auto py-3">
                <div class="float-start">


                    <!--h1 class="badge bg-secondary">
                                # Liste des données communautaires
                            </h1-->
                </div>
                <div class="float-end pb-1">
                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'verificateur' || auth()->user()->role == 'editeur')
                        @if (auth()->user()->role == 'admin')
                            <a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold"
                                href="{{ route('users') }}" role="button">Les utilisateurs</a>
                                <a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold"
                        href="{{ route('home.forums') }}" role="button">Forum</a>
                    <a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold"
                        href="{{ route('home.actualites') }}" role="button">Actualités</a>


                    <a name="" id="" class="btn btn-warning mt-1 ml-auto font-weight-bold"
                        href="{{ route('veilles') }}" role="button">Voir les alertes</a>
                        @endif
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'verificateur')
                            <!--a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold"
                                        href="{{ route('data.h_list') }}" role="button">historique</a-->
                        @endif
                        <a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold"
                            href="{{ route('home') }}" role="button">Communes</a>
                    @endif

                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'PRéCA')
                        <a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold"
                            href="{{ route('preca.index') }}" role="button">PRéCA</a>
                    @endif


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-10 bg-white mx-auto">
                <div id="flash">
                    @include('flashMessage.flash-message-home')


                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if (Route::currentRouteName() == 'home')
            @include('home.donneeCommune')
        @endif
        @if (Route::currentRouteName() == 'users')
            @include('home.users')
        @endif
        @if (Route::currentRouteName() == 'veilles')
            @include('home.veilles')
        @endif
        @if (Route::currentRouteName() == 'home.actualites')
            @include('home.actualites')
        @endif
        @if (Route::currentRouteName() == 'preca.index')
            @include('home.preca')
        @endif
        @if (Route::currentRouteName() == 'home.forums')
            @include('home.forum')
        @endif
    </div>
@endsection
