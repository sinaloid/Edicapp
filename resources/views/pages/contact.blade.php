@extends('layout.app')

@section('titlePage')
    <title>EDICApp - Contact </title>
@stop

@section('content')
    <div class="row bannier"></div>
    <div class="row">
        <div class="col-12">
            <h1 class="title-bannier">Contactez Nous</h1>
            <p class="col-12 col-md-8 mx-auto text-center my-1">
                Des questions à poser ? Merci de ne pas hésiter à nous contacter directement. Notre équipe vous répondra par
                la suite.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 mx-auto">
            <div class="row">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <form class="col-md-7 order-2 order-md-1" action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nom" class="">Nom</label>
                            <input type="text" id="nom" name="nom" class="form-control">
                            <!-- Error -->
                            @if ($errors->has('nom'))
                                <div class="error text-danger">
                                    {{ $errors->first('nom') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="">Email</label>
                            <input type="text" id="email" name="email" class="form-control">
                            @if ($errors->has('email'))
                                <div class="error text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="numero" class="">Numero</label>
                            <input type="text" id="numero" name="numero" class="form-control">
                            @if ($errors->has('numero'))
                                <div class="error text-danger">
                                    {{ $errors->first('numero') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="sujet" class="">Sujet</label>
                            <input type="text" id="sujet" name="sujet" class="form-control">
                            @if ($errors->has('sujet'))
                                <div class="error text-danger">
                                    {{ $errors->first('sujet') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="message">Message</label>
                            <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea"></textarea>
                            @if ($errors->has('message'))
                                <div class="error text-danger">
                                    {{ $errors->first('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-center py-5">
                        <div class="col-md-4 text-center  ">
                            <button type="submit" class=" btn btn-edic">Envoyer</button>
                        </div>
                    </div>
                </form>
                <div class="col-md-5 order-1 order-md-2 text-center">
                    <ul class="list-unstyled mb-0">
                        <li class="mt-4">
                            <i><img src="img/marker.svg" width="30px" height="30px" /></i>
                            <p>Ouagadougou</p>
                        </li>
                        <li class="mt-4">
                            <i><img src="img/phone.svg" width="30px" height="30px" /></i>
                            <p>70-28-56-31 / 78-15-54–36</p>
                        </li>
                        <li class="mt-4">
                            <i><img src="img/envelope.svg" width="30px" height="30px" /></i>
                            <p>infos@edic-municipalities.com</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
