<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen antialiased">

    <main class="flex flex-col flex-1 gap-4 p-3 pt-6 sm:p-8">
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>
