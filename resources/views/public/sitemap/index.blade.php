@extends('public.sitemap')

@section('content')

<url>

    <loc>{{ route('Public > Index') }}</loc>

    <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime(date('Y-m-d H:i:s'))) }}</lastmod>

    <changefreq>daily</changefreq>

    <priority>0.8</priority>

</url>

<url>

    <loc>{{ route('Sitemap > News') }}</loc>

    <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime(\App\Models\News::latest()->orderByDesc('timestamp')->take(1)->first()->updated_at)) }}</lastmod>

    <changefreq>daily</changefreq>

    <priority>0.8</priority>

</url>

<url>

    <loc>{{ route('Sitemap > Services') }}</loc>

    <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime(\App\Models\News::latest()->orderByDesc('timestamp')->take(1)->first()->updated_at)) }}</lastmod>

    <changefreq>weekly</changefreq>

    <priority>0.8</priority>

</url>

<url>

    <loc>{{ route('Sitemap > Publishers') }}</loc>

    <lastmod>{{ gmdate('Y-m-d\TH:i:s+00:00', strtotime(\App\Models\News::latest()->orderByDesc('timestamp')->take(1)->first()->updated_at)) }}</lastmod>

    <changefreq>daily</changefreq>

    <priority>0.8</priority>

</url>
@endsection
