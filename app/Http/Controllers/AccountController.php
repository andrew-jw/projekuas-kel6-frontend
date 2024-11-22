<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use App\Models\FailedAttempt;

class AccountController extends Controller
{
    // mengecek apakah email sudah terdaftar
    public function Checkemail(Request $request)
    {
        $email = $request->query('email');
        $exists = Account::where('email', $email)->exists();

        return response()->json(['available' => !$exists]);
    }

    // membuat akun baru
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        } else {
            
            $accounts = new Account();
            $accounts->first_name = $request->input('first_name');
            $accounts->last_name = $request->input('last_name');
            $accounts->email = $request->input('email');
            // $accounts->password = Hash::make($request->input('password'));
            $accounts->password = $request->input('password');
            $accounts->save();

            // $failedAttempts = new FailedAttempt();
            // $failedAttempts->email = $request->input('email');
            // $failedAttempts->attempts = 0;
            // $failedAttempts->save();

             // Redirect to /register
            return redirect('/register')->with('success', 'Account created successfully!');
        }
    }


}