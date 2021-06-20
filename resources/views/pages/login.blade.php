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
                <div id="first">
                    <div class="myform form ">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Connexion</h1>
                            </div>
                        </div>
                        <form action="" method="post" name="login">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Addresse email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    aria-describedby="emailHelp" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <p class="text-center">En vous connectant, vous acceptez nos <a href="#">Conditions
                                        d'utilisation</a></p>
                            </div>
                            <div class="col-md-12 text-center ">
                                <button type="submit" class=" btn btn-block mybtn sin-bg-3 tx-tfm">connexion</button>
                                <p class="text-center mt-1"><a href="#">Mot de passe oublier ?</a></p>
                            </div>
                            <div class="col-md-12 ">
                                <div class="login-or">
                                    <hr class="hr-or">
                                    <span class="span-or">ou</span>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p class="text-center">
                                    <a href="javascript:void();" class="google btn mybtn mt-1"><i class="fa fa-google-plus">
                                        </i> Se connecter avec Google
                                    </a>
                                    <a href="javascript:void();" class="google btn mybtn mt-1"><i class="fa fa-facebook-f">
                                        </i> Se connecter avec Facebook
                                    </a>
                                    <a href="javascript:void();" class="google btn mybtn mt-1"><i class="fa fa-twitter">
                                        </i> Se connecter avec Twitter
                                    </a>
                                    <hr>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-center">Je n'ai pas de compte <a href="{{ route('signup') }}"
                                        id="signup">Inscrivez-vous ici</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
