<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! settings()->get("scripts_head") !!}

    <title>{{ settings()->get("page_title") }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ settings()->get("page_description") }}">
    <meta name="robots" content="{{ settings()->get("page_robots") }}">
    <meta name="author" content="{{ settings()->get("page_author") }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/uploads/{{ settings()->get("page_favicon") }}">

    <!-- FONTS (non-blocking) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@500;800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- CSS (non-blocking) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}?v=20072026F" media="print" onload="this.media='all'">

    <!-- fallback dla no-js -->
    <noscript>
        <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}?v=20072026F">
    </noscript>

    <!-- Preloads -->
    <link rel="preload" href="{{ asset('img/logo.png') }}" as="image">

    @stack('style')
</head>
<body class="{{ !empty($body_class) ? $body_class : 'homepage' }}">
{!! settings()->get("scripts_afterbody") !!}
<h1 class="visually-hidden">
    CERES Development - inwestycje deweloperskie pod Warszawą
</h1>
    @include('layouts.partials.header')

@yield('content')

    @include('layouts.partials.footer')

    @stack('scripts')

<script>
    $(document).ready(function() {
        const heroSlider = $('#hero ul');
        heroSlider.on('init', function(event, slick) {
            const firstDotsContainer = $(slick.$slides[0]).find('.hero-dots');
            if (slick.$dots) {
                slick.$dots.appendTo(firstDotsContainer);
            }
            $(slick.$slides[0]).addClass('slick-active-animation');
        });

        heroSlider.slick({
            dots: true,
            infinite: true,
            speed: 600,
            slidesToShow: 1,
            adaptiveHeight: true,
            centerMode: true,
            centerPadding: '100px',
            autoplay: true,
            autoplaySpeed: 9000,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><img src="{{ asset('img/svg/slider-arrow-left.svg') }}" alt="Previous"></button>',
            nextArrow: '<button type="button" class="slick-next"><img src="{{ asset('img/svg/slider-arrow-right.svg') }}" alt="Next"></button>',
            responsive: [
                {
                    breakpoint: 991.98,
                    settings: {
                        centerPadding: '40px',
                    }
                },
                {
                    breakpoint: 575.98,
                    settings: {
                        centerPadding: '0px',
                    }
                }
            ]
        });

        heroSlider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            const nextDotsContainer = $(slick.$slides[nextSlide]).find('.hero-dots');
            if (slick.$dots) {
                slick.$dots.appendTo(nextDotsContainer);
            }

            $(slick.$slides[currentSlide]).removeClass('slick-active-animation');
        });

        heroSlider.on('afterChange', function(event, slick, currentSlide) {
            $(slick.$slides[currentSlide]).addClass('slick-active-animation');
        });
    });
</script>

@if(1 == 2)
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""/>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
<script>
    var map = L.map('map').setView([52.368849072328715, 20.942762800008232], 17);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([52.368849072328715, 20.942762800008232]).addTo(map)
        .bindPopup('A pretty CSS popup.<br> Easily customizable.')
        .openPopup();
</script>
@endif
    {!! settings()->get("scripts_beforebody") !!}
</body>
</html>
