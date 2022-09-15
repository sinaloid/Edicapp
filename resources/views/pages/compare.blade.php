@extends('layout.app')

@section('content')

<div class="row bannier"></div>
<div class="row">
    <div class="col-12">
        <h1 class="title-bannier">Analyse de données </h1>
        <p class="col-12 col-md-8 mx-auto text-center my-1">
            Ici vous avez la possibilité de comparer les données de 2 à 4 communes 
            (sous forme de tableau ou sous forme graphique).
            Vous devez sélectionner au minimum une commune
        </p>
    </div>
</div>
    

<div class="row mx-auto">
    <div class="col-sm-12">

        <form class="row mb-3 p-0" action="{{ route('datas.cmpdt') }}" method="get">
            <div class="col-12 p-0">
                <div class="col-12 col-md-4 mx-auto form-group my-3 ">
                    <label for="commune"
                        class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">Commune n&deg 1</label>
                    <input type="text" class="form-control" id="commune_1" name="commune_1"
                        placeholder="Ouagadougou" autocomplete="off" required>

                    @error('commune')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 mx-auto form-group my-3 ">
                    <label for="commune"
                        class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">Commune n&deg 2</label>
                    <input type="text" class="form-control" id="commune_2" name="commune_2"
                        placeholder="Ouagadougou" autocomplete="off">

                    @error('commune')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 mx-auto form-group my-3 ">
                    <label for="commune"
                        class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">Commune n&deg 3</label>
                    <input type="text" class="form-control" id="commune_3" name="commune_3"
                        placeholder="Ouagadougou" autocomplete="off">

                    @error('commune')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 mx-auto form-group my-3 ">
                    <label for="commune"
                        class="col-12 col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">Commune n&deg 4</label>
                    <input type="text" class="form-control" id="commune_4" name="commune_4"
                        placeholder="Ouagadougou" autocomplete="off">

                    @error('commune')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 mx-auto form-group my-3">
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
            <div class="col-12 d-flex justify-content-center mb-5">
                <button type="submit" class="btn btn-edic font-weight-bold">Valider</button>
            </div>
        </form>
    </div>
</div>
@endsection