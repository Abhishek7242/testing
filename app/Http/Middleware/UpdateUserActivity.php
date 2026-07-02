<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserActivity
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // Only update if updated_at is more than 30 seconds ago to reduce DB writes
            if (!$user->updated_at || $user->updated_at->diffInSeconds(now()) >= 30) {
                User::where('id', $user->id)->update(['updated_at' => now()]);
            }
        }

        return $next($request);
    }
}
