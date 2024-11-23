<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        // Find the user by email
        $user = DB::table('accounts')->where('email', $request->input('email'))->first();
    
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // If password is valid then login successful
            return response()->json(['message' => 'Login successful!'], 200);
        }
    
        // Authentication failed
        return response()->json([
            'message' => 'Invalid credentials. Please try again.'
        ], 401);
    }
} 