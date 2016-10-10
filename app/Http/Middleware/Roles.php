<?php

namespace App\Http\Middleware;

use Closure;

class Roles
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
        //$role = Auth::role();
        if (\auth::user()->role == 'admin') {
          return $next($request);
        }
          return response('plz1111 login',401);
    }
}
