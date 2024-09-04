<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next)
    {
        $checkAdmin = auth()->user()->is_admin;
        if ($checkAdmin == 1) {
            return redirect()-> route('admin.pages.dashboard');
        } elseif($checkAdmin==2){
            return redirect()-> route('authors.dashboard');
        }
        return $next($request);
    }
}
