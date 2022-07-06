@extends('layout.app')

@section('content')
    <div class="row m-top mb-4">
        <div class="col-sm-8 col-md-10 col-lg-9 mx-auto mb-4">
            <div class="card py-0 mx-auto" style="background: rgb(0,141,185);
            background: linear-gradient(90deg, rgba(0,141,185,1) 0%, rgba(255,188,120,1) 50%, rgba(0,141,185,1) 100%);;  overflow: hidden">
                <div class="row">
                    <div class="col-12 py-2">
                        <h1 class="text-center text-white mt-3">Inscription</h1>

                        <div class="text-center w-100 mx-auto d-inline-block align-middle">
                            <img src="{{asset('assets/img/login.gif')}}" alt="" style="width:20%; height:auto; border: 1px solid transparent; border-radius:50%"">
                        </div>
                    </div>
                    <div class="container-fluid bg-white px-3">
                        <form class="row row-cols-1 row-cols-md-2 " method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="col-12 col-md-6">
                                <div class="form-group mt-1">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nom Prenom') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group mt-1">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Addresse Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
    
                            
    
                            <div class="form-group mt-1">
                                <label for="mobile"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Numéro de telephone') }}</label>
    
                                    <input id="mobile" type="number"
                                    class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                    value="{{ old('mobile') }}" autocomplete="tel">

                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
    
                            <!--div class="form-group mt-1 ">
                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Pays') }}</label>
                                <select class="form-control my-0" id="country" name="country" required>
                                    <option value="">{{ __('-- Sélectionnez votre pays --') }}</option>
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
    
                            <div class="form-group mt-1 ">
                                <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>
                                <select class="form-control my-0" id="region" name="region" required>
    
                                </select>
                                @error('region')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
    
                            <div class="form-group mt-1 ">
                                <label for="province" class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>
                                <select class="form-control my-0" id="province" name="province" required>
    
                                </select>
                                @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div-->
    
                            <div class="form-group mt-1 ">
                                <label for="commune" class="col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">{{ __('Commune') }}</label>
                                <input type="text" class="form-control" id="commune" name="commune" placeholder="ouagadougou" required>

                                @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
    
                            <div class="form-group mt-1">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
    
                                    <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
    
                            <div class="form-group mt-1">
                                <label for="password-confirm"
                                    class="col-md-6 col-form-label text-md-right">{{ __('Confirmez le mot de passe') }}</label>
    
                                    <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
    
                            <div class="form-group mt-3">
                                <input type="submit" class="btn btn-edic font-weight-bold text-white" value={{ __('S\'inscrire') }}>
                                        
                                   
                                    @if (Route::has('login'))
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Vous avez déjà un compte ? ?') }}
                                    </a>
                                    @endif
                            </div>
    
                            <div class="form-group mt-2">
                                <div class="col-md-12 text-center">
                                    <div class="form-group mt-1">
                                        <span class="span-or">ou s'inscrire avec :</span>
    
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
                                '<option value="">-- Sélectionnez votre region --</option>');
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
                               '<option value="">-- Sélectionnez votre province --</option>');
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
                               '<option value="">-- Sélectionnez votre commune --</option>');
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

@endsection