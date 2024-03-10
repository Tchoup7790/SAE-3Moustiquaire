<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="shortcut icon" href="{{asset("images/logo/logo__favicon.png")}}" type="image/png">
    <link rel="stylesheet" href="{{asset("src/main.css")}}">
    @yield("css")
</head>
<body>
@include('overlay.searchBar')
@include('overlay.burgerMenu')
<div class="overlayScreen"></div>
<header class="header">
    <nav class="navbar">
        <ul class="navbar__list">
            <li class="navbar__list__line navbar__list__line--left">
                <svg class="burgerMenu__button navbar__list__line__svg svg--2" xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31">
                    <path d="M3.75 9.25H26.25" stroke-width="2" stroke-linecap="round"/>
                    <path d="M3.75 21.75H26.25" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <svg  class="searchBar__button navbar__list__line__svg svg--2" xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31">
                    <path d="M14.375 26.75C20.9334 26.75 26.25 21.4334 26.25 14.875C26.25 8.31662 20.9334 3 14.375 3C7.81662 3 2.5 8.31662 2.5 14.875C2.5 21.4334 7.81662 26.75 14.375 26.75Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M27.5 28L25 25.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </li>
            <li class="navbar__list__line navbar__list__line--logo">
                <a href="{{route('index')}}">
                    <h1 class="navbar__list__line--logo__text">
                        <span>Les 3 Moustiquaires</span>
                        <span>Les 2 Moustiquaires</span>
                        <span>Les 1 Moustiquaires</span>
                        <span>Les 2 Moustiquaires</span>
                        <span>Les 3 Moustiquaires</span>
                    </h1>
                </a>
            </li>
            <li class="navbar__list__line navbar__list__line--right">
                <a href="{{route("user.index")}}">
                    <svg class="svg--2" xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31">
                        <path d="M15 15.5C18.4518 15.5 21.25 12.7018 21.25 9.25C21.25 5.79822 18.4518 3 15 3C11.5482 3 8.75 5.79822 8.75 9.25C8.75 12.7018 11.5482 15.5 15 15.5Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M25.7367 28C25.7367 23.1625 20.9242 19.25 14.9992 19.25C9.07421 19.25 4.26172 23.1625 4.26172 28" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
                    </svg>
                </a>
                <a href="{{route("user.cart.index")}}">
                    <svg class="svg--2" xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31">
                        <path d="M11.0133 3L6.48828 7.5375" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"/>
                        <path d="M18.9883 3L23.5133 7.5375" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"/>
                        <path d="M2.5 10.3125C2.5 8 3.7375 7.8125 5.275 7.8125H24.725C26.2625 7.8125 27.5 8 27.5 10.3125C27.5 13 26.2625 12.8125 24.725 12.8125H5.275C3.7375 12.8125 2.5 13 2.5 10.3125Z" stroke-width="2"/>
                        <path d="M4.375 13L6.1375 23.8C6.5375 26.225 7.5 28 11.075 28H18.6125C22.5 28 23.075 26.3 23.525 23.95L25.625 13" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
    <div class="line--horizontal"></div>
</header>

@yield("body")

<footer class="footer">
    <div class="line--horizontal"></div>
    <nav class="navbar">
        <ul class="navbar__list">
            <li><a href="{{route("help.index")}}" class="text--link">Help</a></li>
            <li><a href="{{route("help.contact")}}" class="text--link">Contact</a></li>
            <li><a href="{{route("help.legal")}}" class="text--link">Legal Notices</a></li>
            <li><a href="{{route("help.about")}}" class="text--link">About</a></li>
        </ul>
    </nav>
</footer>
</body>
</html>
