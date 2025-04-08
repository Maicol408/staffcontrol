<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol === 'admin') {
            return $next($request);
        }

        return redirect('/'); // puedes cambiarlo por abort(403) si prefieres mostrar error
    }
}
    