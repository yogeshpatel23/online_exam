<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$role)
    {
        if ($request->user() === null) {
            return response("Access Denied",401);
        }

        if ($request->user()->hasAnyRole($role)) {
            return $next($request);
        }
        
        abort(401,"Access Denied");
    }
}
