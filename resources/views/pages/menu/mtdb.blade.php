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
    <span class="badge badge-dark">
        <a class="text-white"
            href="{{ route('datas.tdb', isset($dataCommune) ? ['bilan',$dataCommune['slug']] : 'tdb') }}">#
            TdB Bilan</a>
    </span>
    <span class="badge badge-dark">
        <a class="text-white"
            href="{{ route('datas.tdb', isset($dataCommune) ? ['planning',$dataCommune['slug']] : 'tdb') }}">#
            TdB Planning</a>
    </span>
    <span class="badge badge-dark">
        <a class="text-white"
            href="{{ route('datas.tdb', isset($dataCommune) ? ['global',$dataCommune['slug']] : 'tdb') }}">#
            TdB Global</a>
    </span>
@endsection

@section('dataContent')
    @include("pages.includes.tdb")
@stop
