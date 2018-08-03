<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAgency
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
        if (!Auth::user() || !Auth::user()->agency()->first() || !Auth::user()->agency()->first()->activated)  {
            return redirect('/')->with(["message"=>"unauthorized"]);
        }

        return $next($request);
    }
}
