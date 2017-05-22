<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsEntr
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
        if (Auth::user()->tipo == 0 OR  Auth::user()->tipo == 2)
        {
            return $next($request);
        }
        return redirect('/');
    }
}
