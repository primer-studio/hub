@extends('public.template')
@section('title')
    پخش زنده اخبار
@endsection
@section('content')
    <div
        class="uk-card uk-card-default uk-card-large uk-margin-medium-bottom uk-card-body uk-border-rounded opacity-90 uk-width1-1">
        <div class="uk-overflow-auto">
            <div class="uk-child-width-1-2@m" style="margin: 0 !important;" uk-grid>
                <div>
                    <h2 class="uk-width-expand@s uk-text-large">پخش زنده اخبار</h2>
                </div>
                <div class="uk-float-left uk-visible@s">
                    <p class="uk-text-meta uk-float-left blink"><ion-icon name="ellipse-outline" class="blink" style="vertical-align: middle; padding-left: 3px"></ion-icon>بروزرسانی ...</p>
                </div>
            </div>

            <ul id="realtime-container" class="uk-list">
                <div style="margin: auto; text-align: center" uk-spinner></div>
            </ul>
        </div>
    </div>
@endsection
