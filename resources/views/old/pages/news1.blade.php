@extends('template.app1')

@section('pageTitle')
    <title>EDIC - Actualités </title>
@stop

@section('content')
<div class="container">
    
</div>



<div class="container sin-m-t myform article p-3 px-3">
    <div class="row card-header p-0"> <h2>Edic Infos</h2></div>
    <div class="row">
        <form class="form-inline w-100 justify-content-center">
            <input class="form-control mr-sm-2 w-75" type="search" placeholder="Rechercher" aria-label="Search">
            <button class="btn sin-btn  my-2 my-sm-0" type="submit">Rechercher</button>
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

        <div class="col-md-4 col-sm-6">
            <article class="card p-2 card-info">
                <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                <p class="date">Posté le <time datetime="2021-10-20 20:29">20 octobre 2021 à 20:29</time></p>
                <h1>Title</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam
                    earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae
                    sequi eius eos.</p>
                <a href="{{ route('actuc') }}">Lire l'article</a>
            </article>
        </div>
        <div class="col-md-4 col-sm-6">
            <article class="card p-2 card-info">
                <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                <p class="date">Posté le <time datetime="2021-10-20 20:29">20 octobre 2021 à 20:29</time></p>
                <h1>Title</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam
                    earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae
                    sequi eius eos.</p>
                <a href="{{ route('actuc') }}">Lire l'article</a>
            </article>
        </div>
        <div class="col-md-4 col-sm-6">
            <article class="card p-2 card-info">
                <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                <p class="date">Posté le <time datetime="2021-10-20 20:29">20 octobre 2021 à 20:29</time></p>
                <h1>Title</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam
                    earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae
                    sequi eius eos.</p>
                <a href="{{ route('actuc') }}">Lire l'article</a>
            </article>
        </div>
        <div class="col-md-4 col-sm-6">
            <article class="card p-2 card-info">
                <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                <p class="date">Posté le <time datetime="2021-10-20 20:29">20 octobre 2021 à 20:29</time></p>
                <h1>Title</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam
                    earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae
                    sequi eius eos.</p>
                <a href="{{ route('actuc') }}">Lire l'article</a>
            </article>
        </div>
        <div class="col-md-4 col-sm-6">
            <article class="card p-2 card-info">
                <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                <p class="date">Posté le <time datetime="2021-10-20 20:29">20 octobre 2021 à 20:29</time></p>
                <h1>Title</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam
                    earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae
                    sequi eius eos.</p>
                <a href="{{ route('actuc') }}">Lire l'article</a>
            </article>
        </div>
        <div class="col-md-4 col-sm-6">
            <article class="card p-2 card-info">
                <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                <p class="date">Posté le <time datetime="2021-10-20 20:29">20 octobre 2021 à 20:29</time></p>
                <h1>Title</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam
                    earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae
                    sequi eius eos.</p>
                <a href="{{ route('actuc') }}">Lire l'article</a>
            </article>
        </div>
    </div>

</div>
@stop
