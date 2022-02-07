<!DOCTYPE html>
<html dir="rtl">
    <head>
    @include('public.template-parts.header')
    </head>
    <body>
        @include('public.template-parts.nav')
        <div id="root-container" class="uk-margin-auto uk-container-large uk-grid-small" uk-grid>
            <div id="main" class="uk-width-2-3@m">
                @yield('content')
            </div>
            <div id="side" class="uk-width-1-3@m">
                @include('public.template-parts.sidebar')
            </div>
        </div>
        @include('public.template-parts.scripts')
    </body>
</html>