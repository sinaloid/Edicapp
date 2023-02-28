@extends('layout.app')
@section('title')
    <title>Edic - Profile</title>
@endsection
@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col col-md-10 bg-white mx-auto py-3">
            <div class="float-start">

                
                    <h1 class="badge bg-secondary">
                        # Liste des données communautaires
                    </h1>
            </div>
            <div class="float-end pb-1">
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'verificateur' || auth()->user()->role
                ==
                'editeur')
                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'verificateur')
                        <a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold"
                            href="{{ route('data.h_list') }}" role="button">historique</a>
                    @endif
                <a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold"
                    href="{{ route('data.create') }}" role="button">Creer</a>
                @endif
                <a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold" href="#"
                    role="button">Forum</a>
                <a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold" href="#"
                    role="button">Actualités</a>
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
    
</div>
@endsection