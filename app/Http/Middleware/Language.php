<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Safely retrieve the 'locale' parameter from the route, with a default of null
        $locale = $request->route('locale');

        // Check if the locale exists in the available locales
        if ($locale && array_key_exists($locale, config('app.available_locales'))) {
            // Set the locale in session and for the application
            session()->put('locale', $locale);
            app()->setLocale($locale);
            URL::defaults(['locale' => $locale]);
        } else {
            // If no locale in URL, check session or use default
            $fallbackLocale = session()->get('locale', config('app.fallback_locale'));
            app()->setLocale($fallbackLocale);
            // We don't set URL::defaults here because we want URLs to be generated without locale prefix if it's missing in current request
            // Unless you want all generated links to ALWAYS have the current locale prefix.
            // But the user wants links to work WITHOUT /pl/.
        }

        return $next($request);
    }
}
