<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function process_login(Request $request)
    {
        // Log the incoming request data for debugging
        \Log::info('Login attempt:', $request->all());

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Manually authenticate the user without hashing
        $user = DB::table('accounts')
            ->where('email', $request->input('email'))
            ->where('password', $request->input('password')) // Note: Storing plain text passwords is not secure
            ->first();
            
        if ($user) {
            // Authentication passed
            return response()->json(['message' => 'Login successful!'], 200);
        }

        // Authentication failed
        return response()->json([
            'message' => 'Invalid credentials. Please try again.'
        ], 401);
    }
} 