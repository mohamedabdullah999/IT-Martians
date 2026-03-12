<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminEmail = 'info@durat-altawq.com';
        if (auth()->check() && auth()->user()->email === $adminEmail) {
            return $next($request);
        }
        return redirect()->route('home')->with('error', 'ليس لديك صلاحية الوصول إلى هذه الصفحة.');
    }
}
