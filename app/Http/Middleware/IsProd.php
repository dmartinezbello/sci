<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsProd
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
        if (Auth::user()->tipo == 1 OR Auth::user()->tipo == 0)
        {
            return $next($request);
        }
        return redirect('/');
    }
}
