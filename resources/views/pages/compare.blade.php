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

    <div class="container px-1 sin-m-t myform">
        <h1>Analyse de données </h1> <br>
        <p> Ici on aura la possibilté de comparer les données (sous forme de tableau ou
            sous forme graphique) de 2 à 5 regions</p>
        <div class="row sin-bg-2 myform mx-auto">
            <div class="col-sm-12">

                <form class="row mb-3 p-0" action="{{ route('datas.cmpdt') }}" method="get">
                    <div class="col p-0">
                        <div class="col-sm-12 sin-bg-2 p-0">
                            <p class="p-0">
                                <strong>
                                    <span class="badge badge-dark">
                                        #Pays:
                                    </span>
                                </strong>
                            </p>
                            <div class="form-group mt">
                                <select class="form-control mt-1" id="country" name="country" required>
                                    <option value="">{{ __('-- Selectionnez votre pays --') }}</option>
                                    @foreach($countries ?? '' as $country)
                                    <option value="{{ $country->id }}">
                                        {{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                                @error('pays')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <p class="p-0">
                                <strong>
                                    <span class="badge badge-dark">
                                        #Regions:
                                    </span>
                                </strong>
                            </p>
                            <div class="row p_region justify-content-between">

                                <div class=" col-6">

                                    <div class="form-group">
                                        <select class="form-control " id="region" name="region" required>

                                        </select>
                                        @error('region')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 ">
                                    <div class="form-group">
                                        <select class="form-control " id="region_2" name="region_2">

                                        </select>
                                        @error('province')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <p class="p-0">
                                <strong>
                                    <span class="badge badge-dark">
                                        #Provinces:
                                    </span>
                                </strong>
                            </p>
                            <div class="row p_region justify-content-between">

                                <div class="col-6">
                                    <div class="form-group">
                                        <select class="form-control" id="province" name="province" required>

                                        </select>
                                        @error('commune')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <select class="form-control" id="province_2" name="province_2">

                                        </select>
                                        @error('commune')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <p class="p-0">
                                <strong>
                                    <span class="badge badge-dark">
                                        #Communes:
                                    </span>
                                </strong>
                            </p>
                            <div class="row p_region justify-content-between">


                                <div class="col-6">
                                    <div class="form-group">
                                        <select class="form-control" id="commune_1" name="commune_1" required>

                                        </select>
                                        @error('commune')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <select class="form-control" id="commune_3" name="commune_3" >

                                        </select>
                                        @error('commune')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <select class="form-control" id="commune_2" name="commune_2" >

                                        </select>
                                        @error('commune')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <select class="form-control" id="commune_4" name="commune_4" >

                                        </select>
                                        @error('commune')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <p class="p-0">
                                <strong>
                                    <span class="badge badge-dark">
                                        #Année:
                                    </span>
                                </strong>
                            </p>
                            <div class="row p_region justify-content-between">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control" id="annee" name="annee" required>
                                            <option value="">{{ __('-- Selectionnez l année --') }}</option>
                                            @for($i = Date('Y'); 2000<= $i; $i--) <option value="{{ $i}}">
                                                {{ $i }}</option>
                                                @endfor
                                        </select>
                                        @error('commune')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="viewName" value="{{ Route::currentRouteName() }}">
                    <div class="col-12">
                        <div class="mx-auto">
                            <button type="submit" class="btn sin-bg-3 my-1 font-weight-bold text-white">validé</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--div class="row justify-content-center p-0">
            <div class="col-md-12 ">
                <div class="card sin-bg-2">
                    <div class="card-header">
                        {{ __('Pays') }}
                    </div>
                    <div class="card-body py-0">
                        <div class="form-group">
                            <select class="form-control my-1" id="country" name="country" required>
                                <option value="">{{ __('-- Selectionnez votre pays --') }}</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">
                                    {{ $country->country_name }}</option>
                                @endforeach
                            </select>
                            @error('pays')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div-->
        <!--div id="accordion">
            <div class="card mt-1">
                <div class="card-header">
                    <a class="card-link d-inline-block w-100" data-toggle="collapse" href="#collapseOne">
                        Region
                    </a>
                </div>
                <div id="collapseOne" class="collapse" data-parent="#accordion">
                    <div class="row" id="region">

                    </div>
                </div>
                <div class="card-footer mt-1">
                    <a href="#" class="btn sin-bg-3">valider</a>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseTow">
                        Province
                    </a>
                </div>
                <div id="collapseTow" class="collapse" data-parent="#accordion">
                    <div class="row" id="province">

                    </div>
                </div>
                <div class="card-footer mt-1">
                    <a href="#" class="btn sin-bg-3">valider</a>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseTow">
                        Commune
                    </a>
                </div>
                <div id="collapseTow" class="collapse" data-parent="#accordion">
                    <div class="row" id="commune">

                    </div>
                </div>
                <div class="card-footer mt-1">
                    <a href="#" class="btn sin-bg-3">valider</a>
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
            <script src="{{ asset('js/country_check.js') }}"></script>
        </div-->
        <script src="{{ asset('js/country_one.js') }}"></script>
        <script src="{{ asset('js/country_two.js') }}"></script>
    </div>
    @include("footer")

</body>

</html>