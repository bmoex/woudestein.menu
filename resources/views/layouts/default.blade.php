<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('page-title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="serfhos-container no-toggle clearfix">
    <div class="content-left-container">
        <div class="menu-container">
            <div class="menu-container-background"></div>
            <div class="menu-toggle-container">
                <span><i class="toggle-close fa fa-angle-left"></i></span>
                <span><i class="menu fa fa-bars"></i></span>
                <span><i class="toggle-open fa fa-angle-right"></i></span>
            </div>
            <div class="navigation-container">
                <nav class="navigation-container-icons">
                    <ul class="icon-navigation">
                        @yield('menu-items')
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="content-right-container">
        <div class="content-right-inner-container">
            @yield('content')
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libraries/jquery-2.1.4.min.js"><\/script>')</script>
<script src="/js/all.js"></script>
@yield('javascript')
</body>
</html>
