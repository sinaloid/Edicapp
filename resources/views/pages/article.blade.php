@extends('template.app')

@section('titlePage')
    <title>EDICApp - Infos </title>
@stop

@section('script')
<script src="https://kit.fontawesome.com/4ab29fd570.js" crossorigin="anonymous"></script>
@stop
@section('content')
    <div class="container sin-m-t myform article">
    <div class="row card-header"> <h2>EdicApp Infos</h2></div>
        <div class="row ">
            <form class="form-inline w-100 justify-content-center">
                <input class="form-control " type="search" placeholder="Rechercher" aria-label="Search">
                <button class="btn sin-btn w-20  my-2 my-sm-0 mx-sm-1" type="submit">Rechercher</button>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-11 mx-auto mt-2 card sin-bg-2">
                <div class="card-body">
                    <div class="card-text mb-2" onload="javascript:setTimeout('location.reaload(true);',35);">
                        <q>@include('pages.includes.mgs')</q>
                    </div>
                </div>
            </div>
            <article class="mt-1">
                <div class="col-11 p-0  mx-auto">
                    <h1>Title</h1>
                    <p class="p-0 mt-1">Partager sur : <a href="#"><i class="fab fa-facebook"></i> Facebook</a> |
                        <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                    </p>
                </div>
                <div class="col-11  mx-auto px-0 sin-bg-2">
                    <img src="https://via.placeholder.com/420x250/ff7f7f/333333?text=Image ou Video EDICApp"
                        alt="https://placeimg.com/640/480/people">
                    <p class="date">Posté le <time datetime="2015-10-20 20:29">20 octobre 2015 à 20:29</time></p>
                </div>

                <div class="col-11 px-3 mx-auto">

                    <h2>Resumé rapide</h2>
                    <p class="text-justify mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero totam,
                        nobis numquam incidunt consequatur nihil sit laborum! Autem numquam magnam veritatis praesentium
                        nemo, blanditiis quaerat distinctio modi veniam itaque debitis. Beatae repudiandae cupiditate, magni
                        hic sequi accusamus. Alias et maiores quidem quam possimus numquam ullam, non consectetur voluptas
                        quo? Nulla ipsa neque aliquam, reprehenderit voluptate quisquam, nisi quas dolor placeat ab magnam
                        fugit nam esse pariatur voluptatem repellat! Nostrum cumque quos necessitatibus ipsum reiciendis
                        itaque ad tempora reprehenderit eius saepe esse illum consequatur accusamus aspernatur voluptas
                        fugiat quo accusantium architecto, enim. Perferendis qui obcaecati, doloremque. Repellat dolores
                        modi molestiae, et molestias at sunt consequuntur aut. Distinctio ratione voluptatem, eaque
                        necessitatibus vel voluptas debitis. Commodi ut iusto libero alias corporis nesciunt nulla, id
                        fugiat quis est explicabo perferendis aliquam numquam veniam odit, qui nihil vitae deserunt
                        consequatur unde deleniti, porro. Fugiat, excepturi doloremque deserunt et asperiores amet est!
                        Quod, animi, delectus.</p>
                </div>
            </article>
        </div>
        <!-- </div>
            <div class="container commentaires"> -->
        <div class="row">
            <div class="col-10 mx-auto ">
                <h1>Commentaires</h1>
            </div>
        </div>
        <div class="row commentaire">
            <div class="col-10 mx-auto ">
                <p class="date mt-3">Posté par Pseudo le <time datetime="2015-10-20 20:29">20 octobre 2015 à 20:29</time> :
                </p>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam deserunt,
                    necessitatibus reprehenderit asperiores quaerat reiciendis minus totam rerum quis aliquam laborum
                    laboriosam deleniti inventore dolor debitis recusandae, dolorum doloribus! Laborum.</p>
            </div>
        </div>
        <div class="row commentaire">
            <div class="col-10 mx-auto ">
                <p class="date">Posté par Pseudo le <time datetime="2015-10-20 20:29">20 octobre 2015 à 20:29</time> :</p>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam deserunt,
                    necessitatibus reprehenderit asperiores quaerat reiciendis minus totam rerum quis aliquam laborum
                    laboriosam deleniti inventore dolor debitis recusandae, dolorum doloribus! Laborum.</p>
            </div>
        </div>
        <div class="row commentaire">
            <div class="col-10 mx-auto ">
                <p class="date">Posté par Pseudo le <time datetime="2015-10-20 20:29">20 octobre 2015 à 20:29</time> :</p>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam deserunt,
                    necessitatibus reprehenderit asperiores quaerat reiciendis minus totam rerum quis aliquam laborum
                    laboriosam deleniti inventore dolor debitis recusandae, dolorum doloribus! Laborum.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-10 mx-auto ">
                <form class="form-inline w-100 justify-content-center" method="post" action="">
                    <!--<div class="row">
                                <div class="col-10 mx-auto ">
                                    <div class="message erreur">Ici j'affiche un message d'erreur !</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10 mx-auto ">
                                    <div class="message confirmation">Ici j'affiche un message de confirmation !</div>
                                </div>
                            </div>-->
                    <textarea class="form-control mr-sm-2 w-100" name="commentaire"
                        placeholder="Votre commentaire *"></textarea>
                    <input class="btn sin-btn  my-2 " type="submit" value="Commenter">
                </form>
            </div>
        </div>
    </div>
@stop
