<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MagicLinkController extends Controller
{
    /**
     * Handle Magic Link login
     */
    public function login(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return response()->json(['error' => 'Token missing'], 400);
        }

        $userId = Cache::get("magic_link_{$token}");

        if (!$userId) {
            return response()->json(['error' => 'Invalid or expired magic link'], 401);
        }

        $user = User::findOrFail($userId);

        // Consume token to prevent replay attacks
        Cache::forget("magic_link_{$token}");

        // Log the user in to the web guard (sets trustlab_session cookie)
        // Since SESSION_DOMAIN is .dyzulk.com, this cookie is shared with the frontend
        Auth::guard('web')->login($user);

        // Also create a Sanctum token for the frontend to use in headers
        $authToken = $user->createToken('magic_auth_token')->plainTextToken;

        // Redirect to Frontend Callback
        // The frontend will handle the token and redirect to /dashboard
        $frontendUrl = config('app.frontend_url') ?: 'https://trustlab.dyzulk.com';
        $callbackUrl = "{$frontendUrl}/auth/callback?token={$authToken}";

        return redirect($callbackUrl);
    }
}
