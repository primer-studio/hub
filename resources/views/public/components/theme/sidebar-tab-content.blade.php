<li>
    <ul class="uk-list uk-list-hyphen">
        @foreach($tabset as $item)
            <li class="text-overflow uk-text-small" title="{{ $item->publisher->name . ' - ' . $item->title }}">
                <a href="{{ route('Public > Show > News', $item->id ) }}" target="_blank" class="uk-link-reset">{{ $item->title }}</a>
            </li>
        @endforeach
    </ul>
</li>
