<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RedirectIfAuthenticated;


class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Arahkan ke halaman utama, bukan dashboard
                return redirect('/'); 
            }
        }

        return $next($request);
    }
    protected $routeMiddleware = [
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // middleware lainnya...
    ];
    protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        return route('login');
    }
}

}
