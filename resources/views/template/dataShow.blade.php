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
                <!--div class=" row">
                    <div class="col-sm-3">
                        <label for="country">{{ __('Pays') }}</label>
                        <div class="form-group">
                            <select class="form-control" id="country" name="country" required>
                                <option value="">{{ __('-- Selectionnez votre pays --') }}</option>
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

                    </div>
                    <div class=" col-sm-3">
                        <label for="region">Region</label>

                        <div class="form-group">
                            <select class="form-control" id="region" name="region" required>

                            </select>
                            @error('region')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class=" col-sm-3">
                        <label for="province">Province</label>
                        <div class="form-group">
                            <select class="form-control" id="province" name="province" required>

                            </select>
                            @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class=" col-sm-3">
                        <label for="commune">Commune</label>
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
                </div -->
                <div class="row">
                    <div class="col-sm-12 sin-bg-2">
                        <div class="form-group mt">
                            <select class="form-control mt-1" id="country" name="country" required>
                                <option value="">{{ __('-- Selectionnez votre pays --') }}</option>
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
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <a class="btn sin-bg-3" href="{{ route('datas.cmp') }}">Comparaison</a>
                    <a class="btn sin-bg-3" href="{{ route('pdf') }}">Exporter</a>
                </div>
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
                    <p class="sin-ic">Partager sur : <a href="#"><i class="fab fa-facebook"></i> Facebook</a> |
                        <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                    </p>
                </div>
            </div>
            <br>


            @include("pages.menu.menu")
            <div class="container px-1">
                <h3 class="my-4">@yield('dataTitle')</h3>
                <hr style="height:1px;border-width:5;color:#444;background-color:#444">
                @yield('dataContent')
            </div>

        </div>
        <script src="{{ asset('js/country.js') }}"></script>
    </div>
    @include("footer")
</body>

</html>