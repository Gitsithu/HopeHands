<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyApp')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Tailwind CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <style>
        /* .modal-enter {
            opacity: 1;
            transform: translate(-50%, -50%) scale(0.95);
        } */

        /*
        .modal-enter-active {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            transition: all 150ms ease-out;
        } */
        html, body {
            height: 100vh;
            margin: 0;
        }
        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content-wrap {
            flex: 1;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen font-sans bg-white text-black" style="">
    @include('frontend.layouts.partials.navbar') <!-- Include Navbar -->

    <main class="container mx-auto p-6">
        @yield('content') <!-- Page-specific content -->
    </main>

    @include('frontend.layouts.partials.footer')
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<script src="{{ asset('frontend/assets/js/app.js') }}"></script>
@yield('script')

</html>
