@extends('layout.app')
@section('css')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row bannier"></div>
    <div class="row">
        <div class="col-12">
            <h1 class="title-bannier">Données budgétaires</h1>
            <p class="col-12 col-md-8 mx-auto text-center my-3">
                Pour accéder aux données budgétaires d'une commune, sélectionnez la commune 
                et l’année des données puis cliquez sur valider
            </p>
        </div>
    </div>
    <div class="container px-1">
        <div class="row mx-auto py-0 px-2">
            <div class="col-sm-12 col-md-10 mx-auto">
                <form class="row mb-3 p-0" action="{{ route('datas.view') }}" method="get">
                    <div class="col-12 p-0">
                        <div class="form-group my-3 ">
                            <label for="commune"
                                class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">{{ __('Commune') }}</label>
                            <input type="text" class="form-control" id="commune" name="commune"
                                placeholder="Ouagadougou" autocomplete="off" required>

                            @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
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
                    </div>
                    <input type="hidden" name="viewName" value="{{ Route::currentRouteName() }}">
                    <div class="col-12 mx-auto p-0">
                        <button type="submit" class="btn btn-edic font-weight-bold">Valider</button>
                        <a class="btn btn-edic" href="{{ route('datas.cmpdt') }}">Comparaison</a>
                        @if (Route::currentRouteName() == 'datas.tdb')
                            @if (str_contains(url()->current(), 'planning'))
                                <button class="btn btn-edic font-weight-bold" type="button" name="create_pdf"
                                    id="create_pdf">Exporter Tdb Planning</button>
                            @elseif(str_contains(url()->current(), 'global'))
                                <button class="btn btn-edic font-weight-bold" type="button" name="create_pdf"
                                    id="create_pdf">Exporter Tdb Global</button>
                            @else
                                <button class="btn btn-edic font-weight-bold" type="button" name="create_pdf"
                                    id="create_pdf">Exporter Tdb Bilan</button>
                            @endif
                        @endif
                        <p class="my-3 p-0">
                            <strong>
                                <span class="badge bg-secondary">
                                    #Commune:
                                </span>
                            </strong>
                            <small>
                                {{ isset($dataCommune) ? App\Models\Datas\Data::find($dataCommune['data_id'])->commune->commune_name : 'non sélectionnée' }}
                            </small>

                            <br>
                            <br>
                            <span class="d-inline-block ml-auto">Télécharger au format : </span>
                            <span class="badge bg-secondary">
                                <a class="text-white"
                                    href="{{ route('make_file_exporte', ['' . Route::currentRouteName(), 'excel', isset($dataCommune) ? $dataCommune['slug'] : 'null']) }}">#
                                    excel</a>
                            </span>
                            <!--span class="badge bg-secondary">
                                <a class="text-white"
                                    href="{{ route('make_file_exporte', ['' . Route::currentRouteName(), 'pdf', isset($dataCommune) ? $dataCommune['slug'] : 'null']) }}">#
                                    pdf</a>
                            </span-->
                            <span class="badge bg-secondary">
                                <a class="text-white"
                                    href="{{ route('make_file_exporte', ['' . Route::currentRouteName(), 'csv', isset($dataCommune) ? $dataCommune['slug'] : 'null']) }}">#
                                    csv</a>
                            </span>
                        </p>
                    </div>
                </form>
            </div>
        </div>


        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-10 mx-auto">
                    <div class="row my-3">
                        <hr style="height:1px;border-width:5;color:#444;background-color:#444">

                        <div class="d-inline-block">
                            Partager sur :
                        </div>
                        <div class="d-inline-block mt-2">
                            <span id="fb"><i class="fa-brands fa-facebook-square fa-2xl"
                                    style="color:#4267B2"></i></span>
                            <span id="tw" class="mx-1"><i class="fa-brands fa-twitter-square fa-2xl"
                                    style="color:#1DA1F2"></i></span>
                            <span id="whsp"><i class="fa-brands fa-whatsapp-square fa-2xl"
                                    style="color:#25D366"></i></span>
                            <span id="tel" class="mx-1"><i class="fa-brands fa-telegram fa-2xl"
                                    style="color:#229ED9"></i></span>
                            <span id="email"><i class="fa-solid fa-envelope fa-2xl" style="color:#666"></i></span>
                        </div>


                        <script>
                            $(document).ready(function() {
                                $('#whsp').click(function() {
                                    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator
                                            .userAgent)) {
                                        window.open("whatsapp://send?text=" + encodeURIComponent(
                                                "http://192.168.0.20/datas/tdb/global/oqflfgiihz"), 'name',
                                            'width=800,height=600')
                                    } else {
                                        window.open("https://web.whatsapp.com/send?text=" + encodeURIComponent(
                                                "http://192.168.0.20/datas/tdb/global/oqflfgiihz"), 'name',
                                            'width=800,height=600')
                                    }
                                })

                                $('#fb').click(function() {
                                    var url = window.location.href;
                                    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator
                                            .userAgent)) {
                                        window.open('fb-messenger://share/?' + url,
                                            'facebook-share-dialog',
                                            'width=800,height=600'
                                        );
                                    } else {
                                        window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
                                            'facebook-share-dialog',
                                            'width=800,height=600'
                                        );
                                    }
                                })

                                $('#tw').click(function() {
                                    var url = window.location.href;
                                    window.open('https://twitter.com/intent/tweet?url=' + url, '' + document.title,
                                        'width=800,height=600'
                                    );
                                })

                                $('#tel').click(function() {
                                    window.open('https://t.me/share/url?url=' +
                                        encodeURIComponent(window.location.href) + '&text=' + encodeURIComponent(document
                                            .title), '', 'width=800,height=600')
                                })

                                $('#email').click(function() {
                                    var url = window.location.href;
                                    window.open('mailto:?subject=Edic&body=' + url);
                                })
                            })
                        </script>
                    </div>
                </div>
            </div>
            <br>


            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 mx-auto bg-white p-0">
                        @include('pages.menu.menu')
                    </div>
                </div>
            </div>
            <div id="pdf" class="container px-0 mb-5">
                <div class="col-12 col-md-10 mx-auto">
                    <h3 class="my-2">@yield('dataTitle')</h3>
                    <p class="my-0">@yield('allTdb')</p>
                    <hr style="height:1px;border-width:5;color:#444;background-color:#444">
                    @yield('contentData')
                </div>
            </div>

        </div>
        <script src="{{ asset('js/country.js') }}"></script>
    </div>
@endsection
