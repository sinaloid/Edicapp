@extends('template.dataShow')

@section('script')
    @include("script")
@stop
@section('dataTitle')
    <h3>TdB</h3>
@stop

@section('dataContent')
    @include("pages.includes.tdb")
@stop
