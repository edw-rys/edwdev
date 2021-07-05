<?php

namespace App\Http\Middleware;

use Closure;

class IsAuthenticated
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
        // dd(auth()->user());
        if(auth()->user() === null){
            return redirect()->route('auth.login.show');
        }
        return $next($request);
    }
}
