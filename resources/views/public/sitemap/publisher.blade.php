@extends('public.sitemap')

@section('content')

@foreach($publishers as $publisher)
<url>

    <loc>{{ urldecode(route('Public > Show > Publisher', [$publisher->id, str_replace(' ', '-', $publisher->name)])) }}</loc>

    <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime(now()->subMinutes(5))) }}</lastmod>

    <changefreq>daily</changefreq>

    <priority>0.7</priority>

</url>
@endforeach

@endsection
