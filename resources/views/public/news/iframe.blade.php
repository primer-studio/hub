@extends('public.template')

@section('title')
{{ $news->title }}
@endsection

@section('content')

@forelse($news->getTags() as $tag)
@if(Auth::check())
    <a onclick="SetDummyTag(this, {{ $tag->id }})" class="uk-link-reset">
        <span class="uk-label uk-label-warning">{{ $tag->name }}</span>
    </a>
@endif
@empty
@endforelse
<div class="uk-card uk-card-muted uk-card-small uk-card-body uk-border-rounded opacity-90" style="width: 100%">
    <iframe src="{{ $news->url }}" style="width:100%; overflow:visible; height: 60vh; max-height: 70vh" frameborder="0" title="{{ $news->title }}" ></iframe>
</div>
@endsection
