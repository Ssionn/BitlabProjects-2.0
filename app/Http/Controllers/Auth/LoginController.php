<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRules;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function authenticate(AuthenticationRules $rules): RedirectResponse
    {
        $credentials = [
            'email' => $rules->email,
            'password' => $rules->password,
        ];

        if (Auth::attempt($credentials)) {
            $rules->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->with('login_error', "The provided credentials do not match our records.");
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('welcome');
    }
}
