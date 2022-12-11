@extends('public.template')
@section('title')
    یافت نشد!
@endsection
@section('content')
    <div class="uk-card uk-card-default uk-card-large uk-margin-medium-bottom uk-card-body uk-border-rounded opacity-90">
        <div class="uk-text-center">
            <img class="http-4xx" src="{{ asset('assets/theme/minimal/images/404.png') }}" alt="">
            <p class="uk-text-meta">صفحه‌ی درخواستی شما وجود ندارد!</p>
            <p class="uk-text-bold">پیشنهاد می‌کنیم صفحات زیر را ببینید.</p>
            <p class="uk-text-meta"><span class="news-starter"></span> <a href="{{ route('Public > Real time') }}" class="uk-link-reset">پخش زنده اخبار</a></p>
            <p class="uk-text-meta"><span class="news-starter"></span> <a href="/service/اخبار-فرهنگی" class="uk-link-reset">آخرین اخبار فرهنگی</a></p>
            <p class="uk-text-meta"><span class="news-starter"></span> <a href="/service/اخبار-ورزشی" class="uk-link-reset">آخرین اخبار ورزشی</a></p>
        </div>
    </div>
@endsection
