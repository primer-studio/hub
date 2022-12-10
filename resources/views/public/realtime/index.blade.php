@extends('public.template')
@section('title')
    پخش زنده اخبار
@endsection
@section('content')
    <div
        class="uk-card uk-card-default uk-card-large uk-margin-medium-bottom uk-card-body uk-border-rounded opacity-90">
        <div class="uk-overflow-hidden">
            <div class="uk-child-width-1-2@m" style="margin: 0 !important;" uk-grid>
                <div class="uk-padding-remove">
                    <h2 class="uk-width-expand@s uk-text-default">پخش زنده اخبار</h2>
                </div>
                <div class="uk-float-left uk-visible@s">
                    <p class="uk-text-meta uk-float-left blink">
                        <span uk-icon="refresh" class="blink" style="vertical-align: middle; padding-left: 3px"></span>
                    </p>
                </div>
            </div>

            <ul id="realtime-container" class="uk-list">
                <div style="margin: auto; text-align: center" uk-spinner></div>
            </ul>
        </div>
    </div>
@endsection
