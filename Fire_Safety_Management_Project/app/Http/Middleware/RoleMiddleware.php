<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, $roles)
    {
        if (!$request->user()) {
            abort(404);
        }

        $userRoles = is_array($roles) ? $roles : [$roles];
        
        if (!in_array($request->user()->role, $userRoles)) {
            abort(404);
        }

        return $next($request);
    }

}
?>