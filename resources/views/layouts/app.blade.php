<!DOCTYPE html>
<html lang="tr" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'CMS')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('build/assets/app-iqc7nsRK.css') }}">
    <script src="{{ asset('build/assets/app-Ben0BWZ-.js') }}"></script>
</head>

<body>
    <div id="app">
        <header01 :title="'E-Ticaret'"></header01>

        <main>
            @yield('content')
        </main>
    </div>

</body>

</html>