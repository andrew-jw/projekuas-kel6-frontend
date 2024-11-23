<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;   
use App\Models\FailedAttempts;
use App\Models\Balance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Login extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function process_login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $account = Account::where('email', $email)->first();

            if (!$account) {
                $failedAttempts = FailedAttempts::firstOrCreate(['email' => $email]);

                if ($failedAttempts->attempts >= 3) {
                    return redirect()->route('home')->with('error', 'Akun anda diblokir silahkan reset password');
                }

                $failedAttempts->attempts++;
                $failedAttempts->save();

                $attemptsLeft = 3 - $failedAttempts->attempts;
                return redirect()->route('home')->with('error', 'Akun tidak ditemukan. Percobaan tersisa: ' . $attemptsLeft);
            }

            if (Hash::check($password, $account->password)) {
                $request->session()->regenerate();

                $failedAttempts = FailedAttempts::where('email', $email)->first();
                if ($failedAttempts) {
                    $failedAttempts->attempts = 0;
                    $failedAttempts->save();
                }

                // $loginHistory = new LoginHistory();
                // $loginHistory->email = $email;
                // $loginHistory->datetime = now()->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s');
                // $loginHistory->save();

                Auth::login($account);
                return redirect()->intended(route('halo', ['id' => $account->id]));
            } else {
                $failedAttempts = FailedAttempts::firstOrCreate(['email' => $email]);
                $failedAttempts->attempts++;
                $failedAttempts->save();

                $attemptsLeft = 3 - $failedAttempts->attempts;
                return redirect()->route('home')->with('error', 'Password salah, percobaan tersisa ' . $attemptsLeft);
            }
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'An error occurred. Please try again.');
        }
    }

}
