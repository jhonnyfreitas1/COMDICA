<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Arquivada
{
    public function handle($request, Closure $next)
    {
        if(\Auth::user()->id == 1 || \Auth::user()->id == 2 || \Auth::user()->id == 3 || \Auth::user()->id == 5 || \Auth::user()->id == 6) {
            return $next($request);
        }
        return back();

    }
}
