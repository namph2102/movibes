<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        return view('layouts.regester');
    }
    protected function entitiesDanger($url) {
        $url=$this->entitiesDanger($url);
        if(empty($url)) return false;
        $url= str_replace('javascript',"***",$url);
        $url=  str_replace("***","\"",$url);
        $url=  str_replace('<',"&lt;",$url);
        $url=  str_replace('>',"&gt;",$url);
        $url=  str_replace('&',"&amp;",$url);
        $url=  str_replace('&lt;',"<",$url);
        $url=  str_replace('&amp;',"&",$url);
        $url=  str_replace('&gt;',">",$url);
         return $url;
    }
    public function index(){
        return view('layouts.regester');
    }
    public function createUser(Request $request){
        
        $r=$request->all();
        if(!empty($request->username)){
            $username=$request->username;
            $dbUser=DB::table('users')->where('email',$username)->exists();
            $message='';
            return Response($dbUser);
        }
      
        $email=trim($r['user_email']);
        $token=$r['_token'];
        $password=password_hash($r['use_password'],null);
        $fullname=trim($r['use_fullname']);
        $phone=trim($r['use_phone']);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s", time());

        DB::table('users')->insert(['email'=>$email,'password'=>$password,'name'=>$fullname,'phone'=>$phone,'remember_token'=>$token,"created_at"=>$date]);
        $time=86400*30;
        setCookie('user_movibes', $email,time()+$time,"/");
        setCookie('user_token', $token,time()+$time,"/");
        $userNew=DB::table('users')->where('remember_token',$token)->orderBy('name', 'desc')->get()[0];
         
        // Mail Regester
        Mail::send('mail.mail',compact('userNew'),function($mail) use($email,$fullname){
            $mail->subject('Thư chúc mừng thành viên');
            $mail->to($email,$fullname);
        });
        $sucess='Yesssss';
        $userLoading="fafdafd";
        return redirect()->route('form.regester',compact('userLoading','sucess'));
    }
    public function deleterUser(Request $request){

    }
    public function updaterUser(Request $request){

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
