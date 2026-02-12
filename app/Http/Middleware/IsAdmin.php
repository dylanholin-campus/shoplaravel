<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Accès refusé.');
        }

        if (!$user->is_admin) {
            return redirect()->route('home')->with('error', 'Accès refusé.');
        }

        return $next($request);
    }
}
