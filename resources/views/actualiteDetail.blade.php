@extends('layout.app')
@section('title')
    <title>Edic - Actualité détail</title>
@endsection
@section('content')

    <div class="row">
        <div class="col-12 col-md-10 col-lg-8 mx-auto text-justify mt-4">
            <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
        </div>
        <div class="col-12 col-md-10 col-lg-8 mx-auto mt-2">
            <span><i class="fa-brands fa-facebook-square fa-2xl" style="color:#4267B2"></i></span>
            <span class="mx-1"><i class="fa-brands fa-twitter-square fa-2xl" style="color:#1DA1F2"></i></span>
            <span><i class="fa-brands fa-whatsapp-square fa-2xl" style="color:#25D366"></i></span>
            <span class="mx-1"><i class="fa-brands fa-telegram fa-2xl" style="color:#229ED9"></i></span>
            <span><i class="fa-solid fa-envelope fa-2xl" style="color:#666"></i></span>
        </div>
        <div class="col-12 col-md-10 col-lg-8 mx-auto mt-3">
            <p class="p-0">Publié le: 15/04/2022 - 07:19</p>
        </div>
    </div>

    <div class="row actualite">
        <div class="col-12 col-md-10 col-lg-8 mx-auto mt-1 ">
            <img src="https://images.unsplash.com/photo-1536323760109-ca8c07450053" alt="image de l'actualité" />
            <p class="p-0 mt-1 font-weight-bold">Publié par: Traoré Ali</p>
        </div>
        <div class="col-11 col-md-9 col-lg-7 mx-auto mt-1 text-justify">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Neque pharetra ultricies hac accumsan, egestas id ac luctus mi.
                Blandit ut convallis et magna faucibus ac diam. Id dignissim
                faucibus ac suspendisse ac. Eu, risus nunc neque amet.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Neque pharetra ultricies hac accumsan, egestas id ac luctus mi.
                Blandit ut convallis et magna faucibus ac diam. Id dignissim
                faucibus ac suspendisse ac. Eu, risus nunc neque amet.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Neque pharetra ultricies hac accumsan, egestas id ac luctus mi.
                Blandit ut convallis et magna faucibus ac diam. Id dignissim
                faucibus ac suspendisse ac. Eu, risus nunc neque amet.Lorem
                ipsum dolor sit amet, consectetur adipiscing elit.
                Neque pharetra ultricies hac accumsan, egestas id ac luctus mi.
                Blandit ut convallis et magna faucibus ac diam. Id dignissim
                faucibus ac suspendisse ac. Eu, risus nunc neque amet.Lorem
                ipsum dolor sit amet, consectetur adipiscing elit. Neque pharetra
                ultricies hac accumsan, egestas id ac luctus mi. Blandit ut convallis
                et magna faucibus ac diam. Id dignissim faucibus ac suspendisse ac.
                Eu, risus nunc neque amet.Lorem ipsum dolor sit amet, consectetur
                adipiscing elit. Neque pharetra ultricies hac accumsan, egestas id ac
                luctus mi. Blandit ut convallis et magna faucibus ac diam.
                Id dignissim faucibus ac suspendisse ac. Eu, risus nunc neque amet.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Neque pharetra ultricies hac accumsan, egestas id ac luctus mi.
                Blandit ut convallis et magna faucibus ac diam. Id dignissim faucibus
                ac suspendisse ac. Eu, risus nunc neque amet.Lorem ipsum dolor
                sit amet, consectetur adipiscing elit. Neque pharetra ultricies
                hac accumsan, egestas id ac luctus mi. Blandit ut convallis et
                magna faucibus ac diam. Id dignissim faucibus ac suspendisse ac.
                Eu, risus nunc neque amet.
            </p>
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
        <h2 class=" m-top mb-4 text-center">Autres actualités</h2>
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
                                    <img src="https://images.unsplash.com/photo-1536323760109-ca8c07450053"
                                        alt="Los Angeles" width="1100" height="500">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="p-md-4 mt-1">
                                        <h3>Los Angeles</h3>
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
                                    <img src="https://images.unsplash.com/photo-1536323760109-ca8c07450053"
                                        alt="Los Angeles" width="1100" height="500">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="p-md-4 mt-1">
                                        <h3>Los Angeles</h3>
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

    <div class="row m-top">
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

    <div class="row mb-5">
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
    <script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace('editor', {
                extraPlugins: 'editorplaceholder',
                editorplaceholder: 'Veuillez entrer votre commentaire',
                removeButtons: 'PasteFromWord'
            });


        });
    </script>
@endsection
