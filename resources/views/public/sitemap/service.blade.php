@extends('public.sitemap')

@section('content')

<url>

    <loc>{{ urldecode(route('Public > Index')) }}</loc>

    <lastmod>{{ date('Y-m-d H:i:s') }}</lastmod>

    <changefreq>daily</changefreq>

    <priority>1.0</priority>
</url>

@if(count($services) > 0)
@foreach($services as $service)
<url>

    <loc>{{ urldecode(route('Public > Show > Service', $service->slug)) }}</loc>

    <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime(now()->subMinutes(2))) }}</lastmod>


    <changefreq>daily</changefreq>

    <priority>0.9</priority>
</url>
@endforeach
@endif

@endsection
