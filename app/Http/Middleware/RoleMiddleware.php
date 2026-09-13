<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Check user role access.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if user is logged in
        if (!auth()->check()) {
            abort(401);
        }

        // Check user role
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}