<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
