@extends('layouts.app')

@section('content')
<div class="container p-0">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inscription') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nom Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Addresse Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile"
                                class="col-md-4 col-form-label text-md-right">{{ __('Numéro de telephone') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="number"
                                    class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                    value="{{ old('mobile') }}" autocomplete="numero">

                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Pays') }}</label>
                            <div class="col-md-6">
                                <select class="form-control my-0" id="country" name="country" required>
                                    <option value="">{{ __('-- Selectionnez votre pays --') }}</option>
                                    @foreach($countries as $country)
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

                        <div class="form-group row ">
                            <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>
                            <div class="col-md-6">
                                <select class="form-control my-0" id="region" name="region" required>

                                </select>
                                @error('region')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="province" class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>
                            <div class="col-md-6">
                                <select class="form-control my-0" id="province" name="province" required>

                                </select>
                                @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="commune" class="col-md-4 col-form-label text-md-right">{{ __('Commune') }}</label>
                            <div class="col-md-6">
                                <select class="form-control my-0" id="commune" name="commune" required>

                                </select>
                                @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirmez le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn sin-bg-3">
                                    {{ __('S\'inscrire') }}
                                </button>
                                @if (Route::has('login'))
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Vous avez déjà un compte ? ?') }}
                                </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <p>ou S'inscrire avec:</p>

                                    <a type="button" class="light-blue-text mx-2">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                    <a type="button" class="light-blue-text mx-2">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                    <a type="button" class="light-blue-text mx-2">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <hr>
                                    <!-- Terms of service -->
                                    <p>En cliquant sur
                                        <em>S'inscrire</em> vous acceptez nos
                                        <a href="" target="_blank">conditions d'utilisation</a>
                                    </p>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <p class="text-center"><a href="{{ route('login') }}" id="signin">Vous avez déjà
                                            un compte ?</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/country.js') }}"></script>
    <!--script>
    
    $(document).ready(function() {
        
        $('#country').on('change', function() {
           
            let country_id = $(this).val();
            
            if (country_id) {
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
                            $('#region').empty();
                            $('#province').empty();
                            $('#commune').empty();
                            $('#region').focus;
                            $('#region').append(
                                '<option value="">-- Selectionnez votre region --</option>');
                            $.each(data, function(key, value) {
                                $('select[name="region"]').append(
                                    '<option value="' + key + '">' + value
                                     + '</option>');
                            });
                        } else {
                            $('#region').empty();
                            $('#province').empty();
                            $('#commune').empty();

                        }
                    }
                });
                
            } else {
                $('#region').empty();
                $('#province').empty();
                $('#commune').empty();

            }
        });

        $('#region').on('change', function() {
           
           let region_id = $(this).val();
           
           if (region_id) {
               //alert('coucou');
               $.ajax({
                   //alert('coucou');
                   url: '/region/' + region_id,
                   type: "GET",
                   data: {
                       "_token": "{{ csrf_token() }}"
                   },
                   dataType: "json",
                   success: function(data) {
                       console.log(data);
                       if (data) {
                           $('#province').empty();
                           $('#commune').empty();
                           $('#province').focus;
                           $('#province').append(
                               '<option value="">-- Selectionnez votre province --</option>');
                           $.each(data, function(key, value) {
                               $('select[name="province"]').append(
                                   '<option value="' + key + '">' + value
                                    + '</option>');
                           });
                       } else {
                           $('#province').empty();
                           $('#commune').empty();

                       }
                   }
               });
               
           } else {
               $('#province').empty();
               $('#commune').empty();

           }
       });

       $('#province').on('change', function() {
           
           let province_id = $(this).val();
           
           if (province_id) {
               //alert('coucou');
               $.ajax({
                   //alert('coucou');
                   url: '/province/' + province_id,
                   type: "GET",
                   data: {
                       "_token": "{{ csrf_token() }}"
                   },
                   dataType: "json",
                   success: function(data) {
                       //console.log(data);
                       if (data) {
                           $('#commune').empty();
                           $('#commune').focus;
                           $('#commune').append(
                               '<option value="">-- Selectionnez votre commune --</option>');
                           $.each(data, function(key, value) {
                               $('select[name="commune"]').append(
                                   '<option value="' + key + '">' + value
                                    + '</option>');
                           });
                       } else {
                           $('#commune').empty();
                       }
                   }
               });
               
           } else {
               $('#commune').empty();
           }
       });
    });
    </script-->
</div>
@endsection