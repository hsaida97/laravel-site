<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminId
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        $checkAdmin = auth()->user()->id;
//        if ($checkAdmin > 2) {
//            return $next($request);
//        }
//        return back();
        return $next($request);
    }
}
