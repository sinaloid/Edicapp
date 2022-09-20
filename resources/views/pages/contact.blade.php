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
                Des questions à poser ? Merci de ne pas hésiter à nous contacter directement. Notre équipe vous répondra par la suite.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 mx-auto">
            <div class="row">
                <div class="col-md-7 order-2 order-md-1">
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
                        <div class="row justify-content-center py-5">
                            <div class="col-md-4 text-center  ">
                                <button type="submit"
                                    class=" btn btn-edic">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 order-1 order-md-2 text-center">
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
@stop
