<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('authentication.login');
    }

    /**
     * Handle authentication process.
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (auth('administrator')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('administrators.dashboard');
        }

        if (auth('officer')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('officers.dashboard');
        }

        if (auth('student')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('students.dashboard');
        }

        return redirect()->route('login')->with('authentication', 'Email atau password salah!')->withInput();
    }
}
