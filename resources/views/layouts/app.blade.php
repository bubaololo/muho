<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nunito:wght@400;600&family=Poppins:ital@1&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icomoon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    @livewireStyles
    @stack('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <!-- Scripts -->
    {{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}

    {{--    <link rel="stylesheet" href="{{ asset('build/assets/app.525f5899.css') }}">--}}
    {{--    <script src="{{ asset('build/assets/app.340e5d39.js') }}"></script>--}}

</head>
<body>

<header id="header">
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <a href="{{ route('index') }}" class="main-logo">
                    <img class="main-logo__part main-logo__part_base"
                         src="{{ asset('images/tmpimg/logo_main_part.svg') }}" alt="logo">
                    {{--                            <div class="main-logo__part main-logo__part_left-eye"></div>--}}
                    <svg class="main-logo__part main-logo__part-eye  main-logo__part_left-eye" viewBox="0 0 12 12"
                         version="1.1"
                         xmlns="http://www.w3.org/2000/svg">
                        <circle cx="6" cy="6" r="5" fill="#FA370F"/>
                    </svg>
                    <svg class="main-logo__part main-logo__part-eye main-logo__part_right-eye" viewBox="0 0 12 12"
                         version="1.1"
                         xmlns="http://www.w3.org/2000/svg">
                        <circle cx="6" cy="6" r="5" fill="#FA370F"/>
                    </svg>
                </a>

            </div>

            <div class="col-md-10">

                <nav id="navbar">
                    <div class="main-menu stellarnav">
                        <ul class="menu-list">
                            {{--                                    <li class="menu-item active"><a href="{{ route('index') }}"--}}
                            {{--                                                                    data-effect="Home">Главная</a>--}}
                            {{--                                    </li>--}}
                            <li class="menu-item"><a href="{{ route('products.list') }}" class="nav-link"
                                                     data-effect="About">Фасовки</a>
                            </li>
                            {{--                                    <li class="menu-item has-sub">--}}
                            {{--                                        <a href="#pages" class="nav-link" data-effect="Pages">Pages</a>--}}

                            {{--                                        <ul>--}}
                            {{--                                            <li class="active"><a href="{{ route('index') }}">Главная</a></li>--}}
                            {{--                                            <li><a href="about.html">About</a></li>--}}
                            {{--                                            <li><a href="styles.html">Styles</a></li>--}}
                            {{--                                            <li><a href="blog.html">Blog</a></li>--}}
                            {{--                                            <li><a href="single-post.html">Post Single</a></li>--}}
                            {{--                                            <li><a href="{{ route('products.list') }}">Витрина</a></li>--}}
                            {{--                                            <li><a href="single-product.html">Product Single</a></li>--}}
                            {{--                                            <li><a href="contact.html">Contact</a></li>--}}
                            {{--                                            <li><a href="thank-you.html">Thank You</a></li>--}}
                            {{--                                        </ul>--}}

                            {{--                                    </li>--}}
                            {{--                                    <li class="menu-item"><a href="#popular-books" class="nav-link"--}}
                            {{--                                                             data-effect="Shop">Shop</a></li>--}}
                            {{--                                    <li class="menu-item"><a href="#latest-blog" class="nav-link"--}}
                            {{--                                                             data-effect="Articles">Articles</a>--}}
                            {{--                                    </li>--}}
                            <li class="menu-item"><a href="#contact" class="nav-link"
                                                     data-effect="Contact">Контакты</a></li>
                            @auth
                                <a href="{{ route('home') }}" class="user-account for-buy"><i
                                        class="icon icon-user"></i><span>Профиль</span></a>
                            @endauth

                            @livewire('cart-counter')
                            <div class="action-menu">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))

                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>

                                    @endif

                                    @if (Route::has('register'))

                                        <a class="nav-link"
                                           href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>

                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                           role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end"
                                             aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                                <!--top-right-->

                            </div>
                        </ul>

                        <div class="hamburger">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>

                    </div>
                </nav>

            </div>

        </div>
    </div>
</header>
</div><!--header-wrap-->

@yield('content')


<footer id="footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4">

                <div class="footer-item">
                    <div class="company-brand">
                        <img src="{{ asset('images/tmpimg/logo_text.svg') }}" alt="logo" class="footer-logo">
                        <p>Сами любим это дело) </p>
                    </div>
                </div>

            </div>

            <div class="col-md-2">

                <div class="footer-menu">
                    <h5>Контакты</h5>
                    <ul class="menu-list">
                        <li class="menu-item">
                            <a href="#">Telegram</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Whatsapp </a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Viber</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">E-mail</a>
                        </li>
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">donate</a>--}}
{{--                        </li>--}}
                    </ul>
                </div>

            </div>
{{--            <div class="col-md-2">--}}

{{--                <div class="footer-menu">--}}
{{--                    <h5>Discover</h5>--}}
{{--                    <ul class="menu-list">--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Home</a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Books</a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Authors</a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Subjects</a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Advanced Search</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="col-md-2">--}}

{{--                <div class="footer-menu">--}}
{{--                    <h5>My account</h5>--}}
{{--                    <ul class="menu-list">--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Sign In</a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">View Cart</a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">My Wishtlist</a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Track My Order</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="col-md-2">--}}

{{--                <div class="footer-menu">--}}
{{--                    <h5>Help</h5>--}}
{{--                    <ul class="menu-list">--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Help center</a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Report a problem</a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Suggesting edits</a>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item">--}}
{{--                            <a href="#">Contact us</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--            </div>--}}

        </div>
        <!-- / row -->

    </div>
</footer>

<div id="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="copyright">
                    <div class="row">

                        <div class="col-md-6">
                            <p>© {{ date("Y") }} All rights reserved. Muho.store</p>
                        </div>

                        <div class="col-md-6">
                            <div class="social-links align-right">
                                <ul>
                                    <li>
                                        <a href="#"><i class="icon icon-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-youtube-play"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-behance-square"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div><!--grid-->

            </div><!--footer-bottom-content-->
        </div>
    </div>
</div>



@vite(['resources/js/app.js']);
<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/modernizr.js') }}"></script>
@livewireScripts
@stack('scripts')
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
