<!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
        Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="{{ \App::getLocale() }}">
<head>
    <title>{{ __('Software Development') }}</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="/templated-ion/js/html5shiv.js"></script><![endif]-->
    <script src="/templated-ion/js/jquery.min.js"></script>
    <script src="/templated-ion/js/skel.min.js"></script>
    <script src="/templated-ion/js/skel-layers.min.js"></script>
    <script src="/templated-ion/js/init.js"></script>

    <!-- Bootstrap 3.3.6 -->
    {{--<link rel="stylesheet" href="/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css">--}}

    <!-- Bootstrap 3.3.6 -->
    {{--<script src="/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js"></script>--}}

    <noscript>
        <link rel="stylesheet" href="/templated-ion/css/skel.css" />
        <link rel="stylesheet" href="/templated-ion/css/style.css" />
        <link rel="stylesheet" href="/templated-ion/css/style-xlarge.css" />
    </noscript>

    <link rel="stylesheet" href="/css/app.css" />

    @stack('scripts')
    @stack('styles')
    @yield('css')

    <style type="text/css">
        #nav li.active a {
            text-decoration: underline;
        }
    </style>
</head>
<body id="top">

<!-- Header -->
<header id="header" class="skel-layers-fixed">
    <h1><a href="{{ url('/') }}">Web Diver</a></h1>
    <nav id="nav">
        <ul>
            {{--<li><a href="{{ url('/development') }}"><i class="fa fa-home major"></i></a></li>--}}
            <li @if(Request::is('development')) class="active" @endif><a href="{{ url('/development') }}">{{ __('development_menu.home') }}</a></li>
            <li @if(Request::is('development/cv')) class="active" @endif><a href="{{ url('/development/cv') }}">{{ __('development_menu.cv') }}</a></li>
            <li @if(Request::is('development/portfolio')) class="active" @endif><a href="{{ url('/development/portfolio') }}">{{ __('development_menu.portfolio') }}</a></li>
            <li @if(Request::is('development/blog*')) class="active" @endif><a href="{{ url('/development/blog') }}">{{ __('development_menu.blog') }}</a></li>
            <li @if(Request::is('development/contacts')) class="active" @endif><a href="{{ url('/development/contacts') }}">{{ __('development_menu.contacts') }}</a></li>
            <li>|</li>
            <li>
                @foreach(['en' => 'En', 'es' => 'Es', 'ru' => 'Ru'] as $_lCode => $_lCaption)
                    @if($__currentLocale == $_lCode)
                        <span style="text-decoration: underline;">{{ $_lCaption }}</span>
                    @else
                        <a href="{{ url('/switchLanguage/'.$_lCode) }}">{{ $_lCaption }}</a>
                    @endif
                    @if($_lCode != 'ru')
                        &nbsp;
                    @endif
                @endforeach
            </li>
            {{--<li><a href="#" class="button special">Sign Up</a></li>--}}
        </ul>
    </nav>
</header>

@yield('content')

<!-- Footer -->
<footer id="footer">
    <div class="container">
        <div class="row double">
            <div class="6u">
                <div class="row collapse-at-2">
                    <div class="6u">
                        <h3>Accumsan</h3>
                        <ul class="alt">
                            <li><a href="#">Nascetur nunc varius</a></li>
                            <li><a href="#">Vis faucibus sed tempor</a></li>
                            <li><a href="#">Massa amet lobortis vel</a></li>
                            <li><a href="#">Nascetur nunc varius</a></li>
                        </ul>
                    </div>
                    <div class="6u">
                        <h3>Faucibus</h3>
                        <ul class="alt">
                            <li><a href="#">Nascetur nunc varius</a></li>
                            <li><a href="#">Vis faucibus sed tempor</a></li>
                            <li><a href="#">Massa amet lobortis vel</a></li>
                            <li><a href="#">Nascetur nunc varius</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="6u">
                <h2>Aliquam Interdum</h2>
                <p>Blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan justo aliquet.</p>
                <ul class="icons">
                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
                </ul>
            </div>
        </div>
        <ul class="copyright">
            <li>{{--&copy; Untitled. All rights reserved.--}}Web Diver</li>
            <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
            <li>Images: <a href="http://unsplash.com">Unsplash</a></li>
        </ul>
    </div>
</footer>

</body>
</html>



{{--
<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Software Development</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    @stack('scripts')
    @stack('styles')

</head>
<body>
<div class="position-ref full-height development-wrapper">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @if (Auth::check())
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ url('/login') }}">Login</a>
                            <a href="{{ url('/register') }}">Register</a>
                        @endif
                    </div>
                @endif

    @include("parts.language-selector")

    <div class="content">
        <div class="title m-b-md">
            {{__('Software Development')}}
        </div>

        <div class="links">
            <a href="{{url('/development/')}}">{{__('main_menu.development')}}</a>
            <a href="{{url('/diving/')}}">{{__('main_menu.diving')}}</a>
            <a href="{{url('/music/')}}">{{__('main_menu.music')}}</a>
            <a href="{{url('/traveling/')}}">{{__('main_menu.traveling')}}</a>
            <a href="{{url('/living/')}}">{{__('main_menu.living')}}</a>
            <a href="{{url('/blog/')}}">{{__('main_menu.blog')}}</a>
        </div>

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
--}}