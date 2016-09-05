<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use App\User;

class SentinelParent
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
        $user = Sentinel::getUser();

        if($user==NULL){
            return redirect('login');
        }
        $user = Sentinel::getUser();
        $user = User::find($user->id);
        if($user->roles()->first()->name!="Parents"){
            return redirect('login');
        }

        return $next($request);
    }
}
