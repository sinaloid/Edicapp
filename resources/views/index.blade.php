@extends('template.app')

@section('titlePage')
    <title>EDICApp - Acceuil </title>
@stop

@section('script')
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);
            var data1 = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 70]
            ]);
            var data2 = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 22],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);

            var options = {
                title: 'Nom du village',
                is3D: true,
                chartArea: {
                    left: 20,
                    top: 20,
                    width: '100%',
                    height: '100%'
                },
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            var chart1 = new google.visualization.PieChart(document.getElementById('piechart_4d'));
            var chart2 = new google.visualization.PieChart(document.getElementById('piechart_5d'));
            chart.draw(data, options);
            chart1.draw(data1, options);
            chart2.draw(data2, options);

            $(window).smartresize(function() {
                chart.draw(data, options);
                chart1.draw(data1, options);
                chart2.draw(data2, options);
            });
        }

    </script>
    <script src="js/edicappresize.js"></script>
@stop

@section('content')
    <div class="container sin-m-t pb-0 bg-white">
        <div class="row banier">
            <img class="col-sm-12 img-fluid " src="{{ asset('img/EDICApp_banier.png') }}" alt="bannier EDICApp" />
            <div class="col-sm-12 card sin-bg-2 banier_img1">
                <div class="card-body">
                    <div class="card-text mb-2" onload="javascript:setTimeout('location.reaload(true);',35);">
                        <q>@include('pages.includes.mgs')</q>

                    </div>
                    <!-- <h4 class="card-title">Auteur Inconnue</h4> -->
                    <a href="{{ route('actu') }}" class="btn sin-bg-3">Actualité</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-0">
        <!-- <form method="post" action="">
                                                <div class="row">
                                                   <div class="col-sm-10">
                                                      <input class = "mb-0" type="text" name="query" placeholder="Rechercher par pays, region, données...">
                                                   </div>
                                                   <div class="col-sm-2">
                                                      <input type="submit" value="OK!">
                                                   </div>
                                                </div>
                                                </form> -->
        <form class="form-inline justify-content-center">
            <input class="form-control mr-sm-2 w-75" type="search" placeholder="Rechercher" aria-label="Search">
            <button class="btn sin-btn btn-outline-success1 my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </div>
    <div class="container">
        <!-- Data Country -->
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-9 card">
                <p class="sin-title">Données par pays</p>
                <div class="row">
                    <div class="col-sm-12 sin-bg-2">
                        <!--select>
                                <option>Burkina Faso</option>
                                <option>Mali</option>
                                <option>Côte d'Ivoire</option>
                            </select-->
                        <div class="form-group">
                            <select class="form-control my-1" id="pays">
                                <option>Burkina Faso</option>
                                <option>Mali</option>
                                <option>Côte d'Ivoire</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <!--Liste deroulante des pays<br /> -->
                        <!--Selection region les region seront ajoute grâçe une boocle php-->
                        <div class="row p_region justify-content-between">
                            <div class="col-6 col-md">
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
                            <div class="col-6 col-md">
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
                            <div class="col-12 col-md">
                                <div class="form-group">
                                    <select class="form-control" name="commune" class="w-100">
                                        <option>commune</option>
                                        <option>Korsimoro</option>
                                        <option>nom commune 1</option>
                                        <option>Etc ...</option>
                                    </select>
                                </div>
                            </div>
                            <!--<div class="col-3 col-md">
                                                               <p>Autre...</p>
                                                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="sin-title">Contribution des trois (03) meilleurs marché</p>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg justify-content-center">
                                <!-- <div class = " div_in_card">
                                                                  <h4 >village 1</h4>
                                                                  <div id="piechart_3d" style="width: auto; height: auto;"></div>
                                                                  
                                                                  </div> -->
                                <div class="card">
                                    <h4 class="card-header">village 1</h4>
                                    <div class="card-body p-0">
                                        <!-- <h5 class="card-title">Nom du village</h5> -->
                                        <div id="piechart_3d" style="width: 100%;"></div>
                                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                        <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg justify-content-center">
                                <div class="card">
                                    <h4 class="card-header">village 2</h4>
                                    <div class="card-body p-0">
                                        <div id="piechart_4d" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg justify-content-center">
                                <div class="card">
                                    <h4 class="card-header">village 3</h4>
                                    <div class="card-body p-0">
                                        <div id="piechart_5d" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 sin-btn-data">
                        <a class="btn sin-bg-3" href="{{ route('datas.tdb') }}"> Données(TdB)</a>
                        <a class="btn sin-bg-3" href="{{ route('datas.cmp') }}">Comparaison</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 card p-0">
                <p class="sin-title">carte</p>
                <!--svg-->
                @include("svg")
            </div>
        </div>
        <!--Categorie -->
        <div class="row justify-content-center">
            <p class="col-12 text-white sin-title">Données par catégories</p>
            <div class="col-6 col-lg-3 mt-3 text-center">
                <a id="inf" class="col-card sincard  " href="{{ route('datas.info') }}">
                    <img src="img/info.png" alt="img info">
                    <h4><b>Info G</b></h4>
                </a>
            </div>
            <div class="col-6 col-lg-3 mt-3  text-center">
                <a id="pcd" class="col-card sincard " href="{{ route('datas.pcd') }}">
                    <img src="img/pcd.png" alt="img pcd">
                    <h4><b>PCD</b></h4>
                </a>
            </div>
            <div class="col-6 col-lg-3 mt-3  text-center">
                <a id="budget" class="col-card sincard" href="{{ route('datas.bg') }}">
                    <img src="img/budget.png" alt="img budget">
                    <h4><b>Budget</b></h4>
                </a>
            </div>
            <div class="col-6 col-lg-3 mt-3  text-center">
                <a id="tdb" class="col-card sincard" href="{{ route('datas.tdb') }}">
                    <img src="img/tdb.png" alt="img tdb">
                    <h4><b>TdB</b></h4>
                </a>
            </div>
            <!-- start button -->
            <script>
                //sauvegarde local du tabmenu actif
                $(document).ready(function() {
                    localStorage.setItem('activeTab', '');
                    $("#inf").click(function() {
                        localStorage.setItem('activeTab', '#info');
                    });
                    $("#pcd").click(function() {
                        localStorage.setItem('activeTab', '#pcd');
                    });
                    $("#budget").click(function() {
                        localStorage.setItem('activeTab', '#budget');
                    });
                    $("#tdb").click(function() {
                        localStorage.setItem('activeTab', '#tdb');
                    });


                });

            </script>
            <!-- end button -->
        </div>
    </div>
@stop
