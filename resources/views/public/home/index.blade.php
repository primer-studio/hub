@extends('public.template')
@section('title')
آخرین اخبار روز
@endsection
@section('content')
<div class="uk-card uk-card-default uk-card-large uk-card-body uk-border-rounded opacity-90">
    <ul uk-tab>
        <li><a class="uk-text-bold" href="#">اقتصادی</a></li>
        <li><a class="uk-text-bold" href="#">سیاسی</a></li>
        <li><a class="uk-text-bold" href="#">حوادث</a></li>
    </ul>

    <ul class="uk-switcher uk-margin">
        <li>
            <div class="uk-overflow-auto">
                <table class="uk-table uk-table-justify">
                    <!-- <caption>آخرین اخبار اقتصادی</caption> -->
                    <!-- 
                    <thead>
                        <tr>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                        </tr>
                    </tfoot>
                    -->
                    <tbody>
                    <?php
                        foreach ($dataset['economical'] as $item):
                        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                        $fa = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                        $date = \Morilog\Jalali\Jalalian::forge($item['timestamp'])->ago();
                        $date = str_replace($en, $fa, $date);
                    ?>
                        <tr>
                            <td class="uk-table-shrink nws-ticker"><ion-icon name="ellipse-outline" class="blink"></ion-icon></td>
                            <td class="uk-width-auto nws-title"><a class="uk-link-reset" href="{{ route('Public > Show > News', $item->id) }}" target="_blank">{{ $item['title'] }}</a></td>
                            <td class="uk-table-expand nws-publisher"><img class="favicon" src="{{ $item->publisher->avatar }}" alt="{{ $item->publisher->name }}">{{ $item->publisher->name }}</td>
                            <td class="uk-table-expand nws-published-date">{{ $date }}</td>
                            <td class="uk-table-expand nws-publisher-icon"><img class="favicon" src="{{ $item->publisher->avatar }}" alt="{{ $item->publisher->name }}"></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>
        <div class="uk-overflow-auto">
                <table class="uk-table uk-table-justify">
                    <!-- <caption>آخرین اخبار سیاسی</caption> -->
                    <!-- 
                    <thead>
                        <tr>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                        </tr>
                    </tfoot>
                    -->
                    <tbody>
                    <?php
                        foreach ($dataset['political'] as $item):
                        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                        $fa = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                        $date = \Morilog\Jalali\Jalalian::forge($item['timestamp'])->ago();
                        $date = str_replace($en, $fa, $date);
                    ?>
                        <tr>
                            <td class="uk-table-shrink nws-ticker"><ion-icon name="ellipse-outline" class="blink"></ion-icon></td>
                            <td class="uk-width-auto nws-title"><a class="uk-link-reset" href="{{ route('Public > Show > News', $item->id) }}" target="_blank">{{ $item['title'] }}</a></td>
                            <td class="uk-table-expand nws-publisher"><img class="favicon" src="{{ $item->publisher->avatar }}" alt="{{ $item->publisher->name }}">{{ $item->publisher->name }}</td>
                            <td class="uk-table-expand nws-published-date">{{ $date }}</td>
                            <td class="uk-table-expand nws-publisher-icon"><img class="favicon" src="{{ $item->publisher->avatar }}" alt="{{ $item->publisher->name }}"></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>
        <div class="uk-overflow-auto">
                <table class="uk-table uk-table-justify">
                    <!-- <caption>آخرین اخبار حوادث</caption> -->
                    <!-- 
                    <thead>
                        <tr>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                        </tr>
                    </tfoot>
                    -->
                    <tbody>
                    <?php
                        foreach ($dataset['accident'] as $item):
                        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                        $fa = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                        $date = \Morilog\Jalali\Jalalian::forge($item['timestamp'])->ago();
                        $date = str_replace($en, $fa, $date);
                    ?>
                        <tr>
                            <td class="uk-table-shrink nws-ticker"><ion-icon name="ellipse-outline" class="blink"></ion-icon></td>
                            <td class="uk-width-auto nws-title"><a class="uk-link-reset" href="{{ route('Public > Show > News', $item->id) }}" target="_blank">{{ $item['title'] }}</a></td>
                            <td class="uk-table-expand nws-publisher"><img class="favicon" src="{{ $item->publisher->avatar }}" alt="{{ $item->publisher->name }}">{{ $item->publisher->name }}</td>
                            <td class="uk-table-expand nws-published-date">{{ $date }}</td>
                            <td class="uk-table-expand nws-publisher-icon"><img class="favicon" src="{{ $item->publisher->avatar }}" alt="{{ $item->publisher->name }}"></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </li>
    </ul>
</div>
@endsection