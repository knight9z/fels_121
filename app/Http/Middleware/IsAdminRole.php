<?php

namespace App\Http\Middleware;

use Closure;

class IsAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!isset($request->user()->role) || !$request->user()->isAdmin()) {
            return redirect()->action('SessionsController@create');
        }

        return $next($request);
    }
}
