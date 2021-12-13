@extends('template.dataShow')

@section('script')
    @include("script")
@stop
@section('dataTitle')
    TdB
    <p class="mt-3 p-0">

    </p>
@stop
@section('allTdb')
    @include("pages.menu.menuTdb")
@endsection

@section('dataContent')
    @include("pages.includes.tdb")
@stop

