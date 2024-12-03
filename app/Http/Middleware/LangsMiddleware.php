<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LangsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = ltrim($request->route()->getPrefix(), '/');

        if ($locale) {
            app()->setLocale($locale);
        }

        if ($locale == env('APP_LOCALE')) {
            $uri = str_replace($locale, '', $request->path());
            return redirect($uri, 301);
        }

        return $next($request);
    }
}
