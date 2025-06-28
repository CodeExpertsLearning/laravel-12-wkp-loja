<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginControllerAction extends Controller
{
    public function __invoke()
    {
        $credentials = request()->only(['email', 'password']);

        if (!auth()->attempt($credentials, request()->remember)) {

            throw ValidationException::withMessages([
                'email' => 'Credenciais inválidas!'
            ]);
        }

        request()->session()->regenerate();

        return redirect()->intended(route('manager.products.index', absolute: false));
    }
}
