<title>@yield('title') - {{ env('APP_NAME') }}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/assets/theme/minimal/css/uikit-rtl.min.css" />
<script src="/assets/theme/minimal/js/uikit.min.js"></script>
<script src="/assets/theme/minimal/js/uikit-icons.min.js"></script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
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
    * {
        font-family: 'Vazir';
        color: #2c3e50;
    }
    body {
        /* background: url('https://www.teahub.io/photos/full/111-1110876_spotify-wallpaper.jpg');
        background-repeat: no-repeat;
        background-position: center; */
        /* background: #34495e; */
        background: #e9e9e9;
        min-height: 100vh;
    }
    #nav {
        padding: 0 3%;
    }
    #logo {
        max-width: 50px;
    }
    #root-container {
        padding: 2px;
    }    
    table tbody tr td {
        padding: 3px !important;
        font-size: 13px !important;
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