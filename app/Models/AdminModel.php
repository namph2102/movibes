<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminModel extends Model
{
    use HasFactory;
    public function dashboard(){
        $dbfilm=DB::table('film')->get();
        $total_user=DB::table('users')->count();
        $total_film= $dbfilm->count();
        $total_views= $dbfilm->sum('views');
        $total_coin=DB::table('users')->sum('coin');
        $topfiml=DB::table('film')->orderByDesc('views')->limit(6)->get(['id_film','views']);
        return (['users'=>$total_user,'films'=>$total_film,'views'=>$total_views,'coins'=>$total_coin,'topfilm'=>$topfiml]);
       
    }
    public function getAllListUser(){
        $dbuser=DB::table("users")->paginate(1);
        return $dbuser;
    }
    public function addprofile($email,$password,$phone,$fullname,$token,$avata=null){
        $check=DB::table('users')->where('email',$email)->exists();
        if($check) {
            $message=' tài khoản có username: '.$email.' Đã tồn tại !';
            return  false;
        }
        if ($avata){
            $target_dir = '/avata/';
            $target_file = $target_dir .uniqid(). $_FILES["upLoadAvata"]["name"];         
             if(move_uploaded_file($_FILES["upLoadAvata"]["tmp_name"], public_path().$target_file)){
                DB::table('users')->insert(['email'=>$email,'avata'=>$target_file,'password'=>$password,'name'=>$fullname,'phone'=>$phone,'remember_token'=>$token]);
                return  true;
            }
            
        }
        DB::table('users')->insert(['email'=>$email,'password'=>$password,'name'=>$fullname,'phone'=>$phone,'remember_token'=>$token]);
        return true;
    }


    public function handFilm($action,$id,$name,$origin,$slug,$theloaiphim,$time,$year,$status,$episode,$episode_current=0,$quocgia=1,$openday,$Catetory,$des,$desseo,$descanhgioi,$desnguoithan){
        if($action=='update'){
            DB::table('film')->where('id_film',$id)->
            update(["name"=>$name,"origin_name"=>$origin,"name_slug"=>$slug,
            "time"=>$time,"year"=>$year,"status"=>$status,"theloaiphim"=>$theloaiphim,
            "episode"=>$episode,"episode_current"=>$episode_current,"quocgia"=>$quocgia,"openday"=>$openday,"category"=>$Catetory,
            "des"=>$des,"seo_des"=>$desseo,"mota_canhgioi"=>$descanhgioi,"mota_nguoithan"=>$desnguoithan]);
            return "Thay đổi thành công phim ".$name;
        }else if($action=='add'){
            DB::table('film')->
            insert(["id_film"=>$id,"name"=>$name,"origin_name"=>$origin,"episode_current"=>$episode_current,"name_slug"=>$slug,
            "time"=>$time,"year"=>$year,"status"=>$status,"theloaiphim"=>$theloaiphim,
            "episode"=>$episode,"quocgia"=>$quocgia,"openday"=>$openday,"category"=>$Catetory,
            "des"=>$des,"seo_des"=>$desseo,"mota_canhgioi"=>$descanhgioi,"mota_nguoithan"=>$desnguoithan]);
            return "Thêm thành công phim".$name;
        }

    }
}
