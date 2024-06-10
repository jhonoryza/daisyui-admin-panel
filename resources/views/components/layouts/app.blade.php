<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {!! Meta::toHtml() !!}

    <link rel="icon" href="{{ asset('favicon.png') }}">

    <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-base-200">
    @auth
    <div class="drawer lg:drawer-open">
        <input id="drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <livewire:admin.components.navbar />

            {{ $slot }}
        </div>
        <div class="drawer-side">
            <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <livewire:admin.components.sidebar />
        </div>
    </div>
    @endauth

    @guest
    <div class="flex flex-col gap-8 h-screen justify-center items-center">
        <h1 class="text-4xl">{{ config('app.name') }}</h1>

        {{ $slot }}
    </div>
    @endguest

</body>

</html>