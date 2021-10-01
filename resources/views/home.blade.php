@extends('layouts.app')

@section('content')
<div class="container card">
    <div class="row ">
        <div class="col justify-content-right">
            <a name="" id="" class="btn btn-primary my-2 ml-auto" href="{{ route('data.create') }}"
                role="button">Creer</a>
        </div>
        <div class="col">
            <a name="" id="" class="btn btn-primary my-2 ml-auto" href="#" role="button">Forum</a>
        </div>
        <div class="col">
            <a name="" id="" class="btn btn-primary my-2 ml-auto" href="#" role="button">Actualités</a>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($datas as $data)
        <div class="col-12 alert alert-warning" role="alert">
            <div class="col-12">
                <div class="col-sm">
                    <p class="my-0">
                        <strong>
                            <span class="badge badge-dark">
                                #{{ $data->id}}
                            </span>
                        </strong>

                        <small>
                            {{App\Models\Datas\Data::find($data->id)->commune->commune_name}}

                        </small>

                    </p>
                    <p>
                        <strong>
                            <span class="badge badge-dark">
                                année: {{ $data->annee}}
                            </span>
                        </strong>
                    </p>
                    <!--details>
                        <summary>

                            <strong>lorem ipsum test </strong>
                        </summary>
                        <p>{{ $data->annee}}</p>
                    </details-->
                </div>
                <div class="col-sm form-inline justify-content-end my-1">
                    <small>
                        {{ $data->created_at}}
                    </small>
                </div>
                <div class="col-sm form-inline justify-content-end my-1">
                    <!--div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle mx-1 my-0" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Affecter à
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            
                            <a class="dropdown-item"
                                href="/todos/{{ 'data->id' }}/affectedTo/{{ 'user->id' }}">{{ 'user->name' }}</a>
                            
                        </div>
                    </div-->

                    @if( $data->terminer != 0)
                    <form action="{{ route('data.terminer',$data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success mx-1" style="min-width:90px">Terminer</button>
                    </form>
                    @else
                    <form action="{{ route('data.encour',$data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning mx-1" style="min-width:90px">En-cours</button>
                    </form>
                    @endif
                    <a href="{{ route('data.edit',$data->id) }}" id="" class="btn btn-info mx-1"
                        role="button">Editer</a>
                    <form action="{{ route('data.destroy',$data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-1 my-1">Effacer</button>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
        @endsection