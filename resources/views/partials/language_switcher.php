<div class="language-switcher">
    @php
    // Uygulamanızın desteklediği diller
    $supportedLocales = ['tr', 'en'];
    // Mevcut URL yolu (dil segmenti hariç)
    $currentPath = request()->segment(count(request()->segments())); // Son segmenti alır
    if (in_array(request()->segment(1), $supportedLocales)) {
    // Eğer ilk segment bir dil ise, onu URL yolundan çıkar
    $segments = request()->segments();
    array_shift($segments); // İlk segmenti (dil) kaldır
    $currentPath = implode('/', $segments);
    } else {
    // Eğer ilk segment dil değilse, tüm yolu kullan
    $currentPath = request()->path();
    }

    // Eğer mevcut yol boşsa (yani kök dizindeyse), '/' olarak ayarla
    if (empty($currentPath)) {
    $currentPath = '/';
    }
    @endphp

    @foreach ($supportedLocales as $locale)
    @if ($locale !== App::getLocale())
    {{-- Mevcut dil dışındaki dilleri göster --}}
    <a href="{{ url($locale . '/' . $currentPath) }}" class="language-link">
        {{ strtoupper($locale) }} {{-- TR, EN gibi gösterim --}}
    </a>
    @else
    {{-- Mevcut dili pasif veya vurgulanmış göster --}}
    <span class="language-current">{{ strtoupper($locale) }}</span>
    @endif
    @endforeach
</div>

<style>
    .language-switcher {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .language-link {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .language-current {
        color: #6c757d;
        font-weight: bold;
        cursor: default;
    }
</style>