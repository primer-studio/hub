@extends('public.template')

@section('title')
{{ $news->title }}
@endsection

@section('content')
<div class="uk-card uk-card-muted uk-card-small uk-card-body uk-border-rounded uk-margin-small-bottom opacity-90" id="socket-single-before-iframe">
    <div id="pos-article-display-77811"></div>
</div>
<h1 class="uk-hidden">{{ $news->title }}</h1>
<p class="uk-hidden">{{ strip_tags($news->description) }}</p>
<div class="uk-card uk-card-muted uk-card-small uk-card-body uk-border-rounded opacity-90" style="width: 100%">
    <iframe src="{{ $news->url }}" style="width:100%; overflow:visible; height: 60vh; max-height: 70vh" frameborder="0" title="{{ $news->title }}" ></iframe>
</div>
@endsection
