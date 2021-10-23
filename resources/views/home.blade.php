@extends('layouts.app')

@section('content')

<div class="container card">
    <div class="row ">
        <div class="col">
            <div class="pull-left ">

                
                    <h1 class="badge badge-secondary">
                        # Liste des données communautaires
                    </h1>
            </div>
            <div class="pull-right pb-1">
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'verificateur' || auth()->user()->role
                ==
                'editeur')
                <a name="" id="" class="btn btn-secondary mt-1 ml-auto font-weight-bold"
                    href="{{ route('data.create') }}" role="button">Creer</a>
                @endif
                <a name="" id="" class="btn btn-secondary mt-1 ml-auto font-weight-bold" href="#"
                    role="button">Forum</a>
                <a name="" id="" class="btn btn-secondary mt-1 ml-auto font-weight-bold" href="#"
                    role="button">Actualités</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="flash">
                @include('flashMessage.flash-message-home')


                @yield('content')
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($datas as $data)
        <div class="col-12 alert alert-warning p-0" role="alert">
            <div class="col-12 ">
                <strong>
                    <span class="badge badge-dark">
                        #{{ $data->id }}
                    </span>
                </strong>

                <small class="font-weight-bold">
                    {{ App\Models\Datas\Data::find($data->id)->commune->commune_name }}

                </small>

                <small class="pull-right">
                    {{ $data->created_at }}
                </small>

            </div>
            <div class="col-12 pb-1">

                <strong>
                    <span class="badge badge-dark">
                        année: {{ $data->annee }}
                    </span>
                </strong>

            </div>
            <div class="col-sm-12 form-inline justify-content-end ">

                @php
                $auth = auth()->user()->commune_id == $data->commune_id ? true : false;
                $autorisation = auth()->user()->role == 'editeur' || auth()->user()->role == 'verificateur' ? true :
                false;
                $status = $auth && $autorisation ? true : false;
                @endphp
                @if ($status == true || auth()->user()->role == 'admin')
                @if (auth()->user()->role == 'verificateur')
                <form action="{{ route('data.publier', $data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                        class="btn {{ $data->publier != 0 ? 'btn-success' : 'btn-secondary' }} font-weight-bold text-white my-1 mx-1"
                        style="min-width:90px">{{ $data->publier != 0 ? 'Publier' : 'Non publier' }}</button>
                </form>
                @endif
                <form action="{{ route('data.terminer', $data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                        class="btn {{ $data->terminer != 0 ? 'btn-success' : 'btn-warning' }} font-weight-bold text-white my-1 mx-1">{{ $data->terminer != 0 ? 'Terminer' : 'En cours' }}</button>
                </form>
                @endif
                @if (!$status && auth()->user()->role != 'admin')
                <a href="{{ route('data.edit', $data->id) }}" id="" class="btn btn-info my-1 mx-1"
                    role="button">Afficher</a>
                @else
                @if ($data->terminer == 0)
                <a href="{{ route('data.edit', $data->id) }}" id="" class="btn btn-info my-1 mx-1"
                    role="button">Editer</a>


                <form action="{{ route('data.destroy', $data->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger font-weight-bold text-white mx-1 my-1">Effacer</button>
                </form>
                @endif
                @endif
            </div>
        </div>





        <!--div class="col-12 alert alert-warning p-0" role="alert">
            <div class="col-12 ">
                <div class="col-sm">
                    <p class="my-0">
                        <strong>
                            <span class="badge badge-dark">
                                #{{ $data->id }}
                            </span>
                        </strong>

                        <small>
                            {{ App\Models\Datas\Data::find($data->id)->commune->commune_name }}

                        </small>


                    </p>
                    <p>
                        <strong>
                            <span class="badge badge-dark">
                                année: {{ $data->annee }}
                            </span>
                        </strong>
                    </p>
                </div>
                <div class="col-sm form-inline justify-content-end my-1">
                    <small>
                        {{ $data->created_at }}
                    </small>
                </div>
                <div class="col-sm form-inline justify-content-end my-1">

                    @php
                    $auth = auth()->user()->commune_id == $data->commune_id ? true : false;
                    $autorisation = auth()->user()->role == 'editeur' || auth()->user()->role == 'verificateur' ? true :
                    false;
                    $status = $auth && $autorisation ? true : false;
                    @endphp
                    @if ($status == true || auth()->user()->role == 'admin')
                    @if (auth()->user()->role == 'verificateur')
                    <form action="{{ route('data.publier', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="btn {{ $data->publier != 0 ? 'btn-success' : 'btn-secondary' }} font-weight-bold text-white mx-1"
                            style="min-width:90px">{{ $data->publier != 0 ? 'Publier' : 'Non publier' }}</button>
                    </form>
                    @endif
                    <form action="{{ route('data.terminer', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="btn {{ $data->terminer != 0 ? 'btn-success' : 'btn-warning' }} font-weight-bold text-white mx-1">{{ $data->terminer != 0 ? 'Terminer' : 'En cours' }}</button>
                    </form>
                    @endif
                    @if (!$status && auth()->user()->role != 'admin')
                    <a href="{{ route('data.edit', $data->id) }}" id="" class="btn btn-info mx-1"
                        role="button">Afficher</a>
                    @else
                    @if ($data->terminer == 0)
                    <a href="{{ route('data.edit', $data->id) }}" id="" class="btn btn-info mx-1"
                        role="button">Editer</a>


                    <form action="{{ route('data.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn btn-danger font-weight-bold text-white mx-1 my-1">Effacer</button>
                    </form>
                    @endif
                    @endif
                </div>
            </div>
        </div-->
        @endforeach
    </div>
</div>
@endsection