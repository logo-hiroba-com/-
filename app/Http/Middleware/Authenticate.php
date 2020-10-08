<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request,Closure $next, $guard = null)
    {
        // if (! $request->expectsJson()) {
        //     return route('userlogin');
        // }
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }else{
                return redirect()->route('logos.index');
            }
            // return redirect()->route('logos.index');
        }
        return $next($request);
    }
}
