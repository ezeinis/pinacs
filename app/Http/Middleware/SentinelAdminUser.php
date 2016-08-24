<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use App\User;

class SentinelAdminUser
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
        if($user->role->role_name()!="Admins"){
            return redirect('login');
        }
        return $next($request);
    }
}
