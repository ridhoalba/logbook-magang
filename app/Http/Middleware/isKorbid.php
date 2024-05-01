<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\dosen;
use Symfony\Component\HttpFoundation\Response;

class isKorbid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->guard('dosen')->check() || !auth()->guard('dosen')->user()->is_korbid) {
            abort(403);
        }
        return $next($request);
    }
}
