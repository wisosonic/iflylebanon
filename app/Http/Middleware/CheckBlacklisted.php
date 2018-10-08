<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckBlacklisted
{

    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->blacklist()->first() )  {
            return redirect('/')->with(["message"=>"blacklisted"]);
        }

        return $next($request);
    }
}
