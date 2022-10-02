@extends('layout.app')

@section('title')
    <title>Edic - Accueil</title>
@endsection
@section('content')


    <div class="row">
        <div class="col-12 col-md-10 mx-auto d-flex flex-wrap">
            <div class="col-12 col-lg-5 order-2 order-lg-1 my-3 p-0">
                <h1 class="mt-2 d-inline-block animate__animated animate__slideInLeft">Plateforme ouvertes des données
                    budgétaires</h1>
                <p class="animate__animated animate__jello">
                    Promouvoir l'innovation et la transparence grâce à la publication
                    des données budgétaires des différentes communes du Burkina Faso
                    dans des formats ouverts, gratuits et réutilisables.
                </p>
                <a class="btn btn-edic" href="{{ route('datas.info', isset($dataCommune) ? $dataCommune['slug'] : 'info_general') }}">Voir des
                    données</a>
            </div>
            <div class="col-12 col-lg-7 order-1 order-lg-2 image p-0">
                <img class="d-block mt-4 mx-auto" src="{{ asset('assets/img/edic-analytics.svg') }}"
                    alt="image illustrative" />
            </div>
        </div>
    </div>
    <div class="row bannier mt-3">
        <div class="col-12 col-md-10 mx-auto py-2 d-flex flex-wrap">
            <div class="col-12 col-lg-4 px-0 illustration">
                <img class="d-block mx-auto" src="{{ asset('assets/img/edic-visualisation.svg') }}"
                    alt="image illustrative" />
                <h2 class="text-white text-center mt-2">Visualiser</h2>
                <p class="col-12 col-md-4 col-lg-10 mx-auto text-white text-justify" style="font-weight: 500">
                    Accéder facilement et librement aux données budgétaires des différentes communes du Burkina Faso
                </p>
            </div>
            <div class="col-12 col-lg-4 px-0 illustration">
                <img class="d-block mx-auto" src="{{ asset('assets/img/edic-download.svg') }}" alt="image illustrative" />
                <h2 class="text-white text-center mt-2">Télécharger</h2>
                <p class="col-12 col-md-4 col-lg-10 mx-auto text-white text-justify" style="font-weight: 500">
                    Ces données sont disponibles pour vous aux formats PDF, excel, Csv et réutilisables
                </p>
            </div>
            <div class="col-12 col-lg-4 px-0 illustration">
                <img class="d-block mx-auto" src="{{ asset('assets/img/edic-share.svg') }}" alt="image illustrative" />
                <h2 class="text-white text-center mt-2">Partager</h2>
                <p class="col-12 col-md-4 col-lg-10 mx-auto text-white text-justify" style="font-weight: 500">
                    Vous avez aussi la possibilité de diffuser ces données budgétaires au tour de vous et sur les réseaux
                    sociaux
                </p>
            </div>
        </div>
    </div>
    <div class="row bg-gray">
        <div class="col-12 col-sm-6 col-md-4 mx-auto  text-center text-sm-left m-top">
            <h2 class="my-3 text-center mx-auto">Nos remerciements</h2>
            <p class="text-justify p-0">
                2019, 2020, 2021 et 2022 ont été consacrées à la réflexion et à 
                l’accompagnement des communes dans la promotion des données ouvertes au Burkina Faso... <a class="link" href="{{route('apropos')}}"> en savoir plus</a>
            </p>
        </div>
        <div class="col-12 col-md-10 mx-auto mb-5">
            <div class="d-flex flex-wrap justify-content-center">
                <div class="d-inline-block mt-3 mx-2">
                    <img width="100" src="{{asset('img/pt/bf.png')}}" alt="Burkina Faso" title="Etat du Burkina">
                </div>
                <div class="d-inline-block mt-3 mx-2">
                    <img width="100" src="{{asset('img/pt/amr.png')}}" alt="AMR" title="Association Monde Rural">
                </div>
                <div class="d-inline-block mt-3 mx-2">
                    <img width="100" src="{{asset('img/pt/diakonia.png')}}" alt="Diakonia" title="Organisation non gouvernementale (ONG)">
                </div>
                <div class="d-inline-block mt-3 mx-2">
                    <img width="100" src="{{asset('img/pt/delen.png')}}" alt="Broederlijk Delen" title="Organisation non gouvernementale (ONG)">
                </div>
                <div class="d-inline-block mt-3 mx-2">
                    <img width="100" src="{{asset('img/pt/expertise.png')}}" alt="Expertise France" title="Organisation non gouvernementale (ONG)">
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-12 col-md-10 mx-auto m-top">
            <h2 class="mb-0 text-center w-100">Visualisation rapide</h2>
            <p class="text-justify text-md-center col-12 col-md-10 p-0 my-4 mx-auto">
                Sélectionné une commune et l’année des données pour faire une visualisation
                rapide des trois meilleurs marchés qui ont contribués au budget de la commune.
            </p>
            <hr />
            <div class="col-12 mx-auto">
                <form class="row" action="{{ route('acceuil') }}" method="get">
                    <div class="col-12 my-0">
                        <div class="form-group my-3 ">
                            <label for="commune" class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">{{ __('Commune') }}</label>
                            <input type="text" class="form-control" id="commune" name="commune" placeholder="Ouagadougou" autocomplete="off" required>

                            @error('commune')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <div class="col-12">Année</div>
                            <select class="form-control m-0" id="annee" name="annee" required>
                                <option value="">
                                    {{ __('-- Sélectionnez l’année --') }}
                                </option>
                                @for ($i = Date('Y'); 2000 <= $i; $i--)
                                <option value="{{ $i }}">
                                    {{ $i }}</option>
                            @endfor
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="viewName" value="{{ Route::currentRouteName() }}">

                    <div class="col-12">
                        <div class="mt-2 py-0">
                            <button type="submit" class="btn btn-edic">Valider</button>
                        </div>
                        <hr />
                        <p class="my-0">
                            <strong>
                                <span class="badge bg-secondary">
                                    #Commune sélectionnée :
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
        <div class="col-12 col-lg-10 mx-auto m-top">
            <h2 class="w-75 mb-0 mx-auto text-center">
                Contributions des trois meilleurs marchés
            </h2>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-2">
                    <div class="col mt-4">
                        <div class="card">
                            <div class="mx-auto" id="piechart_3d" style="width:100%; max-width: 260px; height: 260px"></div>
                        </div>
                    </div>
                    <div class="col mt-4">
                        <div class="card">
                            <div class="mx-auto" id="piechart_4d" style="width:100%; max-width: 250px; height: 250px"></div>
                        </div>
                    </div>
                    <div class="col mt-4">
                        <div class="card">
                            <div class="mx-auto" id="piechart_5d" style="width:100%; max-width: 250px; height: 250px"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 m-top" style="background-color: rgba(0, 141, 185, 0.6)">
            <h2 class="text-center my-4 text-white">Voir les données par catégories</h2>
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="container">
                    <div
                        class="row row-cols-2 row-cols-sm-4 row-cols-md-4 g-1 data py-1 d-flex flex-wrap justify-content-center">
                        <a class="col p-0 my-3 categ txt-primary" href="{{ route('datas.info',isset($dataCommune) ? $dataCommune['slug'] : 'info_generale') }}">
                            <div class="card mx-auto">
                                <div class="circle">
                                    <span><i class="fa-solid fa-info"></i></span>
                                </div>
                                <h3 class="mt-2">Infos G</h3>
                            </div>
                        </a>
                        <a class="col my-3 categ txt-primary" href="{{ route('datas.pcd', isset($dataCommune) ? $dataCommune['slug'] : 'pcd') }}">
                            <div class="card mx-auto">
                                <div class="circle">
                                    <span><i class="fa-solid fa-scale-unbalanced-flip"></i></span>
                                </div>
                                <h3 class="mt-2">Pcd</h3>
                            </div>
                        </a>
                        <a class="col p-0 my-3 categ txt-primary" href="{{ route('datas.bg', isset($dataCommune) ? $dataCommune['slug'] : 'bg') }}">
                            <div class="card mx-auto">
                                <div class="circle">
                                    <span><i class="fa-solid fa-coins"></i></span>
                                </div>
                                <h3 class="mt-2">Budget</h3>
                            </div>
                        </a>
                        



                        <a class="col p-0 my-3 categ txt-primary" href="{{ route('datas.tdb', isset($dataCommune) ? ['bilan',$dataCommune['slug']] : 'tdb') }}">
                            <div class="card mx-auto">
                                <div class="circle">
                                    <span><i class="fa-solid fa-chart-line"></i></span>
                                </div>
                                <h3 class="mt-2">TdB</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-top pb-5 justify-content-center bg-gray">
        <hr class="w-100 mt-0 bg-white" />
        <div class="col-11 col-sm-6 col-md-4 illustration bannier m-top" style="z-index: 1">
            <img class="d-block mx-auto my-2" src="{{ asset('assets/img/dataset.svg') }}" alt="image illustrative" />
        </div>
        <div class="col-12 col-sm-6 col-md-4 illustration text-center text-sm-left m-top">
            <h2 class="my-3">Faire un jeux de données</h2>
            <p class="text-justify p-0">
                Consultez les données budgétaires dans une variété de formats graphiques ou
                faites des comparaisons de données budgétaires.
            </p>
            <a class="btn btn-edic" href="{{route('datas.cmp', isset($dataCommune) ? $dataCommune['slug'] : 'cmp')}}">Jeux de
                données</a>
        </div>
        <hr class="w-100 mt-5" />
        <div class="col-12 m-top">
            <h2 class="mb-4 text-center">Actualités</h2>
            <div id="demo" class="col-12 carousel slide" data-bs-ride="carousel">
                @php
                    $datas = [0, 1, 2];
                @endphp
                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    @foreach ($datas as $item)
                        @if ($item == 0)
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $item++ }}"
                                class="active"></button>
                        @else
                            <button type="button" data-bs-target="#demo"
                                data-bs-slide-to="{{ $item++ }}"></button>
                        @endif
                    @endforeach
                </div>
                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    @foreach ($datas as $item)
                        @if ($item == 0)
                            <div class="carousel-item active">
                                <div class="col-12 col-md-10 col-lg-8 mx-auto d-flex flex-wrap">
                                    <div class="col-12 col-sm-6">
                                        <!--img src="https://images.unsplash.com/photo-1536323760109-ca8c07450053"
                                            alt="Los Angeles" width="1100" height="500"-->
                                            <img src="{{asset('img/ouaga.jpg')}}"
                                            alt="Los Angeles" width="1100" height="500">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="p-md-4 mt-1">
                                            <h3>Ouagadougou</h3>
                                            <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing
                                                elit.
                                                Quo, commodi ullam? Eaque aliquid repudiandae fugit veritatis
                                                maiores aliquam est inventore enim in amet, voluptatibus molestiae,
                                            </p>
                                            <a class="link" href="{{ route('detail') }}">Lire plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="carousel-item">
                                <div class="col-12 col-md-10 col-lg-8 mx-auto d-flex flex-wrap">
                                    <div class="col-12 col-sm-6">
                                        <!--img src="https://images.unsplash.com/photo-1536323760109-ca8c07450053"
                                            alt="Los Angeles" width="1100" height="500"-->
                                            <img src="{{asset('img/ouaga.jpg')}}"
                                            alt="Los Angeles" width="1100" height="500">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="p-md-4 mt-1">
                                            <h3>Ouagadougou</h3>
                                            <p class="text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing
                                                elit.
                                                Quo, commodi ullam? Eaque aliquid repudiandae fugit veritatis
                                                maiores aliquam est inventore enim in amet, voluptatibus molestiae,
                                            </p>
                                            <a class="link" href="{{ route('detail') }}">Lire plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

        <div class="col-12 col-lg-10 m-top">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 bg-white p-0">
                    <div class="col order-lg-2 p-3">
                        <div class="">
                            <h2 class="">
                                Économisez du temps grâce à l'utilisation de l'application mobile
                                <span class="text-muted">EDIC.</span>
                            </h2>
                            <p class="lead">
                                Télécharger, visualiser et partager facilement les données budgétaires des différentes
                                communes du Burkina Faso
                            </p>
                            <h5 class=" pb-2">Essayez l'application mobile</h5>
                            <a class="btn-market btn-google mb-2" href="{{asset('app/edic-municipalities.apk')}}" role="button">
                                <img src={{ asset('assets/img/badge.png') }} alt="" width="136px"
                                    loading="lazy" />
                            </a>
                        </div>
                    </div>
                    <div class="col order-lg-1 p-0">
                            <img class="img-fluid" src={{ asset('assets/img/app1.png') }} alt="app icone" loading="lazy" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                ['Attendu', {{ isset($troisMeilleur) ? $troisMeilleur[0]->attendu : 1 }}],
                ['Contribution', {{ isset($troisMeilleur) ? $troisMeilleur[0]->contribution : 0 }}],
            ]);
            var data1 = google.visualization.arrayToDataTable([
                ['Task', 'montant'],
                ['Attendu', {{ isset($troisMeilleur) ? $troisMeilleur[1]->attendu : 1 }}],
                ['Contribution', {{ isset($troisMeilleur) ? $troisMeilleur[1]->contribution : 0 }}],
            ]);
            var data2 = google.visualization.arrayToDataTable([
                ['Task', 'montant'],
                ['Attendu', {{ isset($troisMeilleur) ? $troisMeilleur[2]->attendu : 1 }}],
                ['Contribution', {{ isset($troisMeilleur) ? $troisMeilleur[2]->contribution : 0 }}],
            ]);

            var options = {
                title: '{{ isset($troisMeilleur) ? $troisMeilleur[0]->marche: '' }}',
                legend: "top",
                pieSliceText: "label",
                pieStartAngle: 100,
                is3D: true,
                chartArea: {
                    //left: 20,
                    top: 20,
                    width: "100%",
                    height: "100%",
                },
            };

            var options1 = {
                title: '{{ isset($troisMeilleur) ? $troisMeilleur[1]->marche : '' }}',
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
                title: '{{ isset($troisMeilleur) ? $troisMeilleur[2]->marche : '' }}',
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
            chart1.draw(data1, options);
            chart2.draw(data2, options);

            
        }
    </script>
@stop
