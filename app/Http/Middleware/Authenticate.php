<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
//        if (Auth::user()->role_id == 1){
//            return redirect()->route('admin.login');
//        }
//        else{
//            return redirect()->route('dangnhap');
//        }
       if(!Auth::check()){
           return redirect()->route('admin.login');
       }
//        $user = Auth::user();
//       $route = $request->route()->getName();
//        if($user->cant($route)){
//            return redirect()->route('admin.error',['code'=>403]);
//        }
       return $next($request);

    }

}
