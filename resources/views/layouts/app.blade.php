<!DOCTYPE html>

<html>
<head id="head">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8" />
    <title>@yield('meta_title') - Dancing Goat</title>
    <link href="{{ asset('/css/Site.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="page-wrap">
            <header class="header" role="banner">
                <div class="menu">
                    <div class="container">
                        <nav role="navigation">
                            <ul>
                                <li>
                                	<a href="{{ route('home') }}">@lang('dancinggoat.Home')</a>
                                </li>
                                <li>
                                	<a href="{{ route('products') }}">@lang('dancinggoat.Coffees')</a>
                                </li>
                                <li>
                                	<a href="{{ route('articles') }}">@lang('dancinggoat.Articles')</a>
                                </li>
                                <li>
                                	<a href="{{ route('about') }}">@lang('dancinggoat.AboutUs')</a>
                                </li>
                                <li>
                                	<a href="{{ route('cafes') }}">@lang('dancinggoat.Cafes')</a>
                                </li>
                                <li>
                                	<a href="{{ route('contacts') }}">@lang('dancinggoat.Contact')</a>
                                </li>
                                <li>
                                	<a href="{{ route('partnership') }}">@lang('dancinggoat.Partnership')</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="additional-menu-buttons user-menu">
                            <nav role="navigation">
                                <ul class="dropdown-items-list dropdown-desktop-visible">
                                    <li>
                                    	<a href="?locale=en-us">English</a>
                                    </li>
                                    <li>
                                    	<a href="?locale=es-es">Español</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div id="message-box" class="container message">
                    @yield('messages')
                </div>
                <div class="header-row">
                    <div class="container">
                        <div class="col-xs-8 col-md-8 col-lg-4 logo">
                            <h1 class="logo">
                                <a href="{{ route('home') }}" class="logo-link">Dancing Goat</a>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container">
                @yield('body')
            </div>
        </div>
        <div class="footer-wrapper">
            <footer role="contentinfo">
                <div class="footer-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 footer-col">
                                <p>
                                    {!! $company_address !!}
                                </p>
                            </div>
                            <div class="col-md-4 col-lg-4 footer-col">
                                <h3>@lang('dancinggoat.FollowUs_Title')</h3>
                                <a class="followus-link" href="https://www.facebook.com/Dancing.Goat" target="_blank">
                                    <img alt="@lang('dancinggoat.FollowUsOnFacebook')" class="" src="{{ asset('images/facebook-icon.png') }}" title="@lang('dancinggoat.FollowUsOnFacebook')">
                                </a>
                                <a class="followus-link" href="https://twitter.com/DancingGoat78" target="_blank">
                                    <img alt="@lang('dancinggoat.FollowUsOnTwitter')" class="" src="{{ asset('images/twitter-icon.png') }}" title="@lang('dancinggoat.FollowUsOnTwitter')">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container copyright">
                    Copyright &copy; {{ date('Y') }} Dancing Goat. All rights reserved.
                </div>
            </footer>
        </div>

    </div>
    <script src="{{ asset('js/jquery-3.1.1.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.unobtrusive.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('scripts')

    <script type="text/javascript">
        !function(){var a='https://engage-ket.kenticocloud.com/js',b=document,c=b.createElement('script'),d=b.getElementsByTagName('script')[0];c.type='text/javascript',c.async=!0,c.defer=!0,c.src=a+'?d='+document.domain,d.parentNode.insertBefore(c,d)}(),window.ket=window.ket||function(){(ket.q=ket.q||[]).push(arguments)};
        ket('start', '{{ $engage_project_id }}');
    </script>
</body>
</html>