<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyApp')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Tailwind CSS and JS -->
</head>
<body class="font-sans bg-white text-black">
    @include('frontend.layouts.partials.navbar') <!-- Include Navbar -->

    <main class="container mx-auto p-6">
        @yield('content') <!-- Page-specific content -->
    </main>

    @include('frontend.layouts.partials.footer')
</body>
</html>