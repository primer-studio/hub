<li>
    <ul class="uk-list uk-list-hyphen">
        @foreach($tabset as $item)
            <li class="text-overflow uk-text-small" title="{{ $item->publisher->name . ' - ' . $item->title }}" style="font-size: 13px">
                <a href="{{ route('Public > Show > News', $item->id ) }}?utm_source=website&utm_medium=sidebar_tabs&utm_campaign=default" target="_blank" class="uk-link-reset">
                    <img class="favicon" src="{{ asset('/').$item->publisher->avatar }}" alt="">
                    {{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
</li>
