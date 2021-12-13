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
        ['Task', 'montant'],
        ['Attendu', {{ isset($troisMeilleur) ? $troisMeilleur[0]->attendu : 1 }} ],
        ['Contribution', {{isset($troisMeilleur) ? $troisMeilleur[0]->contribution : 0 }}],
    ]);
    var data1 = google.visualization.arrayToDataTable([
        ['Task', 'montant'],
        ['Attendu', {{ isset($troisMeilleur) ? $troisMeilleur[1]->attendu : 1 }} ],
        ['Contribution', {{isset($troisMeilleur) ? $troisMeilleur[1]->contribution : 0 }}],
    ]);
    var data2 = google.visualization.arrayToDataTable([
        ['Task', 'montant'],
        ['Attendu', {{ isset($troisMeilleur) ? $troisMeilleur[2]->attendu : 1 }} ],
        ['Contribution', {{isset($troisMeilleur) ? $troisMeilleur[2]->contribution : 0 }}],
    ]);

    var options = {
        title: '{{ isset($troisMeilleur) ? $troisMeilleur[0]->marche : '
        ' }}',
        legend: 'none',
        pieSliceText: 'label',
        pieStartAngle: 100,
        is3D: true,
        chartArea: {
            left: 20,
            top: 20,
            width: '100%',
            height: '100%'
        },
    };

    var options1 = {
        title: '{{ isset($troisMeilleur) ? $troisMeilleur[1]->marche : '
        ' }}',
        legend: 'none',
        pieSliceText: 'label',
        pieStartAngle: 100,
        is3D: true,
        chartArea: {
            left: 20,
            top: 20,
            width: '100%',
            height: '100%'
        },
    };

    var options2 = {
        title: '{{ isset($troisMeilleur) ? $troisMeilleur[2]->marche : '
        '}}',
        legend: 'none',
        pieSliceText: 'label',
        pieStartAngle: 100,
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
    chart1.draw(data1, options1);
    chart2.draw(data2, options2);

    $(window).smartresize(function() {
        chart.draw(data, options);
        chart1.draw(data1, options1);
        chart2.draw(data2, options2);
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
                <a href="{{ route('actu') }}" class="btn sin-bg-3 my-1 font-weight-bold text-white">Actualités</a>
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
                    <form class="row mb-3 p-0" action="{{ route('acceuil') }}" method="get">
                        <div class="col p-0">
                            <div class="col-sm-12 sin-bg-2 p-0">
                                <div class="form-group mt">
                                    <select class="form-control mt-1" id="country" name="country" required>
                                        <option value="">{{ __('-- Sélectionnez votre pays --') }}</option>
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
                                <div class="row p_region justify-content-between">
                                    <div class=" col-6 col-md ">
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
                                    <div class="col-6 col-md">
                                        <div class="form-group">
                                            <select class="form-control " id="province" name="province" required>

                                            </select>
                                            @error('province')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md">
                                        <div class="form-group">
                                            <select class="form-control" id="commune" name="commune" required>

                                            </select>
                                            @error('commune')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md">
                                        <div class="form-group">
                                            <select class="form-control" id="commune4" name="annee" required>
                                                <option value="">{{ __('-- Sélectionnez l’année --') }}</option>
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
                                <button type="submit"
                                    class="btn sin-bg-3 my-1 font-weight-bold text-white">Valider</button>
                                <!--a class="btn sin-bg-3" href="{{ route('datas.cmp') }}">Comparaison</a>
                                <a class="btn sin-bg-3" href="{{ route('pdf') }}">Exporter</a-->
                            </div>
                            <p class="my-0">
                                <strong>
                                    <span class="badge badge-dark">
                                        #Commune:
                                    </span>
                                </strong>

                                <small>
                                    {{ isset($dataCommune) ? App\Models\Datas\Data::find($dataCommune->id)->commune->commune_name : 'inexistante'}}

                                </small>

                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="sin-title">Contribution des trois (03) meilleurs marchés</p>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg justify-content-center">
                            <!-- <div class = " div_in_card">
                                                                  <h4 >village 1</h4>
                                                                  <div id="piechart_3d" style="width: auto; height: auto;"></div>
                                                                  
                                                                  </div> -->
                            <div class="card">
                                <h4 class="card-header">Marché 1</h4>
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
                                <h4 class="card-header">Marché 2</h4>
                                <div class="card-body p-0">
                                    <div id="piechart_4d" style="width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg justify-content-center">
                            <div class="card">
                                <h4 class="card-header">Marché 3</h4>
                                <div class="card-body p-0">
                                    <div id="piechart_5d" style="width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 sin-btn-data">
                    <a class="btn sin-bg-3 font-weight-bold text-white"
                        href="{{ route('datas.tdb', isset($dataCommune) ? $dataCommune['slug'] : 'tdb') }}">
                        Données(TdB)</a>
                    <a class="btn sin-bg-3 font-weight-bold text-white"
                        href="{{ route('datas.cmp', isset($dataCommune) ? $dataCommune['slug'] : 'cmp') }}">Comparaison</a>
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
        <div class="col-6 col-lg-2 mt-3" title="Informations générales">
            <a id="inf" class="col-card card w-75 p-2"
                href="{{ route('datas.info',isset($dataCommune) ? $dataCommune['slug'] : 'info_generale') }}">
                <img class="mx-auto" src="img/infog.png" alt="img tdb">
                <h4 class="m-auto font-weight-bolder">Info G</h4>
            </a>
        </div>
        <div class="col-6 col-lg-2 mt-3" title="Plan Communal de Développement">
            <a id="pcd" class="col-card card w-75 p-2"
                href="{{ route('datas.pcd', isset($dataCommune) ? $dataCommune['slug'] : 'pcd') }}">
                <img class="mx-auto" src="img/pcd.png" alt="img pcd">
                <h4 class="m-auto font-weight-bolder">PCD</h4>
            </a>
        </div>
        <div class="col-6 col-lg-2 mt-3" title="Informations budgétaires">
            <a id="budget" class="col-card card w-75 p-2"
                href="{{ route('datas.bg', isset($dataCommune) ? $dataCommune['slug'] : 'bg') }}">
                <img class="mx-auto" src="img/budget.png" alt="img budget">
                <h4 class="m-auto font-weight-bolder">Budget</h4>
            </a>
        </div>
        <div class="col-6 col-lg-2 mt-3" title="Tableau de Bord">
            <a id="tdb" class="col-card card w-75 p-2"
                href="{{ route('datas.tdb', isset($dataCommune) ? ['bilan',$dataCommune['slug']] : 'tdb') }}">
                <img class="mx-auto" src="img/tdb.png" alt="img tdb">
                <h4 class="m-auto font-weight-bolder">Tdb</h4>
            </a>
        </div>

        <!-- start button -->

        <!-- end button -->
    </div>
</div>
<script src="{{ asset('js/country.js') }}"></script>

@stop