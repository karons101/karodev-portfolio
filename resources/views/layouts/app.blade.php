<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>

    @include('components.scroll-progress')

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    @include('partials.scripts')

    @include('components.back-to-top')

    @include('components.whatsapp')

</body>

</html>