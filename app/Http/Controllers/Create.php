<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Create extends Controller
{
    public function index()
    {
        return view('create');
    }

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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create')->with('error', 'Gagal membuat akun');
        } else {
            $accounts = new Account();
            $accounts->firstname = $request->input('firstname');
            $accounts->lastname = $request->input('lastname');
            $accounts->email = $request->input('email');
            $accounts->password = Hash::make($request->input('password'));
            $accounts->save();


            $failedAttempts = new FailedAttempt();
            $failedAttempts->email = $request->input('email');
            $failedAttempts->attempts = 0;
            $failedAttempts->save();

            return redirect()->route('main')->with('success', 'Akun berhasil dibuat');
        }
    }
}
