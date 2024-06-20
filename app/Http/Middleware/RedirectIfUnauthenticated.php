<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfUnauthenticated
{
    // public function handle(Request $request, Closure $next)
    // {
    //     if (\Auth::user()->id === null) {
    //         return redirect('/');
    //     }

    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
