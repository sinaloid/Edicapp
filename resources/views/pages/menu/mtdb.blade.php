@extends('template.dataShow')

@section('script')
    @include("script")
@stop
@section('dataTitle')
    TdB
@stop

@section('dataContent')
    @include("pages.includes.tdb")
@stop
