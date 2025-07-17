<!DOCTYPE html>
<html lang="tr" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="E-Ticaret Uygulaması">
    <title>@yield('title', 'CMS')</title>
    <link href="https://fonts.cdnfonts.com/css/campton" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header01 title="E-Ticaret" header-align="center" header-bg-color="#e4261b" header-foreground-color="#fff">
        </header01>

        <main class="min-h-[calc(100vh-12rem)]">
            @yield('content')
        </main>

        <footer01 />

    </div>
</body>

</html>
