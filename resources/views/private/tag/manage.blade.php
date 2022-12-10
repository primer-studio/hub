@extends('private.template')

@section('title')
    Tags Manage
@endsection

@section('content')
    <div class="uk-card uk-card-default uk-card-large uk-card-body uk-border-rounded opacity-90">
        <div class="uk-grid uk-child-width-1-2">
            <div>
                <h3 class="uk-card-title">Manage Tags</h3>
            </div>
        </div>
        <div class="uk-divider uk-divider-small"></div>
        <div class="uk-child-width-1-6@m uk-child-width-1-3@m" uk-filter="target: .js-filter" uk-grid>
            @foreach($tags as $tag)
                <div id="tag_{{ $tag->id }}"
                     class="uk-border-rounded uk-box-shadow-hover-small uk-padding-small uk-text-center" style="width: max-content; border: 1px solid #c7c7c7">
                    <a onclick="SetDummyTag(this, {{ $tag->id }})"
                       class="uk-link-reset @if(mb_strlen($tag->name) <= 4) tag-less-than-4 @else tag-more-than-4 @endif">
                        <span class="uk-label uk-label-danger">حذف</span>
                    </a>
                    <span>{{ $tag->name }} x {{ $tag->news()->count() }}</span>
                </div>
            @endforeach
        </div>

        <div class="uk-margin-medium-top">
            {{ $tags->links('vendor.pagination.uikit') }}
        </div>
    </div>
@endsection

@if(\Request::route()->getName() == 'Admin > Dashboard > Tags > Manage')
    <script>
        /**
         * Main form request handler
         * */
        function SetDummyTag(dispatcher, tag_id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    let msg = JSON.parse(this.responseText);
                    UIkit.notification({
                        message: msg.message,
                        status: msg.type,
                        pos: 'bottom-right',
                        timeout: 3000
                    });
                    document.querySelector('#tag_' + tag_id).classList.toggle('uk-disabled');
                    document.querySelector('#tag_' + tag_id).classList.toggle('uk-background-secondary');
                }
            };
            xhttp.open("POST", "{{ route('Admin > Ajax > SetDummyTag') }}", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
            xhttp.send("id=" + tag_id);
        }

    </script>
@endif
