<!DOCTYPE html>
<html>
    <head>
    @include('private.template-parts.header')
    </head>
    <body>
        @include('private.template-parts.nav')
        <div id="root-container" class="uk-margin-auto uk-container-large uk-grid-small" uk-grid>
            <div id="main" class="uk-width-1-1">
                @yield('content')
            </div>
        </div>
        @include('private.template-parts.scripts')
    </body>
</html>