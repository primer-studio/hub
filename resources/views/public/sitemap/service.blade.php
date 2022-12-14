@extends('public.sitemap')

@section('content')

<url>

    <loc>{{ urldecode(route('Public > Index')) }}</loc>

    <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime(now()->subMinutes(1))) }}</lastmod>

    <changefreq>daily</changefreq>

    <priority>1.0</priority>
</url>

@if(count($services) > 0)
@foreach($services as $service)
    @php if(is_null($service->news()->latest('timestamp')->first())) continue; @endphp
<url>

    <loc>{{ urldecode(route('Public > Show > Service', $service->slug)) }}</loc>

    <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime($service->news()->latest('timestamp')->first()->created_at)) }}</lastmod>


    <changefreq>daily</changefreq>

    <priority>0.9</priority>
</url>
@endforeach
@endif

@endsection
