<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDICApp - Données</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Itim&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('/css/sin.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/table.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4ab29fd570.js" crossorigin="anonymous"></script>
    @yield('script')
</head>

<body>
    @include("header")
    <div class="container px-1 sin-m-t myform">
        <div class="row sin-bg-2 myform mx-auto">
            <div class="col-sm-12">

                <form class="row mb-3 p-0" action="{{ route('datas.view') }}" method="get">
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
                            <button type="submit" class="btn sin-bg-3 my-1 font-weight-bold text-white">Valider</button>
                            <a class="btn sin-bg-3" href="{{ route('datas.cmp') }}">Comparaison</a>
                            @if (Route::currentRouteName() == 'datas.tdb') 
                                @if(str_contains(url()->current(), 'planning'))
                                    <button class="btn sin-bg-3 text-white" type="button" name="create_pdf" id="create_pdf">Exporter Tdb Planning</button>
                                @elseif(str_contains(url()->current(), 'global'))
                                    <button class="btn sin-bg-3 text-white" type="button" name="create_pdf" id="create_pdf">Exporter Tdb Global</button>
                                @else
                                    <button class="btn sin-bg-3 text-white" type="button" name="create_pdf" id="create_pdf">Exporter Tdb Bilan</button>
                                @endif
                            @endif

                        </div>
                        <p class="mt-3 p-0">
                            <strong>
                                <span class="badge badge-dark">
                                    #Commune:
                                </span>
                            </strong>
                            <small>
                                {{isset($dataCommune) ? App\Models\Datas\Data::find($dataCommune['data_id'])->commune->commune_name : 'inexistante'}}
                            </small>

                            <br>
                            <span class="badge badge-dark">
                                <a class="text-white" href="{{ route('make_file_exporte',[''.Route::currentRouteName(),'excel', isset($dataCommune) ? $dataCommune['slug'] : 'null'] ) }}"># excel</a>
                            </span>
                            <span class="badge badge-dark">
                                <a class="text-white" href="{{ route('make_file_exporte', [''.Route::currentRouteName(),'pdf', isset($dataCommune) ? $dataCommune['slug'] : 'null']) }}"># pdf</a>
                            </span>
                            <span class="badge badge-dark">
                                <a class="text-white" href="{{ route('make_file_exporte', [''.Route::currentRouteName(),'csv', isset($dataCommune) ? $dataCommune['slug'] : 'null']) }}"># csv</a>
                            </span>
                            <span class="badge badge-dark">
                                <a class="text-white" href="{{ route('make_file_exporte', [''.Route::currentRouteName(),'json', isset($dataCommune) ? $dataCommune['slug'] : 'null']) }}"># json</a>
                            </span>
                            
                        </p>
                        
                    </div>
                </form>
            </div>
        </div>

        <div class="container mt-2" id="print">
            <div class="row">
                <div class="col-sm-7  myform sin-bg-2 mx-auto text-center"> <q>@include('pages.includes.mgs')</q> </div>
            </div>
        </div>

        <div class="container myform">
            <div class="row align-items-center">
                <div class="col-5 col-md-6">
                    <h2>Données</h2>
                </div>
                <div class="col-12 col-md-6">
                    <!--p class="sin-ic">Partager sur : <a href="#"><i class="fab fa-facebook"></i> Facebook</a> |
                        <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                    </p-->
                   <div class="row my-3">
                    <div class="col-6">
                    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v12.0&appId=241600270424722&autoLogAppEvents=1" nonce="zHViDRRh"></script>
<div class="fb-like" data-href="http://edicapp.herokuapp.com/" data-width="" data-layout="button" data-action="like" data-size="large" data-share="true"></div>
                    
                    </div>
                    
                    <!--div class="col-6">
                    <a class="btn btn-sm bg-success" href="whatsapp://send?text=http://edicapp.herokuapp.com" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on whatsapp">whatsapp</a>
                    </div-->
                   </div>
                </div>
            </div>
            <br>


            @include("pages.menu.menu")
            <div id="pdf" class="container px-1">
                <h3 class="my-4">@yield('dataTitle')</h3>
                <p class="my-4">@yield('allTdb')</p>
                <hr style="height:1px;border-width:5;color:#444;background-color:#444">
                @yield('dataContent')
            </div>

        </div>
        <script src="{{ asset('js/country.js') }}"></script>
    </div>
    @include("footer")
</body>

</html>