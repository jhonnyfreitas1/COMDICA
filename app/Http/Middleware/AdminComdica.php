<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminComdica
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
        if(\Auth::user()->id == 1 || \Auth::user()->id == 2) {
            return $next($request);
        }
        return back();

    }
}
