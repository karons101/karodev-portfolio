<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>@yield('title') | KaroDev</title>

    {{-- ==========================================
         FONT AWESOME
    ========================================== --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- ==========================================
         KARODEV FAVICONS
    ========================================== --}}
    <link rel="icon"
          type="image/x-icon"
          href="{{ asset('images/icons/favicon.ico') }}">

    <link rel="icon"
          type="image/png"
          sizes="16x16"
          href="{{ asset('images/icons/favicon-16x16.png') }}">

    <link rel="icon"
          type="image/png"
          sizes="32x32"
          href="{{ asset('images/icons/favicon-32x32.png') }}">

    <link rel="apple-touch-icon"
          sizes="180x180"
          href="{{ asset('images/icons/apple-touch-icon.png') }}">

    <link rel="manifest"
          href="{{ asset('images/icons/site.webmanifest') }}">

    <meta name="theme-color"
          content="#0f172a">

    <meta name="msapplication-TileColor"
          content="#0f172a">

    {{-- ==========================================
         CSS & JAVASCRIPT
    ========================================== --}}
    @vite(['resources/css/portfolio.css', 'resources/js/app.js'])

</head>

<body>

    @include('components.navbar')

    <main>

        @yield('content')

    </main>

    @include('components.footer')

</body>

</html>