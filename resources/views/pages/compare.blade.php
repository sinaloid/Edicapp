<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDICApp - Données</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('css/sin.css') }}" rel="stylesheet">
    <!-- jQuery library -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2"></script>
</head>

<body>
    @include("header")

    <div class="container sin-m-t bg-white myform">
        <h1>Analyse de données </h1> <br>
        <p> Ici on aura la possibilté de comparer les données (sous forme de tableau ou
            sous forme graphique) de 2 à 5 regions</p>
        <div class="row justify-content-center p-0">
            <div class="col-md-12 ">
                <div class="card sin-bg-2">
                    <div class="card-header">
                        Pays
                    </div>
                    <div class="card-body py-0">
                        <div class="form-group">
                            <select class="form-control my-1" id="pays">
                                <option>Burkina Faso</option>
                                <option>Mali</option>
                                <option>Côte d'Ivoire</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3 p-0">
            <div class="col-md-12 ">
                <div class="card sin-bg-2">
                    <div class="card-header">
                        Region
                        <span>selection deux (02) region au maximun</span>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex">
                            <div class="row mx-auto overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light w-100"
                                style="max-width1: 260px; max-height: 100px;background:#d1d4c9">

                                <!--div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">Action item</a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action list-group-item-success">Success
                                        item</a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action list-group-item-secondary">Secondary
                                        item</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-info">Info
                                        item</a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action list-group-item-warning">Warning
                                        item</a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action list-group-item-danger">Danger
                                        item</a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action list-group-item-primary">Primary
                                        item</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Dark
                                        item</a>
                                    <a href="#"
                                        class="list-group-item list-group-item-action list-group-item-light">Light
                                        item</a>
                                </div-->

                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn sin-bg-3">valider</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3 p-0">
            <div class="col-md-12 ">
                <div class="card sin-bg-2">
                    <div class="card-header">
                        Province
                        <span>selection deux (02) province au maximun</span>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex" style="background:#d1d4c9">
                            <div class="row mx-auto overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light w-100"
                                style="max-width1: 260px; max-height: 100px; ">

                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn sin-bg-3">valider</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3 p-0">
            <div class="col-md-12 ">
                <div class="card sin-bg-2">
                    <div class="card-header">
                        Commune
                        <span>selection quatre (04) commune au maximun</span>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex" style="background:#d1d4c9">
                            <div class="row mx-auto overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light w-100"
                                style="max-width1: 260px; max-height: 100px; ">

                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-3 list-group">
                                    <div
                                        class="form-check list-group-item list-group-item-action list-group-item-secondary">
                                        <label class="form-check-label col">
                                            <input type="checkbox" class="form-check-input checkSize my-0 "
                                                value="">Option
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn sin-bg-3">valider</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3 p-0">
            <div class="col-md-12 ">
                <div class="card sin-bg-2">
                    <div class="card-header">
                        Année
                    </div>
                    <div class="card-body py-0">
                        <div class="form-group">
                            <select class="form-control my-1" id="pays">
                                <option>2021</option>
                                <option>2020</option>
                                <option>2019</option>
                                <option>2018</option>
                                <option>2017</option>
                            </select>
                            <a class="btn sin-bg-3 mt-2" href="{{ route('datas.cmpdt') }}">Comparaison</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("footer")

</body>

</html>