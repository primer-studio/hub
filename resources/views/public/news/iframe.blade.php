@extends('public.template')

@section('title')
{{ $news->title }}
@endsection

@section('content')
<h1 class="uk-hidden">{{ $news->title }}</h1>
<p class="uk-hidden">{{ strip_tags($news->description) }}</p>
<div class="uk-card uk-card-muted uk-card-small uk-card-body uk-border-rounded opacity-90" style="width: 100%">
    <iframe src="{{ $news->url }}" style="width:100%; overflow:visible; height: 60vh; max-height: 70vh" frameborder="0" title="{{ $news->title }}" ></iframe>
</div>
@endsection
