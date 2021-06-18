<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--<meta http-equiv = "refresh" content = "10" /> -->
      <title>EDICApp - Accueil</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="{{ asset('/css/sin.css') }}" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
   <body>
      @include("header")
      <div class="container sin-m-t myform article">
      <div class="row">
            <form class="form-inline w-100 justify-content-center">
                <input class="form-control mr-sm-2 w-75" type="search" placeholder="Rechercher" aria-label="Search">
                <button class="btn sin-btn  my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
        <div class="row">

            <div class="col-sm-11 mx-auto mt-2 card sin-bg-2">
                    <div class="card-body">
                        <div class="card-text mb-2" onload="javascript:setTimeout('location.reaload(true);',35);"  >
                        <q>@include('pages.includes.mgs')</q>
                        </div>
                    </div>
            </div>
            
            <div class="col-md-4 col-sm-6">
                <article>
                    <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                    <p class="date">Posté le <time datetime="2015-10-20 20:29">20 octobre 2015 à 20:29</time></p>
                    <h1>Title</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae sequi eius eos.</p>
                    <a href="article.php">Lire l'article</a>
                </article>
            </div>
            <div class="col-md-4 col-sm-6">
                <article>
                    <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                    <p class="date">Posté le <time datetime="2015-10-20 20:29">20 octobre 2015 à 20:29</time></p>
                    <h1>Title</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae sequi eius eos.</p>
                    <a href="article.php">Lire l'article</a>
                </article>
            </div>
            <div class="col-md-4 col-sm-6">
                <article>
                    <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                    <p class="date">Posté le <time datetime="2015-10-20 20:29">20 octobre 2015 à 20:29</time></p>
                    <h1>Title</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae sequi eius eos.</p>
                    <a href="article.php">Lire l'article</a>
                </article>
            </div>
            <div class="col-md-4 col-sm-6">
                <article>
                    <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                    <p class="date">Posté le <time datetime="2015-10-20 20:29">20 octobre 2015 à 20:29</time></p>
                    <h1>Title</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae sequi eius eos.</p>
                    <a href="article.php">Lire l'article</a>
                </article>
            </div>
            <div class="col-md-4 col-sm-6">
                <article>
                    <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                    <p class="date">Posté le <time datetime="2015-10-20 20:29">20 octobre 2015 à 20:29</time></p>
                    <h1>Title</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae sequi eius eos.</p>
                    <a href="article.php">Lire l'article</a>
                </article>
            </div>
            <div class="col-md-4 col-sm-6">
                <article>
                    <img src="https://placeimg.com/640/480/tech" alt="https://placeimg.com/640/480/tech">
                    <p class="date">Posté le <time datetime="2015-10-20 20:29">20 octobre 2015 à 20:29</time></p>
                    <h1>Title</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit similique eum sequi! Culpa quam earum, iusto atque incidunt porro ad quae sint, doloremque molestiae qui recusandae repudiandae sequi eius eos.</p>
                    <a href="article.php">Lire l'article</a>
                </article>
            </div>
        </div>
      
      </div>
     @include("footer")
   </body>
</html>