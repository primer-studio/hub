<div class="uk-card uk-card-default uk-card-large uk-margin-small-bottom uk-card-body uk-border-rounded opacity-90">
    <div class="uk-overflow-auto">
{{--        <img class="uk-border-rounded uk-align-center" src="{{ $cover }}">--}}
        <h2 class="uk-title uk-text-default">اخبار {{ $dataset[0]->service->title }}</h2>
        <table class="uk-table uk-table-justify">
            <tbody>
            <?php
            foreach ($dataset as $item):
            $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            $fa = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            $date = \Morilog\Jalali\Jalalian::forge($item['timestamp'])->ago();
            $date = str_replace($en, $fa, $date);
            ?>
            <tr>
                <td class="uk-table-shrink nws-ticker">
                    <span class="news-starter"></span>
                </td>
                <td class="uk-width-large nws-title"><a data-template="news-{{ $item->id }}" class="uk-link-reset news-title"
                                                       href="{{ route('Public > Show > News', $item->id) }}?utm_source=website&utm_medium=service_card&utm_campaign=default"
                                                       target="_blank">{!! $item['title'] !!}</a></td>
                <td class="uk-table-expand nws-publisher"><img class="favicon"
                                                               src="{{ $item->publisher->avatar }}"
                                                               alt="{{ $item->publisher->name }}">{{ $item->publisher->name }}
                </td>
                <td class="uk-table-expand nws-published-date">{{ $date }}</td>
                <td class="uk-table-expand nws-publisher-icon"><img class="favicon"
                                                                    src="{{ $item->publisher->avatar }}"
                                                                    alt="{{ $item->publisher->name }}"></td>
            </tr>
            <tr class="uk-hidden@s">
                <td><span class="news-starter"></span> <span class="uk-text-meta" style="color:#999;">{{ $date }}</span></td>
                <td></td>
                <td></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        {{-- render tooltips --}}
        <div class="tippy" style="display: none">
            @foreach ($dataset as $item)
                @if(!is_null($item->description))
                    <div class="tippy-desc-wrapper" id="news-{{ $item->id }}" style="border: 1px solid #2c2c2c;">
                        @php
                            $description = $item->description;
                            $description = str_replace('<div', '<p class="tippy-desc"', $description);
                            $description = str_replace('/div>', '/p>', $description);
                            $description = str_replace('<p', '<p style="color: #fff !important" ', $description);
                            $description = str_replace('<img', "<img alt={$item->title}", $description);
                        @endphp
                        <p class="tippy-desc">
                            {!! $description !!}
                        </p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
