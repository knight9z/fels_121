<?php

namespace App\Http\Middleware;

use Closure;

class RoleOfUser
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        if (!isset($request->user()->role) || $request->user()->role != $role) {
            return redirect()->action('SessionController@getLogin');
        }

        return $next($request);
    }
}
