@extends('public.template')

@section('title')
{{ $news->title }}
@endsection

@section('content')
<div class="uk-card uk-card-default uk-card-large uk-card-body uk-border-rounded opacity-90" style="width: 100%">
    <iframe  src="{{ $news->url }}" style="width:100%; overflow:visible; height: 80vh;" frameborder="0" title="{{ $news->title }}" ></iframe>
</div>
@endsection
