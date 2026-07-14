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
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" media="print" onload="this.media='all'">

    <!-- fallback dla no-js -->
    <noscript>
        <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
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

<main>
    @yield('content')
</main>

    @include('layouts.partials.footer')

    @stack('scripts')

    {!! settings()->get("scripts_beforebody") !!}
</body>
</html>
