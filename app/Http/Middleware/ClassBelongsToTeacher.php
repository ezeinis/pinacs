<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use App\User;

class ClassBelongsToTeacher
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
        $user = User::where('id',$user->id)->with('classes')->get()[0];
        $target_class_id=explode("/",$request->getPathInfo())[3];
        foreach ($user['classes'] as $class) {
            if($class->id==$target_class_id){
                return $next($request);
            }
        }
        return abort(401);
    }
}
