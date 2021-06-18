<header class = "container p-0 fixed-top " >
   <nav class="navbar navbar-expand-lg navbar-light sin-bg-3">
      <a class="navbar-brand bg-sin-logo text-light" href="{{ route('home') }}">
      <img src="../img/edicapp.jpg" width="32" height="32" class="d-inline-block align-middle" alt="logo EDICApp">
      EDICApp
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Accueil <span class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('datas.info') }}">Données</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('actu') }}">Actualités</a></li>
            <li class="nav-item"><a class="nav-link sin-nav-link" href="{{ route('forum') }}">Forum</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
         </ul>
         <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
      </div>
   </nav>
</header>