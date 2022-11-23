<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return view('layouts.login');
    }
    public function index(){    
        return view('layouts.login');
    }

    public function checkUser(Request $request){
        $staticEmail=$request->username;
        if($request->user_password){
            $dbuser=DB::table('users')->where('email',$staticEmail)->get();
            if(password_verify($request->user_password,$dbuser[0]->password)){
                $time=86400*30;
                $token=$dbuser[0]->remember_token;
                setCookie('user_movibes', $staticEmail,time()+$time,"/");
                setCookie('user_token', $token,time()+$time,"/");
                setCookie('user_password', $request->user_password,time()+$time,"/");
                if($request->action=="submit"){
                    return Response(redirect()->back());
                }
                return Response(true);
               
            }else{
                return Response(false);
            }
        }
       
        if($request->action=="check"){
           
            $dbUser=DB::table('users')->where('email',$staticEmail)->exists();
            $message='Không tồn Tại account';
            return Response($dbUser);
        }
        return Response(false);
    }
    public function loginUser(Request $request){
            $email=$request->username;
            $check=DB::table('users')->where('email',$email)->doesntExist();
            if($request->password){
                $dbuser=DB::table('users')->where('email',$email)->get();
                if(password_verify($request->password,$dbuser[0]->password)){
                    $time=86400*30;
                    $token=$dbuser[0]->remember_token;
                    setCookie('user_movibes', $email,time()+$time,"/");
                    setCookie('user_token', $token,time()+$time,"/");
                    setCookie('user_password', $request->password,time()+$time,"/");
                    return Response('loginSuccess');
                   
                }else{
                    return Response('loginFail');
                }
            }
            return Response($check);
        
    }

    public function loginOutUser(Request $request){
        $time=86400*30;
        setcookie("user_movibes", "", time()-$time);
        setCookie('user_token', "",time()-$time,"/");
        setCookie('user_password', "",time()-$time,"/");
        return Response(true);
}
public function goback(){
    $sucess='Yesssss';
    $userLoading="fafdafd";
    return redirect()->route('film.trangchu');
}
}
