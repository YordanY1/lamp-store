<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles

    <script src="https://js.stripe.com/v3/"></script>
</head>

<body class="flex flex-col min-h-screen antialiased bg-bgColor">
    <livewire:header />

    <main class="flex flex-1 flex-col bg-gray-100 mt-24">
        {{ $slot }}
    </main>

    <!-- Livewire Scripts -->
    @livewireScripts

    <livewire:footer />
</body>

</html>
