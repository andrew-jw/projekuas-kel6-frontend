<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;   
use App\Models\FailedAttempts;
use App\Models\Balance;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function process_login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $account = Account::where('email', $email)->first();

        if (!$account) {
            $failedAttempts = FailedAttempt::where('email', $email)->first();

            if ($failedAttempts->attempts === 3) {
                return redirect()->route('home')->with('error', 'Akun tidak ditemukan');
            }

            if (Hash::check($password, $account->password)) {

                $request->session()->regenerate();

                $failedAttempts->attempts = 0;
                $failedAttempts->save();

                $loginHistory = new LoginHistory();
                $loginHistory->email = $email;
                $loginHistory->datetime = now()->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s');
                $loginHistory->save();

                Auth::login($account);
                return redirect()->intended(route('halo', ['id' => $account->id]));
            } else {
                $failedAttempts->attempts++;
                $currentAttempts = $failedAttempts->attempts;
                $failedAttempts->save();

                if ($currentAttempts === 3) {
                    return redirect()->route('home' )->with('error', 'Akun anda diblokir silahkan reset password');
                } else {
                    $attempts = 3 - $currentAttempts;
                    return redirect()->route('home')->with('error', 'Password salah, percobaan tersisa ' . $attempts);
                }
            }
        } else {
            return redirect()->route('home')->with('error', 'Akun tidak ditemukan');
        }
    }

}
