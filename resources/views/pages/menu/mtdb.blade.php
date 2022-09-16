@extends('layout.appData')

@section('script')
    
    @if(str_contains(url()->current(), 'planning'))
        @include("scriptPlanning")
    @elseif(str_contains(url()->current(), 'global'))
        @include("script")
        @include("scriptPlanning")
    @else
        @include("script")
    @endif
@stop
@section('dataTitle')
    TdB
@stop
@section('allTdb')
    @include("pages.menu.menuTdb")
@endsection

@section('contentData')
<div class="container">
    <div class="row bg-white py-2">
        <div class="col-12 col-md-8 text-center text-edicp mt-3 order-2 order-md-1">
            <p><span>E</span>space de <span>d</span>ialogue et d'<span>i</span>nterpretation <span>c</span>ommunautaire</p>
            <p>Bilan d'action {{ isset($dataCommune) ? $dataCommune['annee'] : '' }} de la commune</p>
        </div>
    
        <div class="col-12 col-md-4  mt-3 order-1 order-md-2">
            <img class="img-fluid" src="{{ asset('/img/edic_banier.png') }}" alt="banier edic">
        </div>
    </div>
    @if(str_contains(url()->current(), 'planning'))
        @include("pages.includes.tdbPlanning")
    @elseif(str_contains(url()->current(), 'global'))
        @include("pages.includes.tdbGlobal")
    @else
        @include("pages.includes.tdb")
    @endif
</div>
    
@stop