<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title') | Vcommerce</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('media/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('media/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('media/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('media/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css" href="{{ asset('themes/learn/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/learn/vendor/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/learn/css/flaticon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/learn/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/learn/css/style.css') }}" />
    <script type="text/javascript" src="{{ asset('themes/learn/vendor/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/learn/vendor/jquery-ui/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/learn/js/jquery.lazy.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/learn/js/jquery.particleground.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/learn/css/course.css') }}" />

    @yield('styles')

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WDV2GCR');
    </script>
    <!-- End Google Tag Manager -->

</head>

<body class="gradient">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WDV2GCR" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <script>
        var url = '/';
    </script>
    <script>
        var nextPage = 'courses/workshoponeline/1';
    </script>
    <div id="particles-background" class="vertical-centered-box"></div>
    <div id="particles-foreground" class="vertical-centered-box"></div>
    <div class="wrapper">
        <div class="body-wrapper">           

            @yield('content')

        </div>
    </div>

    @yield('scripts')

    <script type="text/javascript" src="{{ asset('themes/learn/vendor/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/learn/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/learn/js/jquery.countdownTimer.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/learn/js/bootbox.min.js') }}"></script>
</body>

</html>