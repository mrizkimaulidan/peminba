<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('authentication.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->only(['email' => $request->email, 'password' => $request->password]);

        if (!auth('administrator')->attempt($credentials)) {
            return redirect()->route('login')->with('error', 'Email atau password salah!');
        }

        return redirect('/administrator/dashboard');
    }
}
