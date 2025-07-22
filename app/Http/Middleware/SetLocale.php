<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = ['en', 'tr']; // Uygulamanızın desteklediği diller

        // URL'den dil segmentini al
        $urlLocale = $request->segment(1);

        // Eğer URL'de bir dil segmenti varsa ve desteklenen diller arasında ise
        if ($urlLocale && in_array($urlLocale, $supportedLocales)) {
            App::setLocale($urlLocale);
            return $next($request);
        }

        // Eğer URL'de dil segmenti yoksa (yani domain.com'a gelindiyse)
        if (!$urlLocale) {
            // Tarayıcının tercih ettiği dilleri al
            $browserLocales = Request::getLanguages(); // Ya da $request->server('HTTP_ACCEPT_LANGUAGE')

            // Tarayıcının tercih ettiği dillerden desteklenen ilkini bul
            foreach ($browserLocales as $browserLocale) {
                // 'tr-TR' gibi değerlerden 'tr' kısmını al
                $langCode = substr($browserLocale, 0, 2);
                if (in_array($langCode, $supportedLocales)) {
                    // Bulunan dile yönlendir
                    return redirect('/' . $langCode . $request->getRequestUri());
                }
            }

            // Hiçbir desteklenen dil bulunamazsa varsayılan dile yönlendir
            return redirect('/' . config('app.fallback_locale') . $request->getRequestUri());
        }

        // URL'de dil segmenti var ama desteklenmiyor (örneğin domain.com/fr gibi)
        // Bu durumda varsayılan dile yönlendirebilirsiniz.
        // Veya 404 hatası vermesini sağlayabilirsiniz, tercih size kalmış.
        App::setLocale(config('app.fallback_locale'));
        return $next($request);
    }
}
