<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class InitializeUserId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next)
    {
        // Initialize `user_id`
        $userId = $request->cookie('user_id');

        if (!$userId) {
            $userId = rand(100000, 999999); // Generate a numeric user ID
            Cookie::queue('user_id', $userId, 60 * 24 * 14); 
        }

        // Add `user_id` to the request
        $request->merge(['user_id' => $userId]);

        return $next($request);
    }
}
