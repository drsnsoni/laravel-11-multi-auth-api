<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        if (auth()->guard('user')->check()) {

            $request->user()->currentAccessToken()->delete();

            return response()->json(['message' => 'Logged out successfully']);
        } else {
            return response()->json(['message' => 'Invalid token'], 401);
        }
    }
}
