<!DOCTYPE html>
<html lang="tr" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="E-Ticaret Uygulaması">
    <title>@yield('title', 'CMS')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <n-config-provider :theme-overrides="themeOverrides">
            <n-loading-bar-provider>
                <header01 :title="'E-Ticaret'"></header01>

                <main class="min-h-[calc(100vh-12rem)]">
                    @yield('content')
                </main>

                <footer01>
                    <!-- Example accessible link -->
                    <a href="/" aria-label="Anasayfa" title="Anasayfa">Anasayfa</a>
                    <!-- Example accessible button -->
                    <button aria-label="Sepete Ekle" title="Sepete Ekle">Sepete Ekle</button>
                </footer01>

            </n-loading-bar-provider>
        </n-config-provider>
    </div>

    <script type="module">
        export const themeOverrides = {
            common: {
                primaryColor: "#000000",
                primaryColorHover: "#000000",
                primaryColorPressed: "#000000",
                primaryColorSuppl: "#000000",
                successColor: "#28a745",
                errorColor: "#dc3545",
                warningColor: "#ffc107",
                infoColor: "#17a2b8",
                textColor1: "#222222",
                textColor2: "#444444",
                borderColor: "#e5e5e5",
            },
        };
    </script>
</body>

</html>
