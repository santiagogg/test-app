<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (! $request->user()->can($permission)) {
            return redirect()->back()->with('message', title_case($permission).": Not Allow");
        }
        return $next($request);
    }
}
