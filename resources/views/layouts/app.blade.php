<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Primary Meta Tags -->
    <title>{{ config('app.name', 'Laravel') }} | {{ $title ?? 'The best Laravel tips' }}</title>
    <meta name="title" content="{{ config('app.name', 'Laravel') }} | {{ $title ?? 'The best Laravel tips' }}" />
    <meta name="description" content="Share your best tips about Laravel!" />

    <!-- Open Graph / Facebook -->
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }} | {{ $title ?? 'The best Laravel tips' }}" />
    <meta property="og:description" content="Share your best tips about Laravel!" />
    <meta property="og:image" content="{{ asset('images/banner.jpg') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ config('app.url') }}" />
    <meta property="twitter:title" content="{{ config('app.name', 'Laravel') }} | {{ $title ?? 'The best Laravel tips' }}" />
    <meta property="twitter:description" content="Share your best tips about Laravel!" />
    <meta property="twitter:image" content="{{ asset('images/banner.jpg') }}" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col bg-gray-50">
        @include('layouts.navigation')

        <main>
            {{ $slot }}
        </main>

        @unless(request()->routeIs('homepage'))
        @include('layouts.footer')
        @endunless
    </div>

    @stack('scripts')
</body>
</html>
