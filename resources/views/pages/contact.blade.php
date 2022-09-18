@extends('template.app')

@section('titlePage')
<title>EDICApp - Contact </title>
@stop

@section('content')
    <div class="container sin-m-t">
        <div class="row">
            <div class="col-12">
                <div class="myform form">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Contactez Nous</h1>
                            <p class="text-center mt-3 w-responsive mx-auto mb-5">
                                Avez-vous des questions ? Merci de ne pas hésitez à nous contacter directement. Notre équipe reviendra vers vous dans 
                                une question d'heures pour vous aider.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <form action="#" method="" name="contact">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1" class="">Nom</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" class="">Email</label>
                                        <input type="text" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="subject" class="">Sujet</label>
                                        <input type="text" id="subject" name="subject" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="message">Message</label>
                                        <textarea type="text" id="message" name="message" rows="2"
                                            class="form-control md-textarea"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-4 text-center  ">
                                        <button type="submit"
                                            class=" btn sin-bg-3 text-white">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 text-center">
                            <ul class="list-unstyled mb-0">
                                <li class="mt-4">
                                    <i><img src="img/marker.svg" width="30px" height="30px" /></i>
                                    <p>Ouagadougou, Rue 94126, Bf</p>
                                </li>
                                <li class="mt-4">
                                    <i><img src="img/phone.svg" width="30px" height="30px" /></i>
                                    <p>+ 226 00 00 00 00</p>
                                </li>
                                <li class="mt-4">
                                    <i><img src="img/envelope.svg" width="30px" height="30px" /></i>
                                    <p>contact@EDICApp.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
