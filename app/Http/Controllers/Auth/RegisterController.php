<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function showRegisteration(): View
    {
        return view('auth.register');
    }

    public function register(RegistrationRules $rules)
    {
        $newUser = new User();

        $newUser->name = $rules->name;
        $newUser->username = $rules->username;
        $newUser->email = $rules->email;
        $newUser->password = $rules->password;

        $newUser->save();

        Auth::login($newUser);

        return redirect()->route('dashboard');
    }
}
