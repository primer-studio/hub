<div class="uk-card uk-card-default uk-card-large uk-margin-medium-bottom uk-card-body uk-border-rounded opacity-90 uk-width-1-1">
    <div class="uk-overflow-auto">
        <h1 class="uk-title uk-text-default uk-text-bold">پربازدید امروز</h1>
        <ul class="uk-list uk-list-none">
            @foreach($hitset as $item)
            <li class="text-overflow-auto uk-text-small" title="{{ $item->title }}">
                <div class="item-counter item-counter-rank-{{ $loop->iteration }}"><span>{{ PersianNumber($loop->iteration) }}<span></div> <a href="{{ Route('Public > Show > News', $item->id) }}" target="_blank" class="uk-link-reset">{{ $item->title }}</a>
            </li>
            @endforeach
        </ul>        
    </div>
</div>
