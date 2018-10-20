<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use App\Blacklist;
use Closure;
use Auth;

class UpdateBlacklist
{

    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $blacklist = $user->blacklist()->first() ;
        if ($user && 
            $blacklist && 
            $user->status == "block" && 
            $blacklist->created_at->addWeeks(1) < Carbon::now() )  {

                $user->status = "test";
                $user->save();
                Blacklist::deleteBlacklist($user->id);
        }
        return $next($request);
    }
}
