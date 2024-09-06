<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function authenticate(AuthenticationRules $rules)
    {
        $credentials = [
            'email' => $rules->email,
            'password' => $rules->password,
        ];

        if (Auth::attempt($credentials)) {
            $rules->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('welcome');
    }
}
