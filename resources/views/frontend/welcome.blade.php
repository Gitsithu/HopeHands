<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World with Tailwind CSS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- This includes your Tailwind CSS -->
</head>
<body class="bg-gray-200 text-center flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-blue-500">Hello, World!</h1>
        <p class="mt-4 text-gray-700">This is a test of Tailwind CSS in Laravel.</p>
    </div>
</body>
</html>