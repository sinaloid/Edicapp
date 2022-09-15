<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edic - Jeux de Données</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/edic.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/edic.png') }}" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('/css/table.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <!-- jQuery library -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container-fluid">
        <header class="row bg-white fixed-top">
            <div class="col-12 col-md-10 mx-auto px-4">
                <nav class="navbar navbar-expand-md navbar-white bg-white">
                    <a class="navbar-brand" href="{{ route('acceuil') }}">
                        <img class="logo" src="{{ asset('assets/img/edic.png') }}" alt="logo edic" />
                        <span
                            class="d-inline-block align-middle font-weight-bold animate__animated animate__rotateInDownRight">EDIC</span>
                    </a>

                    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('acceuil') }}">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('datas.info', isset($dataCommune) ? $dataCommune['slug'] : 'info_general') }}">Données</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('actualites') }}">Actualités</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('forum') }}">Forum</a>
                            </li>

                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                                @if (Route::has('register1'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Compte') }}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                            {{ __('Se déconnecter') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div class="row m-top">
            <div class="col-12 text-center citation">
                <span>@include('pages.includes.mgs')</span>
            </div>
        </div>
        <div class="row bannier"></div>
        <div class="row">
            <div class="col-12">
                <h1 class="title-bannier">Jeux de données </h1>
                <p class="col-12 col-md-8 mx-auto text-center my-1">
                    Ici vous avez la possibilité de comparer les données de 2 à 4 communes
                    (sous forme de tableau ou sous forme graphique).
                    Vous devez sélectionner au minimum une commune
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-10 mx-auto">
                <hr class="w-100">
                <div class="font-weight-bold card-title">
                    Sources des données
                </div>
                <div class="row">
                    <div class="col-5 col-md-2 font-weight-bold">Pays :</div>
                    <div class="col-7 col-md-10">Burkina Faso</div>
                </div>
                <div class="row ">
                    <div class="col-5 col-md-2 font-weight-bold">Commune :</div>
                    <div class="col-7 col-md-10 ">
                        @php
                            if ($dataCompare != null) {
                                $str = $dataCompare['commune_1'];
                                if ($dataCompare['commune_2'] != '') {
                                    $str = $str . ' , ' . $dataCompare['commune_2'];
                                }
                                if ($dataCompare['commune_3'] != '') {
                                    $str = $str . ' , ' . $dataCompare['commune_3'];
                                }
                                if ($dataCompare['commune_4'] != '') {
                                    $str = $str . ' et ' . $dataCompare['commune_4'];
                                }
                            
                                echo $str;
                            }
                        @endphp
                    </div>

                </div>
                <div class="row">
                    <div class="col-5 col-md-2 font-weight-bold">Année :</div>
                    <div class="col-7 col-md-10">{{ isset($dataCompare) ? $dataCompare['annee'] : 'année null' }}
                    </div>
                </div>
                <a class="btn btn-edic mt-2" href="{{ route('datas.cmp') }}">Modifier</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-10 mx-auto bg-white d-flex">
                <div class="col-12 col-md-4 mt-3 p-0">
                    <p class="font-weight-bold card-header mt-2"> Données</p>
                    <div id="accordion" class="px-2">
    
                        <div class="">
                            <div class="my-1">
                                <a class="btn btn-edic w-100 font-weight-bold" data-toggle="collapse" href="#collapseOne">
                                    Info Générale
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="p-0">
                                    <div class="list-group">
                                        <button id="recetteInvest" href="#"
                                            class="list-group-item list-group-item-action" onclick="show(this)">Recettes
                                            d'investissement</button>
                                        <button id="recetteFonct" href="#"
                                            class="list-group-item list-group-item-action" onclick="show(this)">Recettes
                                            fonctionnement</button>
                                        <button href="#" id="depenseInvest"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses
                                            d'investissement</button>
                                        <button href="#" id="depenseFonct"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses
                                            fonctionnement</button>
                                        <button id="marchesAttendu"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">3
                                            meilleurs marchers - attendu</button>
                                        <button id="marchesMobilise"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">3
                                            meilleurs marchers - mobilisé</button>
                                        <button id="villagesAttendu"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">10
                                            meilleurs villages - attendu</button>
                                        <button id="villagesMobilise"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">10
                                            meilleurs villages - mobilisé</button>
                                        <button id="etatCivil"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">Etat
                                            civil</button>
                                        <button id="situationDomaniale"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">Situation domaniale</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    
    
                        <div class="">
                            <div class="mb-1">
                                <a class="btn btn-edic w-100 font-weight-bold" data-toggle="collapse" href="#collapseThree">
                                    Budget {{ isset($dataCompare) ? $dataCompare['annee'] : 'année null' }}
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="p-0">
                                    <div class="list-group">
                                        <button id="recetInves" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Recettes
                                            d'investissement</button>
                                        <button id="recetFonct"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">Recettes
                                            de fonctionnement
                                        </button>
                                        <button id="depensInvest"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses
                                            d'investissement
                                        </button>
                                        <button id="depensFonct"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses de
                                            fonctionnement
                                        </button>
    
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="">
                            <div class="">
                                <a class="btn btn-edic w-100 font-weight-bold" data-toggle="collapse" href="#collapseFor">
                                    Budget {{ isset($dataCompare) ? $dataCompare['annee'] + 1 : 'année null' }}
                                </a>
                            </div>
                            <div id="collapseFor" class="collapse" data-parent="#accordion">
                                <div class="p-0">
                                    <div class="">
                                        <button id="recetInvestn" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Recettes
                                            d'investissement</button>
                                        <button id="recetFonctn"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">Recettes
                                            de fonctionnement
                                        </button>
                                        <button id="depensInvestn"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses
                                            d'investissement
                                        </button>
                                        <button id="depensFonctn"
                                            class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses de
                                            fonctionnement
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="col-12 col-md-8 mt-3 px-0">
                    <p class="font-weight-bold mt-2 card-header">Visualisation de données</p>
                    <div class="row card-header">
                        <div class="controls">
                            <h5 class="label">Type de graphique</h5>
                            <select class="form-control" name="chartType" id="chartType" onchange="updateChartType()">
                                <option value="line">Line</option>
                                <option value="bar">Bar</option>
                                <option value="radar">Radar</option>
                                <option value="polarArea">Polar Area</option>
                                <option value="doughnut">Doughnut</option>
                            </select>
                            <div>
                                <span id="loading"></span>
                                <span id="output"></span>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="sin-chart-responsive">
                            <canvas id="myChart" width="600" height="600"></canvas>
                            <!--canvas id="myChart" class="table" style="min-height:320px; max-height:400px"></canvas-->
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        <div id="data-table" class="row mt-3">

        </div>
    </div>
    <script>
        // Define data set for all charts
        let dataBaby = [1, 10, 5, 2, 20, 30, 45];
        let moreDataBaby = [20, 30, 15, 12, 21, 30, 40];
        myData = {
            labels: [],
            datasets: [{
                    label: "",
                    fill: false,
                    backgroundColor: 'rgb(190, 99, 255, 0.6)',
                    borderColor: 'rgb(190, 99, 255)',
                    data: dataBaby,
                },
                {
                    label: "",
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: moreDataBaby,
                },
                {
                    label: "",
                    fill: true,
                    backgroundColor: 'rgba(55, 130, 212, 0.6)',
                    borderColor: 'rgb(55, 130, 212)',
                    data: moreDataBaby,
                },
                {
                    label: "",
                    fill: true,
                    backgroundColor: 'rgba(25, 99, 132, 0.6)',
                    borderColor: 'rgb(25, 99, 132)',
                    data: moreDataBaby,
                }
            ],
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Custom Chart Title',
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    }
                }
            }
        };
        // Default chart defined with type: 'line'
        //Chart.defaults.global.defaultFontFamily = "monospace";
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: myData
        });
        // Function runs on chart type select update
        function updateChartType() {
            // Since you can't update chart type directly in Charts JS you must destroy original chart and rebuild
            myChart.destroy();
            myChart = new Chart(ctx, {
                type: document.getElementById("chartType").value,
                data: myData,
            });
        };
        // Randomize data button function
        function randomizeData() {
            let newDataBaby = dataBaby.map(x => Math.floor(Math.random() * 50));
            let newMoreDataBaby = moreDataBaby.map(x => Math.floor(Math.random() * 40));
            myData.datasets[0].data = newDataBaby
            myData.datasets[1].data = newMoreDataBaby
            myChart.update();
            console.log(newDataBaby);
        };

        let commune = {
            "id": "",
            "slug1": '{{ isset($dataCompare) ? $dataCompare['data_commune_1'] : null }}',
            "slug2": '{{ isset($dataCompare) ? $dataCompare['data_commune_2'] : null }}',
            "slug3": '{{ isset($dataCompare) ? $dataCompare['data_commune_3'] : null }}',
            "slug4": '{{ isset($dataCompare) ? $dataCompare['data_commune_4'] : null }}',
            "annee": '{{ isset($dataCompare) ? $dataCompare['annee'] : null }}'
        }

        function show(btn) {
            commune.id = btn.id
            console.log('Button id:', commune);
            var loading = document.getElementById('loading')
            var output = document.getElementById('output')
            loading.className = "spinner-border"
            output.innerText = "Chargement en cours...."
            $.ajax({
                //alert('coucou');
                url: '/datas/' + JSON.stringify(commune),
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(dataCmp) {
                    console.log('data: ' + JSON.stringify(dataCmp) + ' ' + commune.slug1);
                    //var response = JSON.parse(data);
                    //console.log(response);
                    if (dataCmp) {
                        myData.labels = dataCmp.labels
                        myData.datasets[0].label = dataCmp.commune_1
                        myData.datasets[1].label = dataCmp.commune_2
                        myData.datasets[2].label = dataCmp.commune_3
                        myData.datasets[3].label = dataCmp.commune_4

                        myData.datasets[0].data = dataCmp.data1
                        myData.datasets[1].data = dataCmp.data2
                        myData.datasets[2].data = dataCmp.data3
                        myData.datasets[3].data = dataCmp.data4
                        myChart.update();
                        loading.classList.remove("spinner-border")
                        output.innerText = dataCmp.name
                        $('#data-table').empty()
                        $('#data-table').addClass("card1")
                        $('#data-table').append(
                            '<div class="col-12 col-md-10 font-weight-bolder text-center text-uppercase">' + dataCmp
                            .name + '</div>');
                        $('#data-table').append(
                            `<div class="col-12 table-responsive px-0 mt-2">
                        <table id="data-input" class="table-sm table-hover mx-auto mb-3 ">  </table></div>`);
                        $('#data-input').append(`
                        <thead> 
                            <tr id="input-head"> 
                                <th class="sin-table-bg align-middle">Communes</th> 
                            </tr> 
                        </thead>`)
                        $.each(dataCmp.labels, function(key, value) {
                            $('#input-head').append('<th class="sin-table-bg align-middle">' + value +
                                '</th>');
                        });

                        if (dataCmp.data1 != null) {
                            $('#data-input').append('<tr id="commune_1"> <th>' + dataCmp.commune_1 +
                                '</th> </tr>')
                            $.each(dataCmp.data1, function(key, value) {
                                value = (value != null) ? value.toString().replace(
                                    /\B(?=(\d{3})+(?!\d))/g, ".") : 0
                                $('#commune_1').append('<td>' + value + '</td>');
                            });
                        }
                        if (dataCmp.data2 != null) {
                            $('#data-input').append('<tr id="commune_2"> <th>' + dataCmp.commune_2 +
                                '</th> </tr>')
                            $.each(dataCmp.data2, function(key, value) {
                                value = (value != null) ? value.toString().replace(
                                    /\B(?=(\d{3})+(?!\d))/g, ".") : 0
                                $('#commune_2').append('<td>' + value + '</td>');
                            });
                        }
                        if (dataCmp.data3 != null) {
                            $('#data-input').append('<tr id="commune_3"> <th>' + dataCmp.commune_3 +
                                '</th> </tr>')
                            $.each(dataCmp.data3, function(key, value) {
                                value = (value != null) ? value.toString().replace(
                                    /\B(?=(\d{3})+(?!\d))/g, ".") : 0
                                $('#commune_3').append('<td>' + value + '</td>');
                            });
                        }
                        if (dataCmp.data4 != null) {
                            $('#data-input').append('<tr id="commune_4"> <th>' + dataCmp.commune_4 +
                                '</th> </tr>')
                            $.each(dataCmp.data4, function(key, value) {
                                value = (value != null) ? value.toString().replace(
                                    /\B(?=(\d{3})+(?!\d))/g, ".") : 0
                                $('#commune_4').append('<td>' + value + '</td>');
                            });
                        }
                    } else {


                    }
                }
            });
        }
    </script>


</body>

</html>
