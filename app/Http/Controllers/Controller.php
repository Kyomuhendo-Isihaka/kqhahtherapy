<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function initializeUserId(Request $request)
    {
        // Check if `user_id` exists in the cookie
        $userId = $request->cookie('user_id');

        // Generate a new `user_id` if not present
        if (!$userId) {
            $userId = rand(100000, 999999); // Generate a numeric user ID
            Cookie::queue('user_id', $userId, 60 * 24 * 365); // Store for 1 year
        }

        return $userId;
    }
}
