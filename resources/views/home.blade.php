@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="jumbotron">
        <h5>Welcome, {{ auth()->user()->email }}</h5>
        <h1 class="display-3">Bootstrap 4 Laravel Fortify Authentication</h1>
        <p class="lead">This is a simple auth starter setup for laravel 8 projects</p>
        <hr class="my-4">
        <h2>Features:</h2>
        <ul>
            <li>User Login</li>
            <li>User Registration</li>
            <li>Email Verification</li>
            <li>Forget Password</li>
            <li>Reset Password</li>
        </ul>
        <p class="lead">
            <a class="btn btn-primary" href="https://github.com/jasminetracey/lara8auth" target="_blank" role="button">
                Github Source Code
            </a>
        </p>
    </div>
</div>

<div class="container card">
    <div class="row ">
        <div class="col justify-content-right">
            <a name="" id="" class="btn btn-primary my-2 ml-auto" href="#" role="button">Creer</a>
        </div>
        <div class="col">
            <a name="" id="" class="btn btn-primary my-2 ml-auto" href="#" role="button">Forum</a>
        </div>
        <div class="col">
            <a name="" id="" class="btn btn-primary my-2 ml-auto href=" #" role="button">Actualités</a>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 alert alert-warning" role="alert">
            <div class="col-12">
                <div class="col-sm">
                    <p class="my-0">
                        <strong>
                            <span class="badge badge-dark">
                                #81
                            </span>
                        </strong>

                        <small>
                            Crééé 3 weeks ago par
                        </small>
                    </p>
                    <details>
                        <summary>
                            <strong>lorem ipsum test </strong>
                        </summary>
                        <p>lorem ipsum test</p>
                    </details>
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
                    
                    @if( 0 == 0)
                    <form action="{{ '(todos.makedone','data->id)' }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success mx-1" style="min-width:90px">Done</button>
                    </form>
                    @else
                    <form action="{{ '(todos.makeundone,data->id)' }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning mx-1" style="min-width:90px">Undone</button>
                    </form>
                    @endif
                    <a href="{{ '(todos.edit,data->id)' }}" id="" class="btn btn-info mx-1"
                        role="button">Editer</a>
                    <form action="{{ '(todos.destroy,data->id)' }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-1 my-1">Effacer</button>
                    </form>

                </div>
            </div>
        </div>

        @endsection