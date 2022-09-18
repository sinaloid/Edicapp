@extends('layout.app')
@section('title')
    <title>Edic - Forum</title>
@endsection
@section('content')
    <div class="row bannier"></div>
    <div class="row">
        <div class="col-12">
            <h1 class="title-bannier">Forum</h1>
            <p class="col-12 col-md-8 mx-auto text-center my-1">
                Bienvenue dans l'espace de discussion. Ici vous pouvez poser ou répondre à des questions.
            </p>
        </div>
    </div>
    <div class="row">
        <form class="col-10 col-md-8 col-lg-6 mx-auto mt-3" action="#">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Rechercher une actualité" />
                <div class="input-group-append">
                    <input class="input-group-text mx-1 btn-edic" type="submit" value="Rechercher" />
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 mx-auto">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky">
                        <div class="sticky-inner">
                            <button type="button" class="btn btn-lg btn-block btn-success rounded-0 mb-3 bg-op-6"
                                data-bs-toggle="modal" data-bs-target="#myModal" href="#">Poser une question</button>
                            <div class="bg-white text-sm">
                                <h4 class="px-3 py-4 m-0">Statistiques</h4>
                                <hr class="my-0" />
                                <div class="row text-center d-flex flex-row  mx-0">
                                    <div class="col-6 text-center py-3 border-bottom border-right">
                                        <a class="d-block  font-weight-bold txt-primary" href="#">58</a>
                                        Sujets
                                    </div>
                                    <div class="col-6 col text-center py-3 border-bottom mx-0">
                                        <a class="d-block  font-weight-bold txt-primary" href="#">1.856</a>
                                        Messages
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-center py-3 border-right mx-0">
                                        <a class="d-block  font-weight-bold txt-primary" href="#">300</a>
                                        Members
                                    </div>
                                    <div class="col-6 text-center py-3 mx-0">
                                        <a class="d-block  font-weight-bold txt-primary" href="#">29</a>
                                        en ligne
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <form class="row mt-3" action="">
                        <div class="col-lg-6">
                            <select name="cars" class="form-control mb-3">
                                <option selected>Filter par date</option>
                                <option value="volvo">Croissant</option>
                                <option value="fiat">Décroissant</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <select name="cars" class="form-control mb-3">
                                <option selected>Filter par commune</option>
                                <option value="volvo">Banfora</option>
                                <option value="fiat">Ouagadougou</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                    </form>
                    <div class="row p-2">

                        <div class="col-12 mx-auto py-3 px-3 mb-3">
                            @php
                                $data = [1, 2, 3, 4, 1, 2, 3, 4];
                            @endphp
                            @foreach ($data as $item)
                                <div class="row  bg-white align-items-center mt-3 p-2">
                                    <div class="col-md-7 mb-1 mb-sm-0 border-radiuse-5">
                                        <h2>
                                            <a href="#" class="txt-primary">Exemple de question </a>
                                        </h2>
                                        <p class="text-sm" style="font-weight: 400">
                                            <span class="">Publié</span>
                                            <span class="">il y a</span>
                                            <span class="">20 minutes par</span>
                                            <span class=""> Traorer Moussa</span>
                                        </p>
                                        <div class="text-sm" style="font-weight: 300">
                                            #Bobo-Dioulasso
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row text-center" style="font-weight: 300">
                                            <!--div class="col px-1">
                                                            <i class="ion-connection-bars icon-1x"></i>
                                                            <span class="d-block text-sm">141 Votes</span>
                                                        </div-->
                                            <div class="col px-1">
                                                <i class="ion-ios-chatboxes-outline icon-1x"></i>
                                                <span class="d-block text-sm">122 Réponses</span>
                                            </div>
                                            <div class="col px-1">
                                                <i class="ion-ios-eye-outline icon-1x"></i>
                                                <span class="d-block text-sm">290 Vues</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Question</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-5">
                        <div class="col-12">
                            <span class="px-2 font-weight-bold">Laisser une question</span>
                            <form class="p-0" method="post" action="" enctype="multipart/form-data">
                                <div class="card-body p-0">

                                    <!--@csrf-->
                                    <div class="form-group mt-3">
                                        <input class="form-control w-100 px-3" type="text"
                                            placeholder="Veuillez entrer votre nom">
                                    </div>
                                    <div class="form-group mt-3">
                                        <input class="form-control w-100 px-3" type="text"
                                            placeholder="Veuillez entrer votre email">
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control w-100 px-3" id="commune"
                                            name="commune" placeholder="Ciblez une commune pour votre question"
                                            autocomplete="off">
                                    </div>
                                    <div class="form-group my-3">
                                        <textarea id="editor" class="ckeditor14 form-control" name="editor"></textarea>
                                    </div>

                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-edic mr-auto">Poser</button>
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            CKEDITOR.replace('editor', {
                                extraPlugins: 'editorplaceholder',
                                editorplaceholder: 'Veuillez entrer votre question',
                                removeButtons: 'PasteFromWord'
                            });


                        });
                    </script>
                </div>



            </div>
        </div>
    </div>
@endsection
