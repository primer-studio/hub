@extends('public.template')
@section('title')
    آخرین اخبار روز
@endsection
@section('content')
    @include('public.components.home.top-hits', ['hitset' => $hitset])
    @foreach($dataset as $key => $item)
        @include('public.components.home.service-card', ['dataset' => $dataset[$key], 'cover' => asset("assets/theme/minimal/images/$key.png")])
    @endforeach
@endsection
