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
        $user = $request->user();
        if($user&&$user->role=='Super Admin'){
            return $next($request);
        }
        abort(403);
    }
}
