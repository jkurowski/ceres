<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetDefaultLocaleForUrls
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->route('locale');
        if ($locale && array_key_exists($locale, config('app.available_locales'))) {
            URL::defaults(['locale' => $locale]);
        } else {
            URL::defaults(['locale' => null]);
        }
        return $next($request);
    }
}
