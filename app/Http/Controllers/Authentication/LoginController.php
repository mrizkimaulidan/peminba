<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('authentication.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        $validator = $this->validation($credentials);
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator, 'authentication')->withInput();
        }

        if (auth('administrator')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('administrator/dashboard');
        }

        if (auth('officer')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('officer/dashboard');
        }

        if (auth('student')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('student/dashboard');
        }

        return redirect()->route('login')->with('error', 'Email atau password salah!');
    }

    public function validation(array $data)
    {
        return Validator::make(
            $data,
            [
                'email' => 'required|string|email|min:3|max:255',
                'password' => 'required|string|min:3|max:255'
            ],
            [
                'email.required' => 'Kolom email wajib diisi!',
                'email.string' => 'Kolom email harus karakter!',
                'email.email' => 'Kolom email harus email yang valid!',
                'email.min' => 'Kolom email minimal :min karakter!',
                'email.max' => 'Kolom email maksimal :max diisi!',

                'password.required' => 'Kolom password wajib diisi!',
                'password.string' => 'Kolom password harus karakter!',
                'password.min' => 'Kolom password minimal :min karakter!',
                'password.max' => 'Kolom password maksimal :max diisi!',
            ]
        );
    }
}
