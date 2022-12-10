<div class="uk-card uk-card-default uk-card-medium uk-margin-small-bottom uk-card-body uk-border-rounded opacity-90">
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
<div class="uk-card uk-card-default uk-card-medium uk-card-body uk-border-rounded uk-margin-small-bottom opacity-90">
{{--    <img src="{{ asset('assets/theme/minimal/images/realtime-news.png') }}" class="uk-border-rounded uk-margin-small-bottom" alt="پخش زنده اخبار">--}}
{{--    <img src="{{ asset('assets/theme/minimal/images/realtime-news-f2.png') }}" class="uk-border-rounded uk-margin-small-bottom" alt="پخش زنده اخبار">--}}
    <a href="{{ route('Public > Real time') }}?utm_source=website&utm_medium=sidebar_reatltime_banner&utm_campaign=default">
        <img src="{{ asset('assets/theme/minimal/images/realtime-news-f3.png') }}" class="uk-border-rounded uk-animation-fade uk-margin-small-bottom" alt="پخش زنده اخبار">
    </a>
</div>
<div class="uk-card uk-card-default uk-card-medium uk-card-body uk-border-rounded uk-margin-small-bottom opacity-90">
    <span class="uk-text-meta uk-display-inline" style="color:#999;">ads</span>
    <div class="uk-container uk-margin-small uk-margin-medium-top">
        <img src="{{ asset('assets/advertisements/jabama.gif') }}" class="uk-border-rounded uk-animation-fade uk-margin-small-bottom" alt="ads">
        <img src="{{ asset('assets/advertisements/afranet.gif') }}" class="uk-border-rounded uk-animation-fade uk-margin-small-bottom" alt="ads">
    </div>
</div>
