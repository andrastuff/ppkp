<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isTpk
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (isset($_COOKIE['access_tokenku'])) {
            return $next($request, $_COOKIE['access_tokenku']);
        } else {
            return abort(404);
        }
    }
}
