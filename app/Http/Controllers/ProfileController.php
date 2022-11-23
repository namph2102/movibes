<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\api\ApiController;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    protected function ifm()
    {
        $userlogin = $_COOKIE['user_movibes'];
        $dbicon = DB::table('users')
            ->where('email', $userlogin)
            ->leftJoin('user_icon', 'user_icon.id_user', '=', 'users.id')
            ->leftJoin('icons', 'icons.id_icon', '=', 'user_icon.id_icon')
            ->get(['icons.name_icon', 'icons.link', 'icons.Level']);
        $dbuser = DB::table('users')
            ->where('email', $userlogin)
            ->get()[0];
        $indexMaxexp = 0;
        $leneExp = DB::table('exps')->orderByDesc('max_lv')->get();
        foreach ($leneExp as $epx) {
            if ($dbuser->exps >= $epx->max_lv) {
                $dbuser->ifm = $epx;
                $indexMaxexp = $epx->id_exp;
                break;
            }
        }
        $Nextxp = 0;
        if (DB::table('exps')->where('id_exp', $indexMaxexp + 1)->exists()) {
            $Nextxp = DB::table('exps')->where('id_exp', $indexMaxexp + 1)->first();
        } else {
            $Nextxp = DB::table('exps')->where('id_exp', $indexMaxexp)->first();
        }

        $arr = [];
        $vipicon = '';
        foreach ($dbicon  as $icon) {
            if ($icon->Level == 3) {
                $vipicon = $icon;
            } else if ($icon->Level != 1) {
                $arr[] = $icon;
            }
        }
        if (empty($vipicon)) $vipicon = ['name_icon' => "", "link" => "", "Level" => "0"];
        $dbuser->listicon = $arr;
        $dbuser->vip_icon = $vipicon;
        $dbuser->maxExp = $Nextxp;
        return ($dbuser);
    }
    public function shownocite(Request $request)
    {
        $userlogin = $_COOKIE['user_movibes'];
        $id=DB::table('users')->where('email',$userlogin)->first()->id;
        $dbnotice= DB::table('notice')
        ->where('id_user',$id)
        ->leftJoin('kind__notice','kind__notice.id','=','notice.kind_notice')
        ->select(['creatat','image','message','name'])
        ->orderByDesc('creatat')
        ->get();
        if($request->action){
            return response($dbnotice);
        }
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        $dbusersfull = new ApiController();
        return view('layouts.notice', compact('users','dbnotice'));
    }


    public function showprofile()
    {
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        $account = $this->ifm();
        return view('layouts.profile', compact('users', 'account'));
    }

    public function updateProfile(Request $request)
    {
        $id = $request->id;
        if ($request->fullname) {
            DB::table('users')->where('id', $id)->update(['name' => $request->fullname]);
        }
        if ($request->desp) {
            DB::table('users')->where('id', $id)->update(['desp' => $request->desp]);
        }
        return response(true);
    }




    public function uploadavata(Request $request){
        $userid=$request->userid;
        if(!empty($userid)){
            if ($request->upLoadAvata){
                $target_dir = '/avata/';
                $target_file = $target_dir .uniqid(). $_FILES["upLoadAvata"]["name"];
             
                $imgold=public_path().DB::table('users')->where('id',$userid)->select('avata')->first()->avata;         
                 if(file_exists($imgold)){
                     unlink( $imgold);
                 }
                 if(move_uploaded_file($_FILES["upLoadAvata"]["tmp_name"], public_path().$target_file)){
                    DB::table('users')->where('id',$userid)->update(['avata'=>$target_file]);
                    return back()->with(["message"=>"Thay Đổi Ảnh Đại Diện Thành Công !"]);
                 }
            }
        }
            return back();
    }
    function updatePasswork(Request $request){
        $username=$request->username;
        $password=$request->password;
        $passwordr=$request->passwordr;
        $passwordold=DB::table('users')->where("email",$username)->select('password')->first()->password;
        if(password_verify($password,$passwordold)){
            DB::table('users')->where("email",$username)->update(['password'=>password_hash($passwordr,null)]);
            return response(true);
        }
        return  response(false);
    }
}
