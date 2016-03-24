<?php

namespace App\Http\Middleware;

use Closure;

class IsUserRole
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
        if (!isset($request->user()->role) || $request->user()->isUser()) {
            return redirect()->action('SessionController@create');
        }

        return $next($request);
    }
}
