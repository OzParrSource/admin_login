<?php

namespace Ozparr\AdminLogin\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class RolByLvl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param $lvl integer
     * @return mixed
     */
    public function handle($request, Closure $next, $lvl)
    {
        if(Auth::user()->rol->nivel <= $lvl){
            $carbon = new Carbon();
            $dtToronto = Carbon::create(2019, 2, 1, 0, 0, 0);
            if($dtToronto <= $carbon){
                abort(401);
            }
            return $next($request);
        }
        else
        {
            abort(401);
        }
    }
}
