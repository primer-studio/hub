@php
    $routeName = Route::CurrentRouteName();
@endphp
<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
@include('public.template-parts.header')
</head>
<body class="dark-mode">
    @include('public.template-parts.nav')
    <div id="root-container" class="uk-margin-auto uk-container-large uk-grid-small" uk-grid>
        <div id="main" class="@if($routeName != 'Public > Show > News') uk-width-2-3@m @else uk-width-1-1 @endif">
            @if($routeName != 'Public > Real time')
            @include('public.components.home.newssticker')
            @endif

            @include('public.components.breadcurmbs')

            @yield('content')
        </div>
        @if($routeName != 'Public > Show > News')
        <div id="side" class="uk-width-1-3@m">
            @include('public.template-parts.sidebar')
        </div>
        @endif
    </div>
        @include('public.template-parts.mobile-sticky')
        @include('public.template-parts.scripts')
</body>
</html>
