<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BindRouteParams {

    /**
     * Handle an incoming request.
     * This middleware will bind url parameters to request
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $request->merge($request->route()->parameters());

        return $next($request);
    }
}
