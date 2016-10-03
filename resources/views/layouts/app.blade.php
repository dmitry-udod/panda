<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index,follow"/>
    <meta name="application-name" content="{{env('SITE_URL')}}" />
    <meta name="description" content="{{ trans('main.city') }} @yield('meta_description')">
    <meta name="keywords" content="Panda, {{ trans('main.city') }}, @yield('meta_keywords')"/>
    <meta name="document-state" content="state"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=yes">
    <title>Panda - @yield('title')</title>

    <!-- Json-ld -->
    @yield('json_ld')

    <!-- Page styles -->
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/material.css">
    <link rel="stylesheet" href="/css/app.css">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K426SB');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K426SB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row logo-main">
          <span class="android-title mdl-layout-title">
            <a href="/" class="android-link android-link-menu mdl-typography--font-light logo-main">
                <img class="android-logo-image" src="/images/p.png">
                {{ env('SITE_URL') }}
            </a>
          </span>


            <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search-field" name="q">
                </div>
            </div>

            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="android-header-spacer mdl-layout-spacer"></div>
            <!-- Navigation -->
            <div class="android-navigation-container">
                <nav class="android-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase active" href="{{ route('shops')}}">
                        <i class="material-icons green">local_grocery_store</i>{{ trans('main.shops') }}
                    </a>
                </nav>
            </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="/images/p.png">
          </span>
            <a class="android-more-button mdl-button mdl-js-button mdl-button--icon " id="more-button">
                @include('flags.' . app()->getLocale())
            </a>
            <ul id="languages" class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                <li class="mdl-menu__item">
                    <a href="/uk">@include('flags.uk')Українська</a>
                </li>
                    <a href="/en">@include('flags.en')English</a>
                    <li class="mdl-menu__item">
                </li>
                <li class="mdl-menu__item">
                    <a href="/ru">@include('flags.ru')Русский</a>
                </li>
            </ul>
        </div>
    </div>



    <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="android-logo-image" src="/images/p.png">
        </span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="{{ route('shops')}}">
              <i class="material-icons green">local_grocery_store</i> {{ trans('main.shops') }}
            </a>
            <div class="android-drawer-separator"></div>
        </nav>
    </div>

    <div class="android-content mdl-layout__content">
        <a name="top"></a>

        <!-- Expandable Textfield -->
        <div class="header-search">
        <form action="" method="get">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 50%">
                <input class="mdl-textfield__input" type="text" id="q" name="q">
                <label class="mdl-textfield__label" for="q">{{ trans('main.search') }}</label>
            </div>
        </form>
        </div>

        @yield('content')

        <footer class="android-footer mdl-mega-footer">
            <div class="mdl-mega-footer--top-section">
                <div class="mdl-mega-footer--left-section">
                    <p class="mdl-typography--font-light">© {{ date('Y') }} {{ env('SITE_URL') }}</p>
                    <p class="mdl-typography--font-light"></p>
                    {{--<button class="mdl-mega-footer--social-btn"></button>--}}
                    {{--&nbsp;--}}
                    {{--<button class="mdl-mega-footer--social-btn"></button>--}}
                    {{--&nbsp;--}}
                    {{--<button class="mdl-mega-footer--social-btn"></button>--}}
                </div>

                <div class="mdl-mega-footer--right-section">
                    <a class="mdl-typography--font-light" href="#top">
                        <i class="material-icons">expand_less</i>
                    </a>
                </div>
            </div>

            {{--<div class="mdl-mega-footer--middle-section">--}}

            {{--</div>--}}

            {{--<div class="mdl-mega-footer--bottom-section">--}}
                {{--<a class="android-link mdl-typography--font-light" href="">Blog</a>--}}
                {{--<a class="android-link mdl-typography--font-light" href="">Privacy Policy</a>--}}
            {{--</div>--}}
        </footer>
    </div>
</div>

<script src="/js/material.js"></script>

@yield('js')

</body>
</html>
