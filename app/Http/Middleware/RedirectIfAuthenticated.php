<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        if (auth('administrator')->check()) {
            return redirect()->route('administrators.dashboard');
        }

        if (auth('officer')->check()) {
            return redirect()->route('officers.dashboard');
        }

        if (auth('student')->check()) {
            return redirect()->route('students.dashboard');
        }

        return $next($request);
    }
}
