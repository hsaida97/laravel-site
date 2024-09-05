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
        $user = auth()->user();

        if ($user === null) {
            return redirect()->route('login');
        }

        $checkAdmin = $user->is_admin;

        if ($checkAdmin == 1) {
            return $next($request);
        } else {
            return redirect()->route('front.index');
        }
    }
}
