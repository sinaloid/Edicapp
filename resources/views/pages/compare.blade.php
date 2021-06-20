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

    <link href="{{ asset('/css/sin.css') }}" rel="stylesheet">

    <!--<link rel="stylesheet" href="{{ asset('/dist/css/bootstrap-select.min.css') }}">
      <script src="{{ asset('/dist/css/bootstrap-select.min.js') }}"></script>
      <script src="{{ asset('/dist/js/i18n/defaults-*.min.js') }}"></script> -->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    @include("header")

    <div class="container sin-m-t bg-white myform">


        <!-- zone selectione -->
        <!-- <div class = "row" style="background : #111;">
                <div class = "col-sm-12">
                    <div class = " row">
                        <div class = "col-sm-3">
                            Burkina Faso
                        </div>
                    </div>
                    <div class = "row">
                        <div class = " col-sm-3">
                            Region
                        </div>
                        <div class = " col-sm-3">
                            Centre-Nord
                        </div>
                    </div>
                    <div class = "row">
                        <div class = " col-sm-3">
                            Province
                        </div>
                        <div class = " col-sm-3">
                            Sanmatenga
                        </div>
                    </div>
                    <div class = "row">
                        <div class = " col-sm-3">
                            Commune
                        </div>
                        <div class = " col-sm-3">
                            Korsimoro
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-sm-3">
                            compare
                        </div>
                        <div class = "col-sm-3">
                            exporter
                        </div>
                    </div>
                </div>
            </div> -->

        <!--zone data-->
        <!--<div class="row">
                !-- data compare option --
                <div class="col-sm-3" style="background : #444; height : 2000px;">
                    <div class = "row">
                        Autre Region
                    </div>
                </div>
                !-- data compare zone --
                <div class="col-sm-9" style="background : #555; height : 2000px;">
            
                </div>
            </div> -->

        <p>Page en cours de création. <br /> Ici on aura la possibilté de comparer les données (sous forme de tableau ou
            sous forme graphique) de 2 à 5 regions</p>

        <div class="row sin-bg-2 myform mx-auto">
            <div class="col-sm-12">
                <div class=" row">
                    <div class="col-sm-3">
                        <label for="pays">pays</label>
                        <select id="pays" name="pays" class="selectpicker w-100" multiple data-max-options="5">
                            <option>Burkina Faso</option>
                            <option>Mali</option>
                            <option>Côte d'Ivoire</option>
                            <option>Ect...Autre pays</option>
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option>Relish</option>
                        </select>
                    </div>
                    <div class=" col-sm-3">
                        <label for="region">Region</label>
                        <select id="region" name="region" class="selectpicker w-100" multiple data-max-options="5">
                            <optgroup label="Condiments" data-max-options="2">
                                <option>Est</option>
                                <option>Centre</option>
                                <option>Ouest</option>
                                <option>Centre-Sud</option>
                                <option>Etc...</option>
                            </optgroup>
                            <optgroup label="Condiments" data-max-options="2">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </optgroup>
                            <optgroup label="Breads" data-max-options="2">
                                <option>Plain</option>
                                <option>Steamed</option>
                                <option>Toasted</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class=" col-sm-3">
                        <label for="province">Province</label>
                        <select id="province" name="province" class="selectpicker w-100" multiple data-max-options="5">
                            <optgroup label="Condiments" data-max-options="2">
                                <option>Sanmatenga</option>
                                <option>province 1</option>
                                <option>province 2</option>
                                <option>Etc ...</option>
                            </optgroup>
                            <optgroup label="Condiments" data-max-options="2">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </optgroup>
                            <optgroup label="Breads" data-max-options="2">
                                <option>Plain</option>
                                <option>Steamed</option>
                                <option>Toasted</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class=" col-sm-3">
                        <label for="commune">Commune</label>
                        <select id="commune" name="commune" class="selectpicker w-100" multiple data-max-options="5">
                            <optgroup label="Condiments" data-max-options="2">
                                <option>Korsimoro</option>
                                <option>commune 1</option>
                                <option>commune 2</option>
                                <option>Etc ...</option>
                            </optgroup>
                            <optgroup label="Condiments" data-max-options="2">
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </optgroup>
                            <optgroup label="Breads" data-max-options="2">
                                <option>Plain</option>
                                <option>Steamed</option>
                                <option>Toasted</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <select class="selectpicker w-100">
                            <optgroup label="anterieur" data-max-options="2">
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                            </optgroup>
                            <optgroup label="actuel" data-max-options="2">
                                <option>2021</option>
                            </optgroup>
                            <optgroup label="Prevision" data-max-options="2">
                                <option>2022</option>
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

        <div>
            <canvas id="myChart"></canvas>
        </div>
        <script>
            const labels = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
            ];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45],
                }]
            };

            const config = {
                type: 'line',
                data,
                options: {}
            };

            // === include 'setup' then 'config' above ===

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );

        </script>
    </div>

    @include("footer")
</body>

</html>
