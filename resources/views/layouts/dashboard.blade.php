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

@php
    $items = [
        ['title' => 'Gösterge Paneli', 'route' => 'system'],
        ['title' => 'İçerik Yönetimi', 'route' => 'system/content'],
        ['title' => 'Kategoriler', 'route' => 'system/categories'],
        ['title' => 'Ayarlar', 'route' => 'system/settings'],
    ];
@endphp


<body>
    @if(request()->route()->getName() != 'login')
        <div class="layout">
            <main class="layout-main">
                @yield('content')
            </main>
            <aside class="layout-sidebar border-end max-lg:hidden" style="width:280px">
                <div
                    class="flex flex-col gap-2 h-16 items-start px-4 justify-center text-2xl font-bold border-b border-slate-200 mb-2">
                    Panel
                </div>
                <div
                    class="flex flex-col items-center text-sm *:opacity-70 gap-2 *:hover:opacity-100 *:transition *:flex *:gap-2 *:px-3 *:py-3 *:rounded-lg *:w-full px-4">

                    @foreach ($items as $item)
                        <a href="/{{ $item['route'] }}"
                            class="text-lg {{ request()->is($item['route']) ? 'bg-slate-200 opacity-100' : 'hover:bg-slate-200' }}">
                            {{ $item['title'] }}
                        </a>
                    @endforeach

                </div>
            </aside>
            <footer class="layout-footer">
                <ul class="dropdown-menu dropdown-menu-end" role="menu">
                    <li><a class="dropdown-item" href="/system/settings">Ayarlar</a></li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Çıkış Yap</button>
                    </form>
                </ul>
            </footer>
        </div>
    @else
        <main class="p-3 container">
            @yield('content')
        </main>
    @endif


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>