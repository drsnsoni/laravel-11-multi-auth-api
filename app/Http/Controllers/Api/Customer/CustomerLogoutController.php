<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerLogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (auth()->guard('customer')->check()) {
            $request->user('customer')->currentAccessToken()->delete();

            return response()->json(['message' => 'Logged out successfully']);
        } else {
            return response()->json(['message' => 'Invalid token'], 401);
        }
    }
}
