<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
{

    public function handle($request, Closure $next)
    {
        if (!Auth::user() || !Auth::user()->admin() )  {
            return redirect('/')->with(["message"=>"notadmin"]);
        }

        return $next($request);
    }
}
