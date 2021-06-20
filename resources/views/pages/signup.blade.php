@extends('template.app')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
@stop

@section('script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/login.js') }}"></script>
@stop

@section('titlePage')
    <title>EDICApp - Connexion </title>
@stop

@section('content')
    <div class="container sin-m-t">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-5 mx-auto">
                <div id="second">
                    <div class="myform form ">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Inscription</h1>
                            </div>
                        </div>
                        <form action="#" name="registration">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" name="firstname" class="form-control" id="firstname"
                                    aria-describedby="emailHelp" placeholder="Entrer votre nom">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Prénom</label>
                                <input type="text" name="lastname" class="form-control" id="lastname"
                                    aria-describedby="emailHelp" placeholder="Entrer votre prénom">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Numero de téléphone</label>
                                <input type="text" name="lastname" class="form-control" id="lastname"
                                    aria-describedby="emailHelp" placeholder="Numero de téléphone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Addresse email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Entrer votre adresse email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    aria-describedby="emailHelp" placeholder="Entrer Mot de passe">
                            </div>
                            <div class="col-md-12 text-center mb-3">
                                <button type="submit" class=" btn btn-block mybtn sin-bg-3 tx-tfm">S'inscrire</button>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <p>ou S'inscrire avec:</p>

                                    <a type="button" class="light-blue-text mx-2">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                    <a type="button" class="light-blue-text mx-2">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                    <a type="button" class="light-blue-text mx-2">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <hr>
                                    <!-- Terms of service -->
                                    <p>En cliquant sur
                                        <em>S'inscrire</em> vous acceptez nos
                                        <a href="" target="_blank">conditions d'utilisation</a>
                                    </p>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <p class="text-center"><a href="{{ route('login') }}" id="signin">Vous avez déjà
                                            un compte ?</a></p>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
