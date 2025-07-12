<!DOCTYPE html>
<html lang="tr" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'CMS')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header01 :title="'E-Ticaret'"></header01>

        <main class="min-h-[calc(100vh-12rem)]">
            @yield('content')
        </main>

        <footer01>
        </footer01>
    </div>

</body>

</html>