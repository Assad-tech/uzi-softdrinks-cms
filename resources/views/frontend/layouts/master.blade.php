<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UZI - @yield('title')</title>

    <!-- fav-icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/assets/images/fav.png') }}">

    <link rel="stylesheet" href="{{ asset('front/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/video.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- custom css start -->
    @stack('custom_css')
</head>

<body>

    {{-- Header here --}}
    @yield('header')
    {{-- All Content --}}
    @yield('content')
    <!-- footer start -->
    @yield('footer')


    <!-- js -->
    <script src="{{ asset('front/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/aos.js') }}"></script>
    <script src="{{ asset('front/assets/js/anime.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/font.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/video.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script>
        AOS.init();
    </script>
    <!-- custom js start -->
    @stack('custom_js')


</body>

</html>
