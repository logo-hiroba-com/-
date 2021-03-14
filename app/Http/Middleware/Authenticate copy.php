<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return string|null
     */
    public function handle($request,Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {
            // if ($request->ajax() || $request->wantsJson()) {
            //     return response('Unauthorized.', 401);
            // }else{
                return redirect()->route('logos.index');
            // }
        }
        return $next($request);
    }
}
