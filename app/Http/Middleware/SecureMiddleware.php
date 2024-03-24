<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecureMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!\Illuminate\Support\Facades\Request::secure()) {
            dd('not safe');
        } else {
            return $next($request);
        }

    }
}
