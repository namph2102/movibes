<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class UserModel extends Model
{
    use HasFactory;
    protected function setCookie($nameCOOKIE=null,$value=null){
        if(!empty($value)) return false;
        $time=86400*30;
        setCookie($nameCOOKIE,$value,time()+$time,"/");
        return true;
       
    }
    public function getCookie($nameCOOKIE){
        if(isset($_COOKIE[$nameCOOKIE])) return $_COOKIE[$nameCOOKIE];
        return false;
    }
    
    public function getAllifmUser (){
        $athur=[];
        if(!isset($_COOKIE['user_token'])) return [];
        $token=$_COOKIE['user_token'];
        $user_movibes=$_COOKIE['user_movibes'];
        if(!empty($user_movibes) &&  !empty($token)){
            $athur=DB::table('users')->where('email',$user_movibes)->first();
        }
        return $athur;
    }

    public function addbinhluan($iduser,$idfilm=0,$comment){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s",time());
        if(strlen($comment)>100) return false;
      DB::table('comments')->insert(['id_user'=>$iduser,'id_film'=>$idfilm,'comment'=>$comment,"create_at"=>$date]);
      return true;
    }

    public function addbookmark($iduser,$idfilm,$name,$img){
        $check= DB::table('bookmarks')->where('id_user', $iduser)->where('id',$idfilm)->exists();
        if ($check) return true; 
        DB::table('bookmarks')->insert(['id_user'=>$iduser,'id'=>$idfilm,'name'=>$name,'avata'=>$img]);
         return true;
    }
    public function deletebookmark($iduser,$idfilm){
        DB::table('bookmarks')->where('id_user', $iduser)->where('id',$idfilm)->delete();
        return  true;
    }
    public function showbookmark($iduser){
        $dbbooks=DB::table('bookmarks')->where('id_user', $iduser)->get();
        foreach($dbbooks as $book){
            $book->ngaytao=date("d/m/Y H:i:s",strtotime( $book->ngaytao));
        }
        return  $dbbooks;
    }

    
    public function updatebookmark($iduser,$list){
        DB::table('bookmarks')->where('id_user', $iduser)->delete();
        foreach($list as $item){
            $ngaytao=date("Y-m-d", strtotime($item["ngaytao"]));
            DB::table('bookmarks')->insert(["id"=>$item['id'],"id_user"=>$item['id_user'],"name"=>$item['name'],"avata"=>$item['avata'],"ngaytao"=>$ngaytao]);
        }
        return true;
    }
}
