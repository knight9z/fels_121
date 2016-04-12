<?php

namespace App\Http\Middleware;

use Closure;

class IsMemberRole
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
        if (!isset($request->user()->role) || !$request->user()->isMember()) {
            return redirect()->action('SessionsController@create');
        }

        return $next($request);
    }
}
