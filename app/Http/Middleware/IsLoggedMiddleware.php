<?php

namespace App\Http\Middleware;

use Closure;

class IsLoggedMiddleware
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
        if(auth()->user() === null){
            return $next($request);
        }
        return redirect()->route('admin.dashboard.index');
    }
}
