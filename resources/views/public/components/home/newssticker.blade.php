<div id="news-ticker" class="uk-padding-small uk-width-1-1 uk-border-rounded uk-margin-small-bottom" style='background: #0097e6'>
    <div class="uk-text-right" uk-grid>
        <div class="uk-width-expand uk-float-right uk-text-right uk-text-truncate uk-padding-remove"title="{{ $__GLOBAL['last_news'][0]->title }}">
            <span uk-icon="reply"></span>
            <span class="newsticker-container">
                <a href="{{ route('Public > Show > News',  $__GLOBAL['last_news'][0]->id) }}?utm_source=website&utm_medium=newsticker&utm_campaign=default" class="uk-link-reset">
                <span style="font-size: 14px">
                {{ $__GLOBAL['last_news'][0]->title }}
                </span>
                </a>
            </span>
        </div>
        <div class="uk-width-1-4 uk-float-left uk-text-left">
            <img alt="{{ $__GLOBAL['last_news'][0]->publisher->name }}" src="/{{ $__GLOBAL['last_news'][0]->publisher->avatar }}" style="width: 20px; padding: 1px; background: white; border-radius: 3px; vertical-align: middle; margin-top: 2%;">
        </div>
    </div>
</div>




{{--<button ="one">One</button>--}}
{{--<button data-template="two">Two</button>--}}
{{--<button data-template="three">Three</button>--}}

{{--<div style="display: none;">--}}
{{--    <div id="one">--}}
{{--        <strong>Content for `one`</strong>--}}
{{--    </div>--}}
{{--    <div id="two">--}}
{{--        <strong>Content for `two`</strong>--}}
{{--    </div>--}}
{{--    <div id="three">--}}
{{--        <strong>Content for `three`</strong>--}}
{{--    </div>--}}
{{--</div>--}}
