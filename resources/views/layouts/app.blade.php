<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Panda - @yield('title')</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/material.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            {{--<img class="android-logo-image" src="/images/p.png">--}}
          </span>
            <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search-field">
                </div>
            </div>

            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="android-header-spacer mdl-layout-spacer"></div>
            <!-- Navigation -->
            <div class="android-navigation-container">
                <nav class="android-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">
                        <i class="material-icons green">local_grocery_store</i>{{ trans('main.shops') }}
                    </a>
                </nav>
            </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="/images/p.png">
          </span>
            <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                <li class="mdl-menu__item">5.0 Lollipop</li>
                <li class="mdl-menu__item">4.4 KitKat</li>
                <li disabled class="mdl-menu__item">4.3 Jelly Bean</li>
                <li class="mdl-menu__item">Android History</li>
            </ul>
        </div>
    </div>



    <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="android-logo-image" src="/images/p.png">
        </span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">{{ trans('main.shops') }}</a>
            <div class="android-drawer-separator"></div>
        </nav>
    </div>

    <div class="android-content mdl-layout__content">
        <a name="top"></a>

        <!-- Expandable Textfield -->
        <div class="header-search">
        <form action="#">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 50%">
                <input class="mdl-textfield__input" type="text" id="sample3">
                <label class="mdl-textfield__label" for="sample3">{{ trans('main.search') }}</label>
            </div>
        </form>
        </div>

        @yield('content')

        <footer class="android-footer mdl-mega-footer">
            <div class="mdl-mega-footer--top-section">
                <div class="mdl-mega-footer--left-section">
                    <button class="mdl-mega-footer--social-btn"></button>
                    &nbsp;
                    <button class="mdl-mega-footer--social-btn"></button>
                    &nbsp;
                    <button class="mdl-mega-footer--social-btn"></button>
                </div>
                <div class="mdl-mega-footer--right-section">
                    <a class="mdl-typography--font-light" href="#top">
                        Back to Top
                        <i class="material-icons">expand_less</i>
                    </a>
                </div>
            </div>

            <div class="mdl-mega-footer--middle-section">
                <p class="mdl-typography--font-light">Satellite imagery: © 2014 Astrium, DigitalGlobe</p>
                <p class="mdl-typography--font-light">Some features and devices may not be available in all areas</p>
            </div>

            <div class="mdl-mega-footer--bottom-section">
                <a class="android-link android-link-menu mdl-typography--font-light" id="version-dropdown">
                    Versions
                    <i class="material-icons">arrow_drop_up</i>
                </a>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="version-dropdown">
                    <li class="mdl-menu__item">5.0 Lollipop</li>
                    <li class="mdl-menu__item">4.4 KitKat</li>
                    <li class="mdl-menu__item">4.3 Jelly Bean</li>
                    <li class="mdl-menu__item">Android History</li>
                </ul>
                <a class="android-link android-link-menu mdl-typography--font-light" id="developers-dropdown">
                    For Developers
                    <i class="material-icons">arrow_drop_up</i>
                </a>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="developers-dropdown">
                    <li class="mdl-menu__item">App developer resources</li>
                    <li class="mdl-menu__item">Android Open Source Project</li>
                    <li class="mdl-menu__item">Android SDK</li>
                    <li class="mdl-menu__item">Android for Work</li>
                </ul>
                <a class="android-link mdl-typography--font-light" href="">Blog</a>
                <a class="android-link mdl-typography--font-light" href="">Privacy Policy</a>
            </div>
        </footer>
    </div>
</div>
<script src="/js/material.js"></script>
</body>
</html>