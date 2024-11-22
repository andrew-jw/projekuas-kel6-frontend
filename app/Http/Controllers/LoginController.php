<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed
            return response()->json(['message' => 'Login successful!'], 200);
        }

        // Authentication failed
        return response()->json([
            'message' => 'Invalid credentials for email: ' . $request->input('email') . '. Please try again.'
        ], 401);
    }
} 