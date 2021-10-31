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
    <link href="{{ asset('/css/table.css') }}" rel="stylesheet">
    <!-- jQuery library -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    @include("header")

    <div class="container mx-auto1 sin-m-t myform1">

        <div class="row">
            <div class="col-12 card">
                <div class="card-header">
                    Sources des données
                </div>
                <div class="card-body">
                    <div class="row card-title">
                        <div class="col-5 col-md-2 font-weight-bold">Pays :</div>
                        <div class="col-7 col-md-10">{{ isset($dataCompare) ? $dataCompare["pays"] : 'Pays null'}}</div>
                    </div>
                    <div class="row card-title">
                        <div class="col-5 col-md-2 font-weight-bold">Region :</div>
                        <div class="col-7 col-md-10">
                            @php

                            if($dataCompare != null){
                            $str = $dataCompare["region"];
                            if($dataCompare["region_2"] !=''){
                            $str = $str.' et '.$dataCompare["region_2"];
                            }

                            echo $str;
                            }
                            @endphp </div>
                    </div>
                    <div class="row card-title">
                        <div class="col-5 col-md-2 font-weight-bold">Province :</div>
                        <div class="col-7 col-md-10">
                            @php

                            if($dataCompare != null){
                            $str = $dataCompare["province"];
                            if($dataCompare["province_2"] !=''){
                            $str = $str.' et '.$dataCompare["province_2"];
                            }

                            echo $str;
                            }
                            @endphp
                        </div>
                    </div>
                    <div class="row card-title ">
                        <div class="col-5 col-md-2 font-weight-bold">Commune :</div>
                        <div class="col-7 col-md-10 ">
                            @php
                            if($dataCompare != null){
                            $str = $dataCompare["commune_1"];
                            if($dataCompare["commune_2"] !=''){
                            $str = $str.' , '.$dataCompare["commune_2"];
                            }
                            if($dataCompare["commune_3"] !=''){
                            $str = $str.' , '.$dataCompare["commune_3"];
                            }
                            if($dataCompare["commune_4"] !=''){
                            $str = $str.' et '.$dataCompare["commune_4"];
                            }

                            echo $str;
                            }
                            @endphp
                        </div>

                    </div>
                    <div class="row card-title">
                        <div class="col-5 col-md-2 font-weight-bold">Année :</div>
                        <div class="col-7 col-md-10">{{ isset($dataCompare) ? $dataCompare["annee"] : 'année null'}}
                        </div>
                    </div>
                    <a class="btn sin-bg-3 mt-2" href="{{ route('datas.cmp') }}">Modifier</a>
                </div>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-12 col-md-4 card mt-3">
                <p class="font-weight-bold mt-2"> Choix de donnée</p>
                <div id="accordion">

                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            Info Générale
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body p-0">
                                <div class="list-group">
                                    <button id="recetteInvest" href="#" class="list-group-item list-group-item-action"
                                        onclick="show(this)">Recettes d'investissement</button>
                                    <button id="recetteFonct" href="#" class="list-group-item list-group-item-action"
                                        onclick="show(this)">Recettes fonctionnement</button>
                                    <button href="#" id="depenseInvest"
                                        class="list-group-item list-group-item-action list-group-item-success"
                                        onclick="show(this)">Dépenses
                                        d'investissement</button>
                                    <button href="#" id="depenseFonct"
                                        class="list-group-item list-group-item-action list-group-item-success"
                                        onclick="show(this)">Dépenses
                                        fonctionnement</button>
                                    <button id="marchesAttendu"
                                        class="list-group-item list-group-item-action list-group-item-secondary"
                                        onclick="show(this)">3
                                        meilleurs marchers - attendu</button>
                                    <button id="marchesMobilise"
                                        class="list-group-item list-group-item-action list-group-item-secondary"
                                        onclick="show(this)">3
                                        meilleurs marchers - mobilisé</button>
                                    <button id="villagesAttendu"
                                        class="list-group-item list-group-item-action list-group-item-info"
                                        onclick="show(this)">10
                                        meilleurs villages - attendu</button>
                                    <button id="villagesMobilise"
                                        class="list-group-item list-group-item-action list-group-item-info"
                                        onclick="show(this)">10
                                        meilleurs villages - mobilisé</button>
                                    <button id="etatCivil"
                                        class="list-group-item list-group-item-action list-group-item-warning"
                                        onclick="show(this)">Etat
                                        civil</button>
                                    <button id="situationDomaniale"
                                        class="list-group-item list-group-item-action list-group-item-danger"
                                        onclick="show(this)">Situation domaniale</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                Budget {{ isset($dataCompare) ? $dataCompare["annee"] : 'année null'}}
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body p-0">
                                <div class="list-group">
                                    <button id="recetInves" class="list-group-item list-group-item-action"
                                        onclick="show(this)">Recettes
                                        d'investissement</button>
                                    <button id="recetFonct"
                                        class="list-group-item list-group-item-action list-group-item-success"
                                        onclick="show(this)">Recettes
                                        de fonctionnement
                                    </button>
                                    <button id="depensInvest"
                                        class="list-group-item list-group-item-action list-group-item-secondary"
                                        onclick="show(this)">Dépenses
                                        d'investissement
                                    </button>
                                    <button id="depensFonct"
                                        class="list-group-item list-group-item-action list-group-item-info"
                                        onclick="show(this)">Dépenses de
                                        fonctionnement
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseFor">
                                Budget {{ isset($dataCompare) ? $dataCompare["annee"] + 1 : 'année null'}}
                            </a>
                        </div>
                        <div id="collapseFor" class="collapse" data-parent="#accordion">
                            <div class="card-body p-0">
                                <div class="list-group">
                                    <button id="recetInvestn" class="list-group-item list-group-item-action"
                                        onclick="show(this)">Recettes
                                        d'investissement</button>
                                    <button id="recetFonctn"
                                        class="list-group-item list-group-item-action list-group-item-success"
                                        onclick="show(this)">Recettes
                                        de fonctionnement
                                    </button>
                                    <button id="depensInvestn"
                                        class="list-group-item list-group-item-action list-group-item-secondary"
                                        onclick="show(this)">Dépenses
                                        d'investissement
                                    </button>
                                    <button id="depensFonctn"
                                        class="list-group-item list-group-item-action list-group-item-info"
                                        onclick="show(this)">Dépenses de
                                        fonctionnement
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-8 card mt-3">
                <p class="font-weight-bold mt-2"> Choix de la vue de données</p>
                <div class="row card-header">
                    <!--div class="btn-group btn-group-sm">
                        <button type="button" id='line' class="btn sin-bg-3">Line</button>
                        <button type="button" id="pie" class="btn sin-bg-3">Pie</button>
                        <button type="button" id="bar" class="btn sin-bg-3">Bar</button>
                    </div-->
                    <div class="controls">
                        <h5 class="label">Type de graphique</h5>
                        <select class="form-control" name="chartType" id="chartType" onchange="updateChartType()">
                            <option value="line">Line</option>
                            <option value="bar">Bar</option>
                            <option value="radar">Radar</option>
                            <option value="polarArea">Polar Area</option>
                            <option value="doughnut">Doughnut</option>
                        </select>
                        <!--button onclick="randomizeData()">Randomize Data!</button-->
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
        <div id="data-table" class="row mt-3">
            
        </div>
    </div>

    <!--div class="container card mt-2 px-1">

        <div class="row mt-2">
            <div class="col-12 text-center">
                Tableau recapitulatif
            </div>
        </div>
        <div class="row myform p-0 mx-auto">
            <div class="col-12 p-1">
                <p class="card-header"> commune 1</p>
                <div class="col-12 table-responsive px-0">
                    <table class="table table-hover">
                        <caption> Contribution des dix (10) meilleurs villages (toute contribution)</caption>
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">1 er</th>
                                <th class="sin-table-bg">2 ème</th>
                                <th class="sin-table-bg">3 ème</th>
                                <th class="sin-table-bg">4 ème</th>
                                <th class="sin-table-bg">5 ème</th>
                                <th class="sin-table-bg">6 ème</th>
                                <th class="sin-table-bg">7 ème</th>
                                <th class="sin-table-bg">8 ème</th>
                                <th class="sin-table-bg">9 ème</th>
                                <th class="sin-table-bg">10 ème</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>Le village</th>
                            <td>Raguèguéma</td>
                            <td>Ronsin</td>
                            <td>Sanh</td>
                            <td>Marmissiga</td>
                            <td>Bouri</td>
                            <td>Guésséré</td>
                            <td>Robondé</td>
                            <td>Masboré</td>
                            <td>Lèba</td>
                            <td>Bouloulou</td>
                        </tr>
                        <tr>
                            <th>Montant attendu</th>
                            <td>11 000</td>
                            <td>12 000</td>
                            <td>47 000</td>
                            <td>10 000</td>
                            <td>13 000</td>
                            <td>21 000</td>
                            <td>13 000</td>
                            <td>29 000</td>
                            <td>33 000</td>
                            <td>18 000</td>
                        </tr>
                        <tr>
                            <th>Montant mobilisé</th>
                            <td>11 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                        </tr>
                        <tr>
                            <th>Taux mobilisation /Prévisions</th>
                            <td>100%</td>
                            <td>1200%</td>
                            <td>4700%</td>
                            <td>100%</td>
                            <td>1200%</td>
                            <td>4700%</td>
                            <td>100%</td>
                            <td>1200%</td>
                            <td>4700%</td>
                            <td>100%</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-12 ">
                <p class="card-header"> commune 2</p>
                <div class="col-12  px-0">
                    <table class="table table-responsive table-hover">
                        <caption> Contribution des dix (10) meilleurs villages (toute contribution)</caption>
                        <thead>
                            <tr>
                                <th class="sin-table-bg">#</th>
                                <th class="sin-table-bg">1 er</th>
                                <th class="sin-table-bg">2 ème</th>
                                <th class="sin-table-bg">3 ème</th>
                                <th class="sin-table-bg">4 ème</th>
                                <th class="sin-table-bg">5 ème</th>
                                <th class="sin-table-bg">6 ème</th>
                                <th class="sin-table-bg">7 ème</th>
                                <th class="sin-table-bg">8 ème</th>
                                <th class="sin-table-bg">9 ème</th>
                                <th class="sin-table-bg">10 ème</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>Le village</th>
                            <td>Raguèguéma</td>
                            <td>Ronsin</td>
                            <td>Sanh</td>
                            <td>Marmissiga</td>
                            <td>Bouri</td>
                            <td>Guésséré</td>
                            <td>Robondé</td>
                            <td>Masboré</td>
                            <td>Lèba</td>
                            <td>Bouloulou</td>
                        </tr>
                        <tr>
                            <th>Montant attendu</th>
                            <td>11 000</td>
                            <td>12 000</td>
                            <td>47 000</td>
                            <td>10 000</td>
                            <td>13 000</td>
                            <td>21 000</td>
                            <td>13 000</td>
                            <td>29 000</td>
                            <td>33 000</td>
                            <td>18 000</td>
                        </tr>
                        <tr>
                            <th>Montant mobilisé</th>
                            <td>11 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                            <td>1 000</td>
                        </tr>
                        <tr>
                            <th>Taux mobilisation /Prévisions</th>
                            <td>100%</td>
                            <td>1200%</td>
                            <td>4700%</td>
                            <td>100%</td>
                            <td>1200%</td>
                            <td>4700%</td>
                            <td>100%</td>
                            <td>1200%</td>
                            <td>4700%</td>
                            <td>100%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div-->
    <!--script src="{{ asset('js/script.js') }}"></script-->

    <!--script>
    $(document).ready(function() {
    
    $('#recette').on('click', function() {
       console.log('good')
        //let country_id = $(this).val();
        
        /*if (country_id) {
            //alert('coucou');
            $.ajax({
                //alert('coucou');
                url: '/country/' + country_id,
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    //var response = JSON.parse(data);
                    //console.log(response);
                    if (data) {
                        $('#region_2').empty();
                        $('#province_2').empty();
                        $('#commune_2').empty();
                        $('#region_2').focus;
                        $('#region_2').append(
                            '<option value="">-- Sélectionnez votre region --</option>');
                        $.each(data, function(key, value) {
                            $('select[name="region_2"]').append(
                                '<option value="' + key + '">' + value
                                 + '</option>');
                        });
                    } else {
                        $('#region_2').empty();
                        $('#province_2').empty();
                        $('#commune_3').empty();
                        $('#commune_4').empty();

                    }
                }
            });
            
        } else {
            $('#region_2').empty();
            $('#province_2').empty();
            $('#commune_3').empty();
            $('#commune_4').empty();

            $('#region').empty();
            $('#province').empty();
            $('#commune').empty();

        }*/
    });
    // Define data set for all charts
    let dataBaby = [1, 10, 5, 2, 20, 30, 45];
    let moreDataBaby = [20, 30, 15, 12, 21, 30, 40];
    let moreDataBaby1 = [8, 15, 7, 5, 10, 15, 20];
    let moreDataBaby2 = [6, 10, 5, 4, 7, 9, 80];
    myData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
                label: "Data, baby!",
                fill: false,
                backgroundColor: 'rgb(190, 99, 255, 0.5)',
                borderColor: 'rgb(190, 99, 255)',
                data: dataBaby,
            },
            {
                label: "More data, baby!",
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgb(255, 99, 132)',
                data: moreDataBaby,
            },
            {
                label: "More data, baby 1!",
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgb(255, 99, 132)',
                data: moreDataBaby1,
            },
            {
                label: "More data, baby 2!",
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgb(255, 99, 132)',
                data: moreDataBaby2,
            }
        ]
    };

    // Default chart defined with type: 'line'
    //Chart.defaults.global.defaultFontFamily = "monospace";
    var ctx = document.getElementById('myChart')//.getContext('2d');
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
});
    </script-->

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
        "slug1": '{{ isset($dataCompare) ? $dataCompare["data_commune_1"] : null}}',
        "slug2": '{{ isset($dataCompare) ? $dataCompare["data_commune_2"] : null}}',
        "slug3": '{{ isset($dataCompare) ? $dataCompare["data_commune_3"] : null}}',
        "slug4": '{{ isset($dataCompare) ? $dataCompare["data_commune_4"] : null}}',
        "annee": '{{ isset($dataCompare) ? $dataCompare["annee"] :  null }}'
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
                    $('#data-table').addClass("card")
                    $('#data-table').append(
                        '<div class="col-12 font-weight-bolder text-center text-uppercase">'+dataCmp.name+'</div>');
                    $('#data-table').append(
                    `<div class="col-12 table-responsive px-0 mt-2">
                        <table id="data-input" class="table-sm table-hover mx-auto mb-3 ">  </table></div>`);
                    $('#data-input').append(`
                        <thead> 
                            <tr id="input-head"> 
                                <th class="sin-table-bg align-middle">Communes</th> 
                            </tr> 
                        </thead>`)
                    $.each(dataCmp.labels, function(key,value) {
                        $('#input-head').append('<th class="sin-table-bg align-middle">'+value+'</th>');});

                    if(dataCmp.data1 != null){
                        $('#data-input').append('<tr id="commune_1"> <th>'+dataCmp.commune_1+'</th> </tr>')
                        $.each(dataCmp.data1, function(key,value) {
                            value = (value !=null) ? value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : 0
                            $('#commune_1').append('<td>'+value+'</td>');});
                    }
                    if(dataCmp.data2 != null){
                        $('#data-input').append('<tr id="commune_2"> <th>'+dataCmp.commune_2+'</th> </tr>')
                        $.each(dataCmp.data2, function(key,value) {
                            value = (value !=null) ? value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : 0
                            $('#commune_2').append('<td>'+value+'</td>');});
                    }
                    if(dataCmp.data3 != null){
                        $('#data-input').append('<tr id="commune_3"> <th>'+dataCmp.commune_3+'</th> </tr>')
                        $.each(dataCmp.data3, function(key,value) {
                            value = (value !=null) ? value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : 0
                            $('#commune_3').append('<td>'+value+'</td>');});
                    }
                    if(dataCmp.data4 != null){
                        $('#data-input').append('<tr id="commune_4"> <th>'+dataCmp.commune_4+'</th> </tr>')
                        $.each(dataCmp.data4, function(key,value) {
                            value = (value !=null) ? value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : 0
                            $('#commune_4').append('<td>'+value+'</td>');});
                    }
                } else {


                }
            }
        });
    }
    </script>
    @include("footer")

</body>

</html>