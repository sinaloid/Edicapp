@extends('layout.app')

@section('content')
    <div class="row bannier"></div>
    <div class="row">
        <div class="col-12">
            <h1 class="title-bannier">Actualités</h1>
            <p class="col-12 col-md-8 mx-auto text-center my-1">
                Actualités des différentes communes du Burkina Faso
            </p>
        </div>
    </div>
    <div class="row">
        <form class="col-10 col-md-8 col-lg-6 mx-auto mt-3" action="#">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Rechercher une actualité" />
                <div class="input-group-append">
                    <input class="input-group-text mx-1 btn-edic" type="submit" value="Rechercher" />
                </div>
            </div>
        </form>
    </div>
    <div class="row"></div>
    @php
    $datas = [1,2,3,4,1,2,3,4,1,1];

    @endphp
    <div class="row mb-5">
        <div class="col-12 col-md-10 col-lg-9 mx-auto d-flex flex-wrap">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-6 row-cols-lg-3 g-1">
                    @foreach ($datas as $item)
                        <div class="col mt-3">
                            <div class="card mx-auto">
                                <!--img src="https://images.unsplash.com/photo-1536323760109-ca8c07450053" alt="Img Card" /-->
                                <img src="{{asset('img/ouaga.jpg')}}" alt="Img Card" />
                                <div class="card-body">
                                    <span class="card-detail">Commune</span>
                                    <span class="card-detail">Ouagadougou</span>
                                    <div class="card-title">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                    <p class="mb-2">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Consectetur sodales morbi dignissim sed diam pharetra vitae
                                        ipsum odio.
                                    </p>
                                    <a href="{{ route('detail') }}" class="btn btn-sm btn-edic d-inline-block ml-auto">
                                        Lire plus
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
