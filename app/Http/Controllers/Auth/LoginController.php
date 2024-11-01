<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info('Credentials: ', $credentials); // Debugging
    
        if (!Auth::attempt($credentials)) {
            Log::error('Unauthorized attempt'); // Debugging
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        $user = $request->user();
        $token = $user->createToken('Personal Access Token')->plainTextToken;

    
        return response()->json(['token' => $token]);
    }

    public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Logged out successfully']);
}



}
