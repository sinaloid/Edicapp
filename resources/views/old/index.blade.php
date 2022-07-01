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
        legend: 'right',
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
        legend: 'right',
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
        legend: 'right',
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
<div class="container sin-m-t p-0 bg-white">
    <!--div class="row banier">
        <img class="col-sm-12 img-fluid " src="{{ asset('img/EDICApp_banier.png') }}" alt="bannier EDICApp" />
        <div class="col-sm-12 card sin-bg-2 banier_img1">
            <div class="card-body">
                <div class="card-text mb-2" onload="javascript:setTimeout('location.reaload(true);',35);">
                    <q>@include('pages.includes.mgs')</q>

                </div>
               
                <a href="{{ route('actu') }}" class="btn sin-bg-3 my-1 font-weight-bold text-white">Actualités</a>
            </div>
        </div>
    </div-->

    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <!--ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol-->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('img/EDICApp_banier.png') }}" class="d-block w-100" alt="...">
              <!--div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
              </div-->
            </div>
            <div class="carousel-item">
              <img src="{{ asset('img/bf.png') }}" class="d-block w-100" alt="...">
              <!--div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div-->
            </div>
            <!--div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
              </div>
            </div-->
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="col-12 text-center sin-bg-2">
        <p class="col-12">
            <q>@include('pages.includes.mgs')</q>
        </p>
      </div>
      <div class="row">
        <div class="col-12 col-md-4 px-3">
            <img class="rounded-circle" width="100%" src="{{ asset('img/data1.png') }}"  alt="image dataset">
          </div>
          <div class="col-12 col-md-8 px-4">
              <h1 class="mt-1 sin-bg-3 text-white">Plateforme d'access aux données budgétaires</h1>
              <div class="sin-bg-5 py-1 rounded">
                <p class="mx-3">
                    <ol class="ol-home py-0">
                        <li>Visualiser</li>
                        <li>Partager</li>
                        <li>Télécharger au format PDF, Csv, xls, json</li>
                    </ol>
                </p>
                <p class="mx-3 mt-0">Les données budgétaires des différentes communes du Burkina Faso.</p>
              </div>
            
            
          </div>
      </div>
</div>
<!--div class="container pb-0">
   
    <form class="form-inline justify-content-center">
        <input class="form-control mr-sm-2 w-75" type="search" placeholder="Rechercher" aria-label="Search">
        <button class="btn sin-btn  my-2 my-sm-0" type="submit">Rechercher</button>
    </form>
</div-->
<div id="donne_commune" class="container">
    <!-- Data Country -->
    <div class="row sin-bg-5">
        <div  class="col-11 col-md-8 mt-3 text-center mx-auto"> <h2 class="sin-bg-2">Sélectionnez une commune pour accéder à ces données budgétaires</h2></div>
        <div class="col-sm-12 px-3  col-md-8 col-lg-9">
            <hr/>
            <p class="sin-title my-3">Données par pays</p>
            <div class="row px-2 m-0">
                <div class="col-12 p-0">
                    <form class="row mb-3 p-0" action="{{ route('acceuil') }}" method="get">
                        <div class="col p-0">
                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <div class="col-12 p-0">Pays</div>
                                    <select class="form-control m-0" id="country" name="country" required>
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
                                    <div class=" col-6 col-md py-0">
                                        <div class="form-group">
                                            <div class="col-12 p-0">Région</div>
                                            <select class="form-control m-0" id="region" name="region" required>

                                            </select>
                                            @error('region')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-md py-0">
                                        <div class="form-group">
                                            <div class="col-12 p-0">Province</div>
                                            <select class="form-control m-0 " id="province" name="province" required>

                                            </select>
                                            @error('province')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md py-0">
                                        <div class="form-group">
                                            <div class="col-12 p-0">Commune</div>
                                            <select class="form-control m-0" id="commune" name="commune" required>

                                            </select>
                                            @error('commune')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md py-0">
                                        <div class="form-group">
                                            <div class="col-12 p-0">Année</div>
                                            <select class="form-control m-0" id="commune4" name="annee" required>
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
                        
                        <div class="col-12 p-0">
                            <div class="py-0">
                                <button type="submit"
                                    class="btn sin-bg-3 my-0 font-weight-bold text-white">Valider</button>
                                
                            </div>
                            <p class="my-0">
                                <strong>
                                    <span class="badge badge-dark">
                                        #Commune:
                                    </span>
                                </strong>

                                <small>
                                    {{ isset($dataCommune) ? App\Models\Datas\Data::find($dataCommune->id)->commune->commune_name." ".App\Models\Datas\Data::find($dataCommune->id)->annee : 'inexistante'}}

                                </small>

                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 px-2">
                    <hr class="p-0 m-0"/>
                    <h3 class="text-center">Contribution des trois (03) meilleurs marchés</h3>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg justify-content-center mt-2">
                            <div class="card">
                                <h4 class="card-header text-center sin-bg-2">Marché 1</h4>
                                <div class="card-body p-0">
                                    <div id="piechart_3d" style="width: 100%;"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg justify-content-center mt-2">
                            <div class="card">
                                <h4 class="card-header text-center sin-bg-2">Marché 2</h4>
                                <div class="card-body p-0">
                                    <div id="piechart_4d" style="width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg justify-content-center mt-2">
                            <div class="card">
                                <h4 class="card-header text-center sin-bg-2">Marché 3</h4>
                                <div class="card-body p-0">
                                    <div id="piechart_5d" style="width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sin-btn-data">
                    <a class="btn sin-bg-6 font-weight-bold text-white"
                        href="{{ route('datas.tdb', isset($dataCommune) ? $dataCommune['slug'] : 'tdb') }}">
                        Données(TdB)</a>
                    <a class="btn sin-bg-3 font-weight-bold text-white"
                        href="{{ route('datas.cmp', isset($dataCommune) ? $dataCommune['slug'] : 'cmp') }}">Comparaison</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-3 p-0">
            <p class="sin-title">carte d'Afrique</p>
            <!--svg-->
            @include("svg")
        </div>
    </div>
    <!--Categorie -->
    <div class="row justify-content-center sin-bg-2 py-3">
        <p class="col-12 sin-title">Données par catégories</p>
        <div class="col-6 col-lg-2 mt-3 card-btn" title="Informations générales">
            <a id="inf" class="col-card card w-75 p-2"
                href="{{ route('datas.info',isset($dataCommune) ? $dataCommune['slug'] : 'info_generale') }}">
                <img class="mx-auto" src="img/infog.png" alt="img tdb">
                <h4 class="m-auto font-weight-bolder">Info G</h4>
            </a>
        </div>
        <div class="col-6 col-lg-2 mt-3 card-btn" title="Plan Communal de Développement">
            <a id="pcd" class="col-card card w-75 p-2"
                href="{{ route('datas.pcd', isset($dataCommune) ? $dataCommune['slug'] : 'pcd') }}">
                <img class="mx-auto" src="img/pcd.png" alt="img pcd">
                <h4 class="m-auto font-weight-bolder">PCD</h4>
            </a>
        </div>
        <div class="col-6 col-lg-2 mt-3 card-btn" title="Informations budgétaires">
            <a id="budget" class="col-card card w-75 p-2"
                href="{{ route('datas.bg', isset($dataCommune) ? $dataCommune['slug'] : 'bg') }}">
                <img class="mx-auto" src="img/budget.png" alt="img budget">
                <h4 class="m-auto font-weight-bolder">Budget</h4>
            </a>
        </div>
        <div class="col-6 col-lg-2 mt-3 card-btn" title="Tableau de Bord">
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