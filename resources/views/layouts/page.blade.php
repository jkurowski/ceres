<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! settings()->get("scripts_head") !!}

    <title>@hasSection('seo_title')@yield('seo_title')@else{{ settings()->get("page_title") }} - @yield('meta_title')@endif</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@hasSection('seo_description')@yield('seo_description')@else{{ settings()->get("page_description") }}@endif">
    <meta name="robots" content="@hasSection('seo_robots')@yield('seo_robots')@else{{ settings()->get("page_robots") }}@endif">
    <meta name="author" content="{{ settings()->get("page_author") }}">

    @hasSection('opengraph')@yield('opengraph')@endif
    @hasSection('schema')@yield('schema')@endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/uploads/{{ settings()->get("page_favicon") }}">

    <!-- FONTS (non-blocking) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@500;800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}?v=20072026C" media="print" onload="this.media='all'">

    <!-- Preloads -->
    <link rel="preload" href="{{ asset('img/logo.png') }}" as="image" />
    <!-- /Preloads -->

    @stack('style')
</head>
<body class="{{ !empty($body_class) ? $body_class : '' }}">
{!! settings()->get("scripts_afterbody") !!}
@include('layouts.partials.header')

@yield('pageheader')

@yield('content')

@include('layouts.partials.footer')

@stack('scripts')

{!! settings()->get("scripts_beforebody") !!}
</body>
</html>
