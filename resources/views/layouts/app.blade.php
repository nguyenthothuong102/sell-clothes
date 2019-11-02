<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <title>Cửa hàng bán quần áo - Những mẫu quần áo mới nhất theo xu hướng hiện tại</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jquery-ui/jquery-ui.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">

</head>

<body>
    @include('layouts.partials.header')
    @yield('content')
    @include('layouts.partials.footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.css') }}') }}, then Bootstrap JS -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/stellar.js') }}"></script>
    <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
    <!-- <script src="{{ asset('vendors/flipclock/timer.js') }}"></script> -->
    <script src="{{ asset('vendors/counter-up/jquery.counterup.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>

</body>

</html>
