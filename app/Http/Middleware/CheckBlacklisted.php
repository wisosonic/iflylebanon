<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Auth;

class CheckBlacklisted
{

    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $blacklist = $user->blacklist()->first() ;
        if ($user && $blacklist)  {
            if ($user->status == "block") {
                return redirect('/')->with(["message"=>"blacklisted"]);
            } else {
        		return redirect('/')->with(["message"=>"pblacklisted"]);
        	}
        }
        return $next($request);
    }
}
