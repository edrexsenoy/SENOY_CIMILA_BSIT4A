<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user()) {
            abort(403, 'Unauthorized action.');
        }

        if ($role === 'user' && $request->user() && $request->user()->roles !== 'user') {
            return redirect()->route('user');
        }

        if ($role === 'admin' && $request->user() && $request->user()->roles !== 'admin') {
            return redirect()->route('admin');
        }

        return $next($request);
    }
}
