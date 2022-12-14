@extends('public.template')
@section('title')
    آخرین اخبار روز
@endsection
@section('content')
    @include('public.components.home.top-hits', ['hitset' => $hitset])
    @include('public.components.home.tradingview-ticker')
    @foreach($dataset as $key => $item)
        @if($loop->iteration == 2)
            @include('public.components.home.story')
        @endif
        @include('public.components.home.service-card', ['dataset' => $dataset[$key], 'cover' => asset("assets/theme/minimal/images/$key.png")])
    @endforeach
@endsection
