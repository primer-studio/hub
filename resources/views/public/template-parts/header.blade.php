<title>@yield('title') - {{ env('APP_NAME') }}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="generator" content="FEEDMARK" />
<meta name="Development" content="Primer Studio" />
<meta name="author" content="FEEDMARK" />

<meta name="description" content="جدید ترین خبر های روز - اخبار روز ایران و جهان">
<meta name="keywords" content="@foreach($__GLOBAL['services'] as $service) {{ "اخبار " . $service->title . "," }} @endforeach">
<meta name="robots" content="index, follow">

<meta property="og:site_name" content="{{ env('APP_NAME') }}" />
<meta property="og:image" content="{{ asset('assets/theme/minimal/images/logo.png') }}" />
<meta property="og:title" content="@yield('title') - {{ env('APP_NAME') }}" />
<meta property="og:description" content="@foreach($__GLOBAL['services'] as $service) {{ "اخبار " . $service->title . "," }} @endforeach" />
<meta property='og:type' content='Article'/>
<meta property="og:url" content="{{ env('APP_URL') }}"/>

<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="application-name" content="FEEDMARK">
<meta name="apple-mobile-web-app-title" content="FEEDMARK">
<meta name="theme-color" content="#ffffff"/>
<meta name="msapplication-navbutton-color" content="#ff7b00">
<link rel="icon" sizes="128x128" href="{{ asset('assets/theme/minimal/images/logo.png') }}">
<link rel="apple-touch-icon" sizes="128x128" href="{{ asset('assets/theme/minimal/images/logo.png') }}">
<link rel="icon" sizes="192x192" href="{{ asset('assets/theme/minimal/images/logo.png') }}">
<link rel="apple-touch-icon" sizes="192x192" href="{{ asset('assets/theme/minimal/images/logo.png') }}">
<link rel="icon" sizes="256x256" href="{{ asset('assets/theme/minimal/images/logo.png') }}">
<link rel="apple-touch-icon" sizes="256x256" href="{{ asset('assets/theme/minimal/images/logo.png') }}">
<link rel="icon" sizes="512x512" href="{{ asset('assets/theme/minimal/images/logo.png') }}">
<link rel="apple-touch-icon" sizes="512x512" href="{{ asset('assets/theme/minimal/images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/theme/minimal/images/logo.png') }}"/>
<meta name="apple-mobile-web-app-status-bar-style" content="#ff7b00"/>
<meta name="msapplication-TileImage" content="{{ asset('assets/theme/minimal/images/logo.png') }}"/>
<meta name="msapplication-TileColor" content="#ffffff"/>

<link rel="stylesheet" href="{{ asset('assets/theme/minimal/css/uikit-rtl.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/theme/minimal/css/light.css') }}" />
<script src="{{ asset('assets/theme/minimal/js/uikit.min.js') }}"></script>
<script src="{{ asset('assets/theme/minimal/js/uikit-icons.min.js') }}"></script>

{{--TippyJS--}}
<script src="{{ asset('/assets/theme/minimal/libs/tippyjs/popper.min.js') }}"></script>
<script src="{{ asset('/assets/theme/minimal/libs/tippyjs/tippy-bundle.umd.min.js') }}"></script>

{{--StructureData--}}
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "فید مارک",
      "url": "{{ env('APP_URL') }}",
      "logo": "{{ asset('assets/theme/minimal/images/logo-v2.png') }}"
    }
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L69F97CJJT"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-L69F97CJJT');
</script>
<style>
    @font-face {
        font-family: "Vazir";
        src: url("/assets/theme/minimal/fonts/Vazir-Light.eot");
        src: url("/assets/theme/minimal/fonts/Vazir-Light?#iefix") format("embedded-opentype"), url("/assets/theme/minimal/fonts/Vazir-Light.woff") format("woff"), url("/assets/theme/minimal/fonts/Vazir-Light.ttf") format("truetype");
        font-weight: normal;
    }
    @font-face {
        font-family: "Vazir-bold";
        src: url("/assets/theme/minimal/fonts/Vazir-Bold.eot");
        src: url("/assets/theme/minimal/fonts/Vazir-Bold.eot?#iefix") format("embedded-opentype"), url("/assets/theme/minimal/fonts/Vazir-Bold.ttf") format("truetype");
        font-weight: bold;
    }
    @font-face {
        font-family: "Vazir-medium";
        src: url("/assets/theme/minimal/fonts/Vazir-Medium.eot");
        src: url("/assets/theme/minimal/fonts/Vazir-Medium.eot?#iefix") format("embedded-opentype"), url("/assets/theme/minimal/fonts/Vazir-Medium.ttf") format("truetype");
        font-weight: 200;
    }
    *:not(i) {
        font-family: 'Vazir' !important;
        color: #2c3e50;
    }
    body {
        /* background: url('https://www.teahub.io/photos/full/111-1110876_spotify-wallpaper.jpg');
        background-repeat: no-repeat;
        background-position: center; */
         /*background: #34495e; */
        /*background: #e9e9e9;*/
        background: #2a2a2a;
        min-height: 100vh;
    }

    .uk-grid {
        margin: auto !important;
    }

    #nav {
        padding: 0 3%;
    }

    #logo {
        max-width: 50px;
        padding: 5%;
        background: white;
    }

    #theme-switcher {
        max-width: 25px;
        padding: 2px;
    }

    #root-container {
        padding: 2px;
    }

    #root-container * {
        color: white;
    }

    .uk-card-default {
        background: #202124 !important;
    }

    #nav {
        background: #202124;
    }

    #nav * {
        color: white;
    }

    .uk-navbar-dropdown {
        background: #202124;
        border: 1px solid #2c2c2c;
        top: 50px !important;
    }

    table tbody tr td {
        padding: 3px !important;
        font-size: 13px !important;
    }
    /*.tippy div div span,div,p {*/
    /*    color: #e9e9e9 !important;*/
    /*}*/
    .tippy-desc-wrapper p {
        color: #fff !important;
    }
    .tippy-desc {
        color: #fff;
        text-align: justify;
    }
    .tippy-desc-wrapper p {
        color: #fff;
        text-align: justify;
    }
    .tippy-desc img {
        border-radius: 3px;
        margin: 0px auto;
        display: block;
        border: 1px solid #666;
    }
    .news-starter {
        width: 5px;
        height: 5px;
        display: inline-block;
        /*background: #d9d9d9;*/
        background: #999;
        border-radius: 1px;
    }
    .opacity-90 {
        background: rgb(255 255 255 / 90%)
    }
    .blink {
        animation: blinker 1.5s cubic-bezier(.5, 0, 1, 1) infinite alternate;
        color: #e74c3c;
    }
    @keyframes blinker {
        from { opacity: 1; }
        to { opacity: 0; }
    }
    .favicon {
        max-width: 15px;
        margin-left: 5px;
        border-radius: 2px;
        /* margin-right: 2%; */
    }
    .uk-grid-small>* {
        padding: 15px;
    }
    .nws-publisher-icon {
        display: none;
    }
    ul.horizontal-tabs {
        display: flex;
        /*flex-wrap: wrap;*/
        flex-wrap: unset !important;
        margin-right: -20px;
        padding: 0;
        list-style: none;
        position: relative;
        white-space: nowrap;
        overflow-x: auto;

        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    ul.horizontal-tabs::-webkit-scrollbar {
        display: none;
    }

    .text-overflow {
        width: 70%; /* the element needs a fixed width (in px, em, %, etc) */
        overflow: hidden; /* make sure it hides the content that overflows */
        white-space: nowrap; /* don't break the line */
        text-overflow: ellipsis; /* give the beautiful '...' effect */
    }
    .text-overflow-parent {
        padding: 12px;
    }
    .item-counter {
        display: inline-table;
        border-radius: 3px;
        padding: 0px 2px;
        width: 15px;
        height: 15px;
        text-align: center;
        vertical-align: middle;
        margin-left: 5px;
    }

    .item-counter span {
        color: #ffffff;
    }

    /* https://i.pinimg.com/736x/18/b7/3e/18b73ed41c2d29c43808f1c064d81051.jpg */
    .item-counter-rank-1 {
        background: #194569;
    }
    .item-counter-rank-2 {
        background: #5F84A2;
    }
    .item-counter-rank-3 {
        background: #91AEC4;
    }
    .item-counter-rank-4 {
        /*background: #B7D0E1;*/
        background: #525252;
    }
    .item-counter-rank-5 {
        /*background: #CADEE0;*/
        background: #2e2e2e;
    }
    .position-sticky {
        position: sticky;
        bottom: 0;
        z-index: 9999;
        text-align: center;
    }
    .filter-invert {
        /*filter: invert(1);*/
        border-radius: 5px;
        box-sizing: border-box;
        background: #fff;
    }
</style>
<style>
    /* start of desktop styles */

    @media screen and (max-width: 991px) {
    /* start of large tablet styles */

    }

    @media screen and (max-width: 767px) {
    /* start of medium tablet styles */

    }

    @media screen and (max-width: 479px) {
    /* start of phone styles */
        .nws-ticker, .nws-publisher, .nws-published-date {
            display: none
        }
        td.nws-title a {
            margin-right: 5px;
        }
        td.uk-width-auto.nws-title {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            /* display: inline-block; */
            max-width: 250px;
        }

        /* td.nws-title {
            width: 80% !important;
        } */
        /* td.nws-icon {
            width: auto !important;
        } */
        .nws-publisher-icon {
            display: unset;
            max-width: min-content;
        }
        tbody tr:nth-child(odd){
            border-right: 1px solid #4c8bf540;
        }
    }
</style>
