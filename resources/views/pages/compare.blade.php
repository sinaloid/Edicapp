<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDICApp - Données</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('css/sin.css') }}" rel="stylesheet">

    <!-- <link rel="stylesheet" href="{{ asset('/dist/css/bootstrap-select.min.css') }}
      <script src="{{ asset('/dist/js/bootstrap-select.min.js') }}"></script>
      <script src="{{ asset('/dist/js/i18n/defaults-*.min.js') }}"></script> -->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!--script src="https://cdn.jsdelivr.net/npm/chart.js"></script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

</head>

<body>
    @include("header")

    <div class="container sin-m-t bg-white myform">
        <h1>Analyse de données </h1> <br>
        <p> Ici on aura la possibilté de comparer les données (sous forme de tableau ou
            sous forme graphique) de 2 à 5 regions</p>

        <div class="row sin-bg-2 myform mx-auto">
            <div class="col-sm-12">
                <div class=" row">
                    <div class="col-sm-3">
                        <label for="pays">Pays</label>
                        <select id="pays" name="pays" class="selectpicker mobile-device w-100"
                            data-none-selected-text="aucune selection" multiple data-max-options="5">
                            <option class="option-style">Burkina Faso</option>
                            <option class="option-style">Mali</option>
                            <option class="option-style">Côte d'Ivoire</option>
                            <option class="option-style">Ect...Autre pays</option>
                            <option class="option-style">Mustard</option>
                            <option class="option-style">Ketchup</option>
                            <option class="option-style">Relish</option>
                        </select>
                    </div>
                    <div class=" col-sm-3">
                        <label for="region">Region</label>
                        <select id="region" name="region" class="selectpicker mobile-device w-100" multiple
                            data-none-selected-text="aucune selection" data-max-options="5">
                            <optgroup label="Condiments" data-max-options="2">
                                <option class="option-style">Est</option>
                                <option class="option-style">Centre</option>
                                <option class="option-style">Ouest</option>
                                <option class="option-style">Centre-Sud</option>
                                <option class="option-style">Etc...</option>
                            </optgroup>
                            <optgroup label="Condiments" data-max-options="2">
                                <option class="option-style">Mustard</option>
                                <option class="option-style">Ketchup</option>
                                <option class="option-style">Relish</option>
                            </optgroup>
                            <optgroup label="Breads" data-max-options="2">
                                <option class="option-style">Plain</option>
                                <option class="option-style">Steamed</option>
                                <option class="option-style">Toasted</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class=" col-sm-3">
                        <label for="province">Province</label>
                        <select id="province" name="province" class="selectpicker mobile-device w-100"
                            data-none-selected-text="aucune selection" multiple data-max-options="5">
                            <optgroup label="Condiments" data-max-options="2">
                                <option class="option-style">Sanmatenga</option>
                                <option class="option-style">province 1</option>
                                <option class="option-style">province 2</option>
                                <option class="option-style">Etc ...</option>
                            </optgroup>
                            <optgroup label="Condiments" data-max-options="2">
                                <option class="option-style">Mustard</option>
                                <option class="option-style">Ketchup</option>
                                <option class="option-style">Relish</option>
                            </optgroup>
                            <optgroup label="Breads" data-max-options="2">
                                <option class="option-style">Plain</option>
                                <option class="option-style">Steamed</option>
                                <option class="option-style">Toasted</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class=" col-sm-3">
                        <label for="commune">Commune</label>
                        <select id="commune" name="commune" class="selectpicker mobile-device w-100"
                            data-none-selected-text="aucune selection" multiple data-max-options="5">
                            <optgroup label="Condiments" data-max-options="2">
                                <option class="option-style">Korsimoro</option>
                                <option class="option-style">commune 1</option>
                                <option class="option-style">commune 2</option>
                                <option class="option-style">Etc ...</option>
                            </optgroup>
                            <optgroup label="Condiments" data-max-options="2">
                                <option class="option-style">Mustard</option>
                                <option class="option-style">Ketchup</option>
                                <option class="option-style">Relish</option>
                            </optgroup>
                            <optgroup label="Breads" data-max-options="2">
                                <option class="option-style">Plain</option>
                                <option class="option-style">Steamed</option>
                                <option class="option-style">Toasted</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label for="annee">Année</label>
                        <select id="annee" class="selectpicker mobile-device w-100">
                        <optgroup label="actuel" data-max-options="2">
                                <option class="option-style">2021</option>
                            </optgroup>
                            <optgroup label="anterieur" data-max-options="2">
                                <option class="option-style">2017</option>
                                <option class="option-style">2018</option>
                                <option class="option-style">2019</option>
                                <option class="option-style">2020</option>
                            </optgroup>
                        </select>
                    </div>
                </div>



                <div class="col-12 sin-btn-data-1 ">
                    <a class="btn sin-bg-3" href="{{ route('datas.cmp') }}">Comparaison</a>
                    <a class="btn sin-bg-3" href="#">Exporter</a>
                </div>
            </div>
        </div>

        <div class="w-100" style="heigth:600px">
            <canvas id="myChart"></canvas>
        </div>
        <script src="{{ asset('js/script.js') }}"></script>

        <script>
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        </script>

        <script>
        if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent))) {
            var elements = document.querySelectorAll('.mobile-device');
            for (var i = 0; i < elements.length; i++) {
                elements[i].classList.remove('mobile-device');
            }
        }
        </script>
    </div>

    @include("footer")
</body>

</html>