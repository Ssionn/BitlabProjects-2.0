<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRules;
use App\Jobs\updateUserProfile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function showRegisteration(): View
    {
        return view('auth.register');
    }

    public function register(RegistrationRules $rules): RedirectResponse
    {
        $newUser = User::create([
            'name' => $rules->name,
            'username' => $rules->username,
            'email' => $rules->email,
            'password' => $rules->password,
        ]);

        Auth::login($newUser);

        updateUserProfile::dispatch($newUser->username, $newUser->id);

        return redirect()->route('dashboard');
    }
}
