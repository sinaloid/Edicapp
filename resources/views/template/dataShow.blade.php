<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDICApp - Données</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Itim&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('/css/sin.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/table.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4ab29fd570.js" crossorigin="anonymous"></script>
    @yield('script')
</head>

<body>
    @include("header")
    <div class="container px-1 sin-m-t myform">
        <div class="row sin-bg-2 myform mx-auto">
            <div class="col-sm-12">
                <div class=" row">
                    <div class="col-sm-3">
                        <label for="pays">pays</label>
                        <div class="form-group">
                            <select class="form-control" id="pays">
                                <option>Burkina Faso</option>
                                <option>Mali</option>
                                <option>Côte d'Ivoire</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class=" col-sm-3">
                        <label for="region">Region</label>

                        <div class="form-group">
                            <select class="form-control" name="region" class="w-100">
                                <option>Region</option>
                                <option>Centre</option>
                                <option>Ouest</option>
                                <option>Centre-Sud</option>
                                <option>Etc...</option>
                            </select>
                        </div>

                    </div>
                    <div class=" col-sm-3">
                        <label for="province">Province</label>
                        <div class="form-group">
                            <select class="form-control" name="province" class="w-100">
                                <option>Province </option>
                                <option>Sanmatenga</option>
                                <option>nom province 1</option>
                                <option>nom province 2</option>
                                <option>Etc ...</option>
                            </select>
                        </div>
                    </div>
                    <div class=" col-sm-3">
                        <label for="commune">Commune</label>
                        <div class="form-group">
                            <select class="form-control" name="commune" class="w-100">
                                <option>commune</option>
                                <option>Korsimoro</option>
                                <option>nom commune 1</option>
                                <option>Etc ...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <a class="btn sin-bg-3" href="{{ route('datas.cmp') }}">Comparaison</a>
                    <a class="btn sin-bg-3" href="#">Exporter</a>
                </div>
            </div>
        </div>

        <div class="container mt-2" id="print">
            <div class="row">
                <div class="col-sm-7  myform sin-bg-2 mx-auto text-center"> <q>@include('pages.includes.mgs')</q> </div>
            </div>
        </div>

        <div class="container myform">
            <div class="row align-items-center">
                <div class="col-5 col-md-6">
                    <h2>Données</h2>
                </div>
                <div class="col-12 col-md-6">
                    <p class="sin-ic">Partager sur : <a href="#"><i class="fab fa-facebook"></i> Facebook</a> |
                        <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                    </p>
                </div>
            </div>
            <br>


            @include("pages.menu.menu")

            <br>

            <div class="container px-1">
                <br>
                <h3>@yield('dataTitle')</h3>
                <hr>
                @yield('dataContent')
            </div>

        </div>

    </div>
    @include("footer")
</body>

</html>