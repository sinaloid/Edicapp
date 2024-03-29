@extends('layout.app')

@section('title')
    <title>Edic - Accueil</title>
    <link href="{{ asset('/css/table.css') }}" rel="stylesheet">
@endsection
@section('content')
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
            <button class="btn btn-edic mt-2" data-bs-toggle="modal" data-bs-target="#communeModal">Modifier</button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-md-10 mx-auto bg-white">
            <div class="row">
                <div class="col-12 col-md-4 mb-3">
                    <p class="font-weight-bold card-header "> Données</p>
                    <div id="accordion" class="px-2">
    
                        <div class="">
                            <div class="my-1">
                                <a class="btn btn-edic w-100 font-weight-bold" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    Info Générale
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="p-0">
                                    <div class="list-group">
                                        <button id="recetteInvest" href="#" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Recettes
                                            d'investissement</button>
                                        <button id="recetteFonct" href="#" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Recettes
                                            fonctionnement</button>
                                        <button href="#" id="depenseInvest" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses
                                            d'investissement</button>
                                        <button href="#" id="depenseFonct" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses
                                            fonctionnement</button>
                                        <button id="marchesAttendu" class="list-group-item list-group-item-action"
                                            onclick="show(this)">3
                                            meilleurs marchers - attendu</button>
                                        <button id="marchesMobilise" class="list-group-item list-group-item-action"
                                            onclick="show(this)">3
                                            meilleurs marchers - mobilisé</button>
                                        <button id="villagesAttendu" class="list-group-item list-group-item-action"
                                            onclick="show(this)">10
                                            meilleurs villages - attendu</button>
                                        <button id="villagesMobilise" class="list-group-item list-group-item-action"
                                            onclick="show(this)">10
                                            meilleurs villages - mobilisé</button>
                                        <button id="etatCivil" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Etat
                                            civil</button>
                                        <button id="situationDomaniale" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Situation domaniale</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    
    
                        <div class="">
                            <div class="mb-1">
                                <button class="btn btn-edic w-100 font-weight-bold" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Budget {{ isset($dataCompare) ? $dataCompare['annee'] : 'année null' }}
                                </button>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="p-0">
                                    <div class="list-group">
                                        <button id="recetInves" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Recettes
                                            d'investissement</button>
                                        <button id="recetFonct" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Recettes
                                            de fonctionnement
                                        </button>
                                        <button id="depensInvest" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses
                                            d'investissement
                                        </button>
                                        <button id="depensFonct" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses de
                                            fonctionnement
                                        </button>
    
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="">
                            <div class="">
                                <button class="btn btn-edic w-100 font-weight-bold" data-bs-toggle="collapse" data-bs-target="#collapseFor">
                                    Budget {{ isset($dataCompare) ? $dataCompare['annee'] + 1 : 'année null' }}
                                </button>
                            </div>
                            <div id="collapseFor" class="collapse" data-parent="#accordion">
                                <div class="p-0">
                                    <div class="">
                                        <button id="recetInvestn" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Recettes
                                            d'investissement</button>
                                        <button id="recetFonctn" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Recettes
                                            de fonctionnement
                                        </button>
                                        <button id="depensInvestn" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses
                                            d'investissement
                                        </button>
                                        <button id="depensFonctn" class="list-group-item list-group-item-action"
                                            onclick="show(this)">Dépenses de
                                            fonctionnement
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="row card-header">
                        <p class="font-weight-bold">Visualisation de données</p>
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
                    <canvas id="myChart"></canvas>
                  </div>
                <!--div class="col-12 mb-3">
                    <div class="row card-header">
                        <p class="font-weight-bold">Visualisation de données</p>
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
                    <div class="row table-responsive1">
                        <div class=" col-12 sin-chart-responsive1">
                            <canvas id="myChart" width="200px" height="200px"></canvas>
                            <canvas id="myChart" class="table" style="min-height:320px; max-height:400px"></canvas>
                        </div>
                    </div>
    
                </div-->
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 col-md-10 mx-auto bg-white">
            <div id="data-table" class="">

            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="communeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Choississiez les communes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row" action="{{ route('datas.cmpdt') }}" method="get">
                        <div class="mb-3 ">
                            <label for="commune"
                                class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">Commune
                                n&deg 1</label>
                            <input type="text" class="form-control" id="commune_1" name="commune_1"
                                placeholder="Ouagadougou" autocomplete="off" required>

                            @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <label for="commune"
                                class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">Commune
                                n&deg 2</label>
                            <input type="text" class="form-control" id="commune_2" name="commune_2"
                                placeholder="Ouagadougou" autocomplete="off">

                            @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <label for="commune"
                                class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">Commune
                                n&deg 3</label>
                            <input type="text" class="form-control" id="commune_3" name="commune_3"
                                placeholder="Ouagadougou" autocomplete="off">

                            @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 ">
                            <label for="commune"
                                class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">Commune
                                n&deg 4</label>
                            <input type="text" class="form-control" id="commune_4" name="commune_4"
                                placeholder="Ouagadougou" autocomplete="off">

                            @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="annee"
                                class="col-12 col-md-4 col-form-label @error('annee') is-invalid @enderror text-md-right">{{ __('Année') }}</label>
                            <select class="form-control m-0" id="annee" name="annee" required>
                                <option value="">{{ __('-- Sélectionnez l’année --') }}</option>
                                @for ($i = Date('Y'); 2000 <= $i; $i--)
                                    <option value="{{ $i }}">
                                        {{ $i }}</option>
                                @endfor
                            </select>
                            @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="hidden" name="viewName" value="{{ Route::currentRouteName() }}">
                        <div class="col-12 d-flex justify-content-center mb-5">
                            <button type="button" class="btn btn-edic font-weight-bold mx-1" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-edic font-weight-bold mx-1">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
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
            data: myData,
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
                            '<div class="col-12 col-md-10 font-weight-bolder text-center text-uppercase">' +
                            dataCmp
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
@endsection
