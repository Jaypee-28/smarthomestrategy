<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Smart Home Strategy | The Future of Intelligent Living' }}</title>
        <meta name="description" content="AI-powered smart home strategies that transform everyday living into a seamless, connected experience.">
        <link rel="icon" type="image/svg+xml" href="/favicon.svg">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700|outfit:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        
        <!-- Alpine.js is now bundled via Vite in app.js -->
    </head>
    <body class="bg-[#020617] text-white antialiased selection:bg-cyan-500 selection:text-white overflow-x-hidden">
        
        <x-navbar />

        <main>
            {{ $slot }}
        </main>

        <x-footer />
        
    </body>
</html>
