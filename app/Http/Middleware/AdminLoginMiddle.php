<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminLoginMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle(Request $request, Closure $next)
    {
        if(!empty($_COOKIE["user_movibes"])){
            $username=$_COOKIE["user_movibes"];
            $user_password=$_COOKIE["user_password"];
            if($username=="movibesfilm@gmail.com" && $user_password=="21022002"){
                return $next($request);
            }  
        }
        
         return redirect()->route("film.trangchu");
    }
}
