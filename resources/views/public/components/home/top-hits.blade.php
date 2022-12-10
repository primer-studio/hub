<div class="uk-card uk-card-default uk-card-large uk-margin-small-bottom uk-card-body uk-border-rounded opacity-90 uk-width-1-1">
    <div class="uk-overflow-hidden">
        <h2 class="uk-title uk-text-default">پربازدید امروز</h2>
        <ul class="uk-list uk-list-none">
            @forelse($hitset as $item)
            <li class="text-overflow-auto uk-text-small" title="{{ $item->title }}">
                <div class="item-counter item-counter-rank-{{ $loop->iteration }}"><span>{{ PersianNumber($loop->iteration) }}</span></div> <a href="{{ Route('Public > Show > News', $item->id) }}?utm_source=website&utm_medium=tophits&utm_campaign=default" target="_blank" class="uk-link-reset">{{ $item->title }}</a>
            </li>
            @empty
                <span class="uk-text-meta">متاسفانه در حال حاضر داده‌ای در دسترس نمی‌باشد.</span>
            @endforelse
        </ul>
    </div>
</div>
