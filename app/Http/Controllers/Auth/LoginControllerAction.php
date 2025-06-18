<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllerAction extends Controller
{
    public function __invoke()
    {
        $credentials = request()->only(['email', 'password']);

        if (!auth()->attempt($credentials, request()->remember)) {
            abort(401);
        }

        return redirect()->route('manager.products.index');
    }
}
