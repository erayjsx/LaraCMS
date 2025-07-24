@php
    $login = auth()->user() ? true : false;

    $backgroundColor = '#e4261b';
    $foregroundColor = '#fff';
    $headerTitle = 'E-Ticaret';
    $headerAlign = 'center';
@endphp

<!DOCTYPE html>
<html lang="tr" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="E-Ticaret Uygulaması">
    <title>@yield('title', 'CMS')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">

    @yield('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="top-0 sticky z-10">
            <marquee></marquee>
            <header01 title="{{ $headerTitle }}" header-align="{{ $headerAlign }}" login="{{ $login ? 'true' : 'false' }}"
                header-bg-color="{{ $backgroundColor }}" header-foreground-color="{{ $foregroundColor }}">
            </header01>
        </div>

        <main class="min-h-[calc(100vh-12rem)]">
            @yield('content')
        </main>

        <footer01 />
    </div>

    @stack('scripts')
</body>

</html>
