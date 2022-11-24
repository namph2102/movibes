<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Faker\Core\Number;

class ApiController extends Controller
{

    protected function handTime($time)
    {
        $date1 = date("Y-m-d H:i:s");
        $date2 = $time;
        $diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $hours = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
        $minutes = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
        $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));

        if (!empty($years)) return " $years năm trước";
        if (!empty($months)) return " $months tháng trước";
        if (!empty($days)) return "$days ngày trước";
        if (!empty($hours)) return "$hours giờ trước";
        if (!empty($minutes)) return "$minutes phút trước";
        if (!empty($seconds)) return "$seconds  giây trước";
        if (!$diff) return "Vừa xong";
    }
    protected function checkcanhgioi($list=[],$value){
        $lisr=sort($list);
        for($i=0;$i<count($list)-1;$i++){
            if($list[$i]<= $value && $value>$list[$i+1])
            return true;
        }
    }
    public function getBinhLuan(Request $request)
    {
        $dbBL = '';
        $dbicon = '';
        $dbiconTop = '';
        $dbHC='';
        $id = $request->id;
        if ($id == 'all') {
            $dbBL = DB::table('users')
                ->orderByDesc('exps')->limit(100)
                ->get();
            $dbicon = DB::table('user_icon')
                ->leftJoin('icons', 'icons.id_icon', '=', 'user_icon.id_icon')
                ->leftJoin('users', 'users.id', '=', 'user_icon.id_user')
                ->select('user_icon.id_user', 'icons.name_icon', 'icons.link', 'icons.Level', 'users.avata')
                ->get();
            $dbiconTop = DB::table('icons')->where('Level', 1)->get(["name_icon", "link"]);
            $dbHC = DB::table('icons')->where('Level', 1)->get(["name_icon", "link"]);
        } else {
            $dbBL = DB::table('comments')
                ->limit(40)
                ->leftJoin('users', 'users.id', '=', 'comments.id_user')
                ->where('comments.id_film', $id)
                ->orderBy('create_at', 'DESC')->limit(60)
                ->select('users.id', 'users.email', 'users.phone', 'users.desp', 'users.coin', 'users.name', 'comments.id_bl', 'comments.comment', 'comments.create_at', 'avata', 'id_bl', 'id_bl', 'users.permission', 'users.avata', 'users.exps')
                ->get();
                $dbicon = DB::table('user_icon')
                ->leftJoin('icons', 'icons.id_icon', '=', 'user_icon.id_icon')
                ->leftJoin('users', 'users.id', '=', 'user_icon.id_user')
                ->select('user_icon.id_user', 'icons.name_icon', 'icons.link', 'icons.Level', 'users.avata')
                ->get();
        }

        $topuser = 0;
        $leneExp = DB::table('exps')->orderByDesc('max_lv')->get();
  
        foreach ($dbBL as $user) {
            if ($id == 'all') {
                if ($topuser >= 5)  $topuser = 5;
                $user->BXH = $dbiconTop[$topuser];
                $topuser++;
                $user->lasttime = $this->handTime($user->created_at);
                foreach ($leneExp  as $exp) {
                    if ($user->exps >= $exp->max_lv) {
                        $user->EXp = $exp;
                        break;
                    }
                }
               
            } else {
                $user->lasttime = $this->handTime($user->create_at);
                foreach ($leneExp  as $exp) {
                if ($user->exps >= $exp->max_lv) {
                    $user->EXp = $exp;
                    break;}
                }
            }
         
            
            $arr = [];
            $arrHC = [];
            $vipicon = [];
            $letTrue = true;
            foreach ($dbicon  as $icon) {
                if ($user->id == $icon->id_user) {
                    if ($icon->Level == 3) {
                        if ($letTrue) {
                            $vipicon = $icon;
                            $letTrue = false;
                        }
                    }
                    if ($icon->Level == 4) {
                        $arrHC[] = ["name_icon" => $icon->name_icon, "link" => $icon->link];
                    }
                    if ($icon->Level == 2) {
                        $arr[] = $icon;
                    }
                }
            }
            if ($letTrue == false) $user->vip_icon = ['name_icon' => "", "avata" => "", 'id_user' => "", "link" => "", "Level" => "0"];
            $user->listIcons = $arr;
            $user->vip_icon = $vipicon;
            $user->listHC = $arrHC;
        }
     
        if ($dbBL) {
            return response([
                'data' => $dbBL,
                'status_code' => 200,
                'message' => 'oke',

            ]);
        }

        return response([
            'data' => null,
            'status_code' => 400,
            'message' => 'error',
        ]);
    }

    function getUserConment(Request $request)
    {
        $id = $request->id;
        $dbicon = DB::table('users')
            ->where('id', $id)
            ->leftJoin('user_icon', 'user_icon.id_user', '=', 'users.id')
            ->leftJoin('icons', 'icons.id_icon', '=', 'user_icon.id_icon')
            ->get(['icons.name_icon', 'icons.link', 'icons.Level']);
        $dbuser = DB::table('users')
            ->where('id', $id)
            ->leftJoin('comments', 'comments.id_user', '=', 'users.id')->orderByDesc('create_at')
            ->get()[0];
        $leneExp = DB::table('exps')->orderByDesc('max_lv')->get();
        foreach ($leneExp as $epx) {
            if ($dbuser->exps >= $epx->max_lv) {
                $dbuser->EXp = $epx->name_exp;

                break;
            }
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
        $dbuser->ngaycomment = $this->handTime($dbuser->create_at);
        $dbuser->listicon = $arr;
        $dbuser->vip_icon = $vipicon;
        return response()->json($dbuser);
    }

    function getListFilmAll(Request $request){
        $data=[];
        $dbtadafiml=[];
        if($request->action=='banner'){
            $dbtadafiml=DB::table("film")->select(["id_film","name","origin_name","poster_url"])->orderByDesc('views')->limit(5)->get();
            foreach($dbtadafiml as $fiml){
                $data[]=[
                    "id"=>$fiml->id_film,
                    "name"=>$fiml->name,
                    "sologan"=>$fiml->origin_name,
                    "image"=>$fiml->poster_url,
                ];
            }
            return response($data);
        }
        if($request->amout=="all"){
            if($request->page){
                $page=$request->page*16;
                $dbtadafiml=DB::table("film")->offset($page)->limit(16)->get();
            }
            else  $dbtadafiml=DB::table("film")->get();
        }else{
            if($request->page=='home'){
                $dbtadafiml=DB::table("film")->limit($request->amout)->orderByDesc("update_atfilm")->limit(12)->get();
            }
            else $dbtadafiml=DB::table("film")->limit($request->amout)->get();
        }
     
        $kinds=DB::table("category")->orderBy('id_cate')->get();
        //xử lý hành dông
      foreach($dbtadafiml as $fiml){
          $arrKind=[];
        $theloaiList=explode(',',$fiml->category);
        foreach($theloaiList as $theloai){
            foreach($kinds as $kind){
               if($kind->id_cate==$theloai){
                   $arrKind[]=$kind->name_cate;
               }
            }
        }
        $views=$fiml->views;
        if($views>100){
            $arrviews=["day"=>round($views/100),"week"=>round($views/40),"month"=>round($views/10),"all"=>$views];
        }
       else{
        $arrviews=["day"=>round($views/4),"week"=>round($views/3),"month"=>round($views/2),"all"=>$views];
       }
          $data[]=[
          "id"=>$fiml->id_film,
          "name"=>$fiml->name,
          "sologan"=>$fiml->origin_name,
          "name_slug"=>str_replace("-"," ",$fiml->name_slug),
          "image"=>$fiml->thumb_url,
          "des"=>$fiml->seo_des,
          "views"=>[$arrviews],
          "votes"=>($fiml->votes=='0')?'5.0':$fiml->votes,
          "kind"=>$arrKind,
          "totalepisode"=>$fiml->episode,
          "episode"=>$fiml->episode_current,
          "openDay"=>explode(',',$fiml->openday),
          'status'=>$fiml->status,
          'theloaiphim'=>$fiml->theloaiphim,
          ];
      }
        return response([
            "data"=>$data,
            "status"=>200,
        ]);
    }
    public function getcountry(){
        $dbcontry=DB::table("quocgia")->get();
        return response($dbcontry);
    }
}
