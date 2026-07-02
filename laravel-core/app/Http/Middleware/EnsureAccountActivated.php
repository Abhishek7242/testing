<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureAccountActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->status === 'unactivated') {
            if ($request->routeIs('admin.activate*') || $request->routeIs('admin.verify.otp') || $request->routeIs('admin.logout')) {
                return $next($request);
            }
            return redirect()->route('admin.activate');
        }

        return $next($request);
    }
}
