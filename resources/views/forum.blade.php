@extends('layout.app')

 @section('content')
      
  <div class="row m-top">
    <div class="col-12 text-center citation">
      <span
        >L’E.D.I.C, pour l’expression d’une citoyenneté responsable.</span
      >
    </div>
  </div>
  <div class="row bannier"></div>
  <div class="row">
    <div class="col-12">
      <h1 class="title-bannier">Forum</h1>
      <p class="col-12 col-md-8 mx-auto text-center my-1">
        Bienvenue dans l'espace de visualisation des données budgétaires.
        Ici vous pourez visualiser, partager, télécharger, ou même
        réutiliser les données budgétaires en cour de visualisation.
      </p>
    </div>
  </div>
  <div class="row">
    <form class="col-10 col-md-8 col-lg-6 mx-auto mt-3" action="#">
      <div class="input-group mb-3">
        <input
          type="text"
          class="form-control"
          placeholder="Rechercher une actualité"
        />
        <div class="input-group-append">
          <input
            class="input-group-text mx-1 btn-edic"
            type="submit"
            value="Rechercher"
          />
        </div>
      </div>
    </form>
  </div>
  <div class="row">
    <div class="col-12 col-md-10 d-flex flex-wrap mx-auto">
      <div class="col-lg-9">
        <div class="row">
          <form class="col-12 d-flex flex-wrap p-0" action="">
            <div class="col-lg-6">
              <select name="cars" class="custom-select custom-select-sm mb-3">
                <option selected>Default Custom Select Menu</option>
                <option value="volvo">Volvo</option>
                <option value="fiat">Fiat</option>
                <option value="audi">Audi</option>
              </select>
            </div>
            <div class="col-lg-6">
              <select name="cars" class="custom-select custom-select-sm mb-3">
                <option selected>Default Custom Select Menu</option>
                <option value="volvo">Volvo</option>
                <option value="fiat">Fiat</option>
                <option value="audi">Audi</option>
              </select>
            </div>
          </form>
          <div class="mx-auto card py-3 px-3 mb-3">
            <div class="row align-items-center">
              <div class="col-md-8 mb-3 mb-sm-0">
                <h5>
                  <a href="#" class="text-primary"
                    >Drupal 8 quick starter guide</a
                  >
                </h5>
                <p class="text-sm">
                  <span class="op-6">Posted</span>
                  <a class="text-black" href="#">20 minutes</a>
                  <span class="op-6">ago by</span>
                  <a class="text-black" href="#">KenyeW</a>
                </p>
                <div class="text-sm op-5">
                  <a class="text-black mr-2" href="#">#C++</a>
                  <a class="text-black mr-2" href="#">#AppStrap Theme</a>
                  <a class="text-black mr-2" href="#">#Wordpress</a>
                </div>
              </div>
              <div class="col-md-4 op-7">
                <div class="row text-center op-7">
                  <div class="col px-1">
                    <i class="ion-connection-bars icon-1x"></i>
                    <span class="d-block text-sm">141 Votes</span>
                  </div>
                  <div class="col px-1">
                    <i class="ion-ios-chatboxes-outline icon-1x"></i>
                    <span class="d-block text-sm">122 Replys</span>
                  </div>
                  <div class="col px-1">
                    <i class="ion-ios-eye-outline icon-1x"></i>
                    <span class="d-block text-sm">290 Views</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
        <div
          style="
            visibility: hidden;
            display: none;
            width: 285px;
            height: 801px;
            margin: 0px;
            float: none;
            position: static;
            inset: 85px auto auto;
          "
        ></div>
        <div
          data-settings='{"parent":"#content","mind":"#header","top":10,"breakpoint":992}'
          data-toggle="sticky"
          class="sticky"
          style="top: 85px"
        >
          <div class="sticky-inner">
            <a
              class="btn btn-lg btn-block btn-success rounded-0 py-4 mb-3 bg-op-6 roboto-bold"
              href="#"
              >Ask Question</a
            >
            <div class="bg-white text-sm">
              <h4 class="px-3 py-4 op-5 m-0 roboto-bold">Stats</h4>
              <hr class="my-0" />
              <div class="row text-center d-flex flex-row op-7 mx-0">
                <div
                  class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"
                >
                  <a class="d-block lead font-weight-bold" href="#">58</a>
                  Topics
                </div>
                <div
                  class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"
                >
                  <a class="d-block lead font-weight-bold" href="#">1.856</a>
                  Posts
                </div>
              </div>
              <div class="row d-flex flex-row op-7">
                <div
                  class="col-sm-6 flex-ew text-center py-3 border-right mx-0"
                >
                  <a class="d-block lead font-weight-bold" href="#">300</a>
                  Members
                </div>
                <div class="col-sm-6 flex-ew text-center py-3 mx-0">
                  <a class="d-block lead font-weight-bold" href="#"
                    >DanielD</a
                  >
                  Newest Member
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
 @endsection
