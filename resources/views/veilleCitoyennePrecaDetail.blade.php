@extends('layout.app')
@section('title')
    <title>Edic - Actualité détail</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-10 col-lg-8 mx-auto text-justify mt-4">
            <h1>{{ isset($data) ? $data->titre : '' }}</h1>
        </div>
        <div class="col-12 col-md-10 col-lg-8 mx-auto mt-2">
            <span><i class="fa-brands fa-facebook-square fa-2xl" style="color:#4267B2"></i></span>
            <span class="mx-1"><i class="fa-brands fa-twitter-square fa-2xl" style="color:#1DA1F2"></i></span>
            <span><i class="fa-brands fa-whatsapp-square fa-2xl" style="color:#25D366"></i></span>
            <span class="mx-1"><i class="fa-brands fa-telegram fa-2xl" style="color:#229ED9"></i></span>
            <span><i class="fa-solid fa-envelope fa-2xl" style="color:#666"></i></span>
        </div>
        <div class="col-12 col-md-10 col-lg-8 mx-auto mt-3">
            <p class="p-0">Publié le: {{ isset($data) ? $data->created_at : '' }}</p>
        </div>
    </div>

    <div class="row actualite">
        <div class="col-12 col-md-10 col-lg-8 mx-auto mt-1 ">
            <img src="/{{ isset($data) ? $data->image : '' }}" alt="Los Angeles" width="1100" height="500">
            <!--img src="https://images.unsplash.com/photo-1536323760109-ca8c07450053" alt="image de l'actualité" /-->
            <p class="p-0 mt-1 font-weight-bold">Publié par: {{ isset($data) ? $data->user()->first()->name : '' }}</p>
        </div>
        <div class="col-11 col-md-9 col-lg-7 mx-auto mt-1 text-justify">
            {!! isset($data) ? $data->description : '' !!}
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-10 col-lg-8 mx-auto mt-2">
            Partager sur:
        </div>
        <div class="col-12 col-md-10 col-lg-8 mx-auto mt-2">
            <span><i class="fa-brands fa-facebook-square fa-2xl" style="color:#4267B2"></i></span>
            <span class="mx-1"><i class="fa-brands fa-twitter-square fa-2xl" style="color:#1DA1F2"></i></span>
            <span><i class="fa-brands fa-whatsapp-square fa-2xl" style="color:#25D366"></i></span>
            <span class="mx-1"><i class="fa-brands fa-telegram fa-2xl" style="color:#229ED9"></i></span>
            <span><i class="fa-solid fa-envelope fa-2xl" style="color:#666"></i></span>
        </div>
    </div>

    <div class="row m-top pb-5 bg-gray">
        <h2 class=" m-top mb-4 text-center">Autres veille citoyenne du PRéCA</h2>
        <div id="demo" class="col-12 carousel slide" data-bs-ride="carousel">
            @php
                $datas = App\Models\VeilleCitoyennePreca::all();
            @endphp
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                @foreach ($datas as $item => $value)
                    @if ($item == 0)
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $item++ }}"
                            class="active"></button>
                    @else
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $item++ }}"></button>
                    @endif
                @endforeach
            </div>
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                @foreach ($datas as $item => $value)
                    @if ($item == 0)
                        <div class="carousel-item active">
                            <div class="col-12 col-md-10 col-lg-8 mx-auto d-flex flex-wrap">
                                <div class="col-12 col-sm-6">
                                    <!--img src="https://images.unsplash.com/photo-1536323760109-ca8c07450053"
                                                alt="Los Angeles" width="1100" height="500"-->
                                    <img src="/{{ isset($value) ? $value->image : asset('img/ouaga.jpg') }}"
                                        alt="Los Angeles" width="1100" height="500">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="p-md-4 mt-1">
                                        <h3>{{ $value->titre }}</h3>
                                        <p class="text-justify">
                                            {{ $value->resumer }}
                                        </p>
                                        <a class="link" href="{{ route('precaVeilleDetail', $value['slug']) }}">Lire
                                            plus</a>
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
                                    <img src="/{{ isset($value) ? $value->image : asset('img/ouaga.jpg') }}"
                                        alt="Los Angeles" width="1100" height="500">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="p-md-4 mt-1">
                                        <h3>{{ $value->titre }}</h3>
                                        <p class="text-justify">
                                            {{ $value->resumer }}

                                        </p>
                                        <a class="link" href="{{ route('precaVeilleDetail', $value['slug']) }}">Lire
                                            plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>

    <div class="row m-top d-none">
        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <h2 class="text-center mb-4">Commentaires</h2>
        </div>

        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <hr>
            <span class="font-weight-bolder">Le 15 avril à 16:15, par Kabore Salif</span>
            <p class="mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga esse autem, iusto nam nulla
                eveniet error excepturi officiis quam, natus repellat nesciunt facere incidunt, totam repellendus veniam sit
                ad alias?</p>
        </div>
        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <hr>
            <span class="font-weight-bolder">Le 15 avril à 16:15, par Keita</span>
            <p class="mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga esse autem, iusto nam nulla
                eveniet error excepturi officiis quam, natus repellat nesciunt facere incidunt, totam repellendus veniam sit
                ad alias?</p>
        </div>
        <div class="col-12 col-md-10 col-lg-8 mx-auto">
            <hr>
            <span class="font-weight-bolder">Le 15 avril à 16:15, par Ali Traore</span>
            <p class="mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga esse autem, iusto nam nulla
                eveniet error excepturi officiis quam, natus repellat nesciunt facere incidunt, totam repellendus veniam sit
                ad alias?</p>
        </div>
    </div>

    <div class="row mb-5 d-none">
        <div class="col-md-10 col-lg-7 p-0 mx-auto mt-4">
            <span class="px-2 font-weight-bold">Laisser un commentaire</span>
            <div class="card-body p-0">
                <form class="p-0" method="post" action="" enctype="multipart/form-data">
                    <!--@csrf-->
                    <div class="form-group mt-3">
                        <input class="form-control w-100 px-3" type="text" placeholder="Veuillez entrer votre nom">
                    </div>
                    <div class="form-group mt-3">
                        <input class="form-control w-100 px-3" type="text" placeholder="Veuillez entrer votre email">
                    </div>
                    <div class="form-group my-3">
                        <textarea id="editor" class="ckeditor14 form-control" name="editor"></textarea>
                    </div>
                    <input type="submit" value="Commenter" class="btn btn-edic d-block mx-auto" />
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('texteditor/build/texteditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
