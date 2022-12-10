@extends('public.sitemap')

@section('content')

@foreach($news as $item)
<url>

    <loc>{{ urldecode(route('Public > Show > News', $item->id)) }}</loc>

    <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime($item->updated_at)) }}</lastmod>

    <changefreq>weekly</changefreq>

    <priority>0.9</priority>

    <image:image>
        <image:loc>{{ asset('assets/theme/minimal/images/placeholder.png') }}</image:loc>
        <image:caption>{{ strip_tags($item->description) }}</image:caption>
        <image:title>{{ $item->title }}</image:title>
    </image:image>

</url>
@endforeach

@endsection
