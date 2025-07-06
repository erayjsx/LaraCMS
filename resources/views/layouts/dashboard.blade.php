<!DOCTYPE html>
<html lang="tr" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CMS</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">

    <link href="https://fonts.cdnfonts.com/css/br-omny" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/bold/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
        integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <style>
        body {
            font-family: 'Br Omny', sans-serif;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    @if(request()->route()->getName() != 'login')
        <header class="flex px-5 h-20 bg-slate-900 text-white shadow-lg">
            <div class="flex justify-between items-center gap-8 container mx-auto w-full h-20">
                <div class="flex items-center gap-10 max-lg:hidden h-20">
                    <a href="/system">
                        <img src="https://www.freeiconspng.com/uploads/hd-trendyol-text-logo-high-quality-png-27.png"
                            alt="logo" class="h-6 brightness-0 invert">
                    </a>
                    <div
                        class="flex items-center gap-4 text-sm *:opacity-70 *:hover:opacity-100 *:transition *:flex *:items-center *:gap-2">
                        <a href="/system">
                            Gösterge Paneli
                        </a>
                        <a href="/system/content">
                            İçerik Yönetimi
                        </a>
                        <div class="dropdown dropdown-hover">
                            <a href="/system/content" class="flex items-center gap-2">
                                Kategoriler
                                <i class="ph-bold ph-caret-down text-base"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" role="menu">
                                <li><a class="dropdown-item" href="/system/settings">Ayarlar</a></li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Çıkış Yap</button>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="dropdown dropdown-hover">
                    <div role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        class="flex items-center gap-2 h-14 bg-slate-800 py-2 px-4 rounded-full overflow-hidden">
                        <span class="avatar text-bg-primary">U</span>
                        <div class="flex flex-col text-sm justify-center text-left leading-none gap-0 space-y-0">
                            <p class="text-sm pb-0 mb-0">{{ auth()->user()->name }}</p>
                            <p class="text-xs opacity-70 pb-0 mb-0">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end" role="menu">
                        <li><a class="dropdown-item" href="/system/settings">Ayarlar</a></li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Çıkış Yap</button>
                        </form>
                    </ul>
                </div>
            </div>

        </header>
    @endif

    <main class="p-3 container">
        @yield('content')
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>