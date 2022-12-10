<div style="background: #1b1919; padding: 10px !important" class="uk-section uk-padding-remove">
    @php
        $jdate = new Verta();
        $jdate = verta();
        $jdate = $jdate->format('%A %d %B، %Y');
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $fa = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $jdate = str_replace($en, $fa, $jdate);
    @endphp
    <p class="uk-text-meta fa-num" style="color: white; margin-right: 2%">{{ $jdate }}</p>
</div>
<nav id="nav" class="uk-navbar-container" uk-navbar>

    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <a href="" class="uk-navbar-item uk-logo"></a>
            <li class="uk-active"><a href="{{ route('Public > Index') }}">
                <img id="logo" src="{{ asset('assets/theme/minimal/images/logo.png') }}" alt="{{ env('APP_NAME') }}" srcset="">
                </a>
            </li>
            <li>
                <a href="#"><span>سرویس‌ها</span></a>
                <div class="uk-navbar-dropdown uk-border-rounded">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        @foreach($__GLOBAL['services'] as $service)
                        <li><a href="{{ route('Public > Show > Service', $service->slug) }}">{{ $service->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <li><a href="{{ route('Public > Real time') }}"><span>پخش زنده اخبار</span></a></li>
        </ul>

    </div>

    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li>
                <a href=""><img src="{{ asset('assets/theme/minimal/images/sunny-outline.png') }}" alt=""></a>
            </li>
        </ul>

    </div>

</nav>
