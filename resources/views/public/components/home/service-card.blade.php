<div class="uk-card uk-card-default uk-card-large uk-margin-medium-bottom uk-card-body uk-border-rounded opacity-90">
    <div class="uk-overflow-auto">
        <!-- <img class="uk-border-rounded uk-align-center" src="{{ $cover }}"> -->
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
                    <ion-icon name="ellipse-outline" class="blink"></ion-icon>
                </td>
                <td class="uk-width-large nws-title"><a class="uk-link-reset"
                                                       href="{{ route('Public > Show > News', $item->id) }}"
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
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
