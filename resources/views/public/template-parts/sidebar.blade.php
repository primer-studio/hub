<div class="uk-card uk-card-default uk-card-medium uk-card-body uk-border-rounded opacity-90">
{{--    <ul id="realtime-side" class="uk-list uk-list-circle">--}}
{{--        <li>List item 1</li>--}}
{{--        <li>List item 2</li>--}}
{{--        <li>List item 3</li>--}}
{{--    </ul>--}}
    <div class="uk-width-auto@m">
        <ul class="uk-flex-center" uk-tab="connect: #component-tab-sidebar; animation: uk-animation-fade">
            <li><a href="#">پربازدید</a></li>
            <li><a href="#">پیشنهادی</a></li>
            <li><a href="#">تازه‌ترین</a></li>
        </ul>
    </div>
    <div class="uk-width-expand@m">
        <ul id="component-tab-sidebar" class="uk-switcher">
            @include('public.components.theme.sidebar-tab-content', ['tabset' => $__GLOBAL['sidebar_tabset']['today_hits']])
            @include('public.components.theme.sidebar-tab-content', ['tabset' => $__GLOBAL['sidebar_tabset']['suggested']])
            @include('public.components.theme.sidebar-tab-content', ['tabset' => $__GLOBAL['sidebar_tabset']['recent']])
        </ul>
    </div>

</div>
