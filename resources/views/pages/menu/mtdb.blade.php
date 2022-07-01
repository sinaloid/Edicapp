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
    @if(str_contains(url()->current(), 'planning'))
        @include("pages.includes.tdbPlanning")
    @elseif(str_contains(url()->current(), 'global'))
        @include("pages.includes.tdbGlobal")
    @else
        @include("pages.includes.tdb")
    @endif
</div>
    
@stop