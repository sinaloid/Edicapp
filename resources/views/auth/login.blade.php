@extends('layout.app')

@section('content')
    <div class="row m-top">
        <div class="col-12 text-center citation">
            <span>L’E.D.I.C, pour l’expression d’une citoyenneté responsable.</span>
        </div>
    </div>
    <div class="row m-top mb-4">
        <div class="col-sm-8 col-md-7 col-lg-5 mx-auto mb-4">
            <div class="card py-0 mx-auto" style=" background: rgb(0,141,185);
            background: linear-gradient(90deg, rgba(0,141,185,1) 0%, rgba(255,188,120,1) 52%); overflow: hidden">
                <div class="row">
                    <div class="col-12 py-2">
                        <h1 class="text-center text-white mt-3">Connexion</h1>

                        <div class="text-center w-100 mx-auto">
                            <img src="{{asset('assets/img/login.gif')}}" alt="" style="width:20%; height:auto; border: 1px solid transparent; border-radius:50%"">
                        </div>
                    </div>
                    <div class="container-fluid bg-white px-3">
                        <form class="row row-cols-1" method="POST" action="{{ route('login') }}" class="w-100">
                            @csrf

                            <div class="form-group mt-1">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Addresse Email') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-1">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group my-1">
                                <div class="col-md-12 my-3 mx-auto">
                                    <input type="submit" class="btn btn-edic" value="Connexion" />
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié ?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-12 text-center mx-auto">
                                <div class="login-or">
                                    <hr class="hr-or">
                                    <span class="span-or">ou se connecter avec :</span>
                                </div>
                            </div>
                            <div class="col-md-12 mx-auto">
                                <p class="text-center">
                                    <a href="javascript:void();" class="mx-1"><i
                                            class="fa fa-google-plus">
                                        </i>
                                    </a>
                                    <a href="javascript:void();" class="mx-1"><i
                                            class="fa fa-facebook-f">
                                        </i>
                                    </a> 
                                    <a href="javascript:void();" class="mx-1"><i class="fa fa-twitter">
                                        </i>
                                    </a>
                                    <hr>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-center col-md-6 mx-auto">Je n'ai pas de compte <a
                                        href="{{ route('register') }}" id="signup">Inscrivez-vous ici</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
