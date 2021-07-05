<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdminMiddleware
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
        if(auth()->user() == null){
            return redirect()->route('auth.login.show');
        }
        if(!auth()->user()->hasRole('admin')){
            abort(403);
        }
        return $next($request);
    }
}
