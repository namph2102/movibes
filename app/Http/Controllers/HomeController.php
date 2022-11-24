<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShowFilmModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Helper;
use Illuminate\Support\Facades\Cache;
class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        
        Cache::flush();
        cache()->flush();
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        return view('layouts.home', compact('users'));
    }
    public function playfilm($slug = null, $episode = null, $id = null)
    {
        $id = substr($id, 6);
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        $fiml = new ShowFilmModel();
        $dbfiml = $fiml->getDeltailFilm($episode, $id);
        $category=$dbfiml->category;
        $dbsame =DB::table('film')->where("category","like","%$category%")->limit(6)->get();
        return view('layouts.playfilm', compact('users', 'dbfiml','dbsame'));
    }

    public function getesopide(Request $request)
    {
        // ajax
        $id = $request->id;
        $episode = $request->episode;
        $fimldetail = DB::table("film_detail")
            ->where('id_filmDetail', $id)
            ->orderBy('esp')
            ->select(['esp', 'hhd', 'vip'])
            ->get();
        return response($fimldetail);
    }
    //Hiển thị tấ cả phim
    public function showall(Request $request)
    {

        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        return view('layouts.showfilms', compact('users'));
        
    }
    // hiển thị phim theo slug
    public function showfilmkind(Request $request, $slug=null){
        if(strpos($slug,'-')){
            $slug=str_replace('-','',$slug);
        }
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        $fiml = new ShowFilmModel();
        $title="";
        $dbfiml=[];
        $direct='';
        if($slug=='le'){
            $dbfiml = $fiml->getshowFilm($slug);
            $title='Tuyển Chọn Phim Hoạt Hình 3D Đồ Họa Đẹp | MOVIBES';
            $direct='Phim Lẻ';
        }else if($slug=='dangchieu'){
            $title='Tuyển Tập Phim Mới Nhất Hoạt Hình 3D | MOVIBES';
            $dbfiml = $fiml->getshowFilm($slug);
            $direct='Phim Đang Chiếu';
        }else if($slug=='hoanthanh'){
            $title='Những Bộ Phim Đã Hoàn Thành, Kết Thúc Các Phần| MOVIBES';
            $dbfiml = $fiml->getshowFilm($slug);
            $direct='Phim Đã Hoàn Thành';
        }else if($slug=='sapchieu'){
            $title='Top Trailer Hoành Tráng bộ phim hoạt hình| MOVIBES';
            $dbfiml = $fiml->getshowFilm($slug);
            $direct='Phim Sắp Chiếu';
        }else if(strpos($slug,"chieuphimthu")){
            $dbfiml = $fiml->getshowFilm("lichchieuphim",(substr($slug,-1,1)-1));
            $thu=(substr($slug,-1,1)=='8')?"Chủ Nhật": "Thứ ".substr($slug,-1,1);
            $direct='Lịch Chiếu PhiM '.$thu;
            $title=$direct."| MOVIBES";
        }else if(strpos($slug,"ruyenhinh")){
            $kind=(str_replace("truyenhinh","",$slug));
            $dbfiml = $fiml->getshowFilm("truyenhinh", $kind);

            if( $kind=="phimle"){
                $title="Danh sách phim lẻ tuyển chọn | MOVIBES";
                $direct='Danh Sách phim lẻ Hay';
            }else if( $kind=="phimbo"){
                $title="Danh sách phim bộ tuyển chọn | MOVIBES";
                $direct='Danh Sách phim bộ Hay';
            }else if( $kind=="phimchieurap"){
                $title="Danh sách phim chiếu rạp tuyển chọn | MOVIBES";
                $direct='Danh Sách phim chiếu rạp Hay';
            }
           
        }
        if($request->action){
            return response($dbfiml);
        }
       return view('layouts.showfilmkind', compact('users','dbfiml','title','direct'));
    }

    public function getcountry(Request $request, $slug){
        if(strpos($slug,'-')){
            $slug=str_replace('-',' ',$slug);
        }
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        $dbquocgia=DB::table("quocgia")->where('quocgia_slug',$slug)->first();
        $id=$dbquocgia->id_quocgia;
        $dbfiml=DB::table("film")->where('quocgia',$id)->get();
        $name=$dbquocgia->name_quocgia;
        $direct="Danh Sách phim $name";
        $title="Phim hay tuyển chọn theo quốc gia  $name tại MOVIBES";
        if($request->action){
            return response($dbfiml);
        }
        return view('layouts.showfilmkind', compact('users','dbfiml','title','direct'));
    }
    // end hiển thị phim theo slug
    public function detail()
    {
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        return view('layouts.showfilms', compact('users'));
    }


    public function showdetail($slug = null, $id = null)
    {
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        $fiml = new ShowFilmModel();
        $dbfiml = $fiml->getFilm($id)[0];
        $dbsame= $fiml->getFilm($id)[1];
        return view('layouts.film', compact('dbfiml', 'users','dbsame'));
    }


    public function regester(Request $request)
    {
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        return view('layouts.regester');
    }

    // gửi mail
    public function mailRegester()
    {
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        $username = "phamhoai";
    }

    // add bình luận
    public function handbinhluan(Request $request)
    {
        $dbusers = new UserModel();
        $result = $dbusers->addbinhluan($request->userid, $request->idFilm, $request->conment);
        return  response($result);
    }

    public function handboormarks(Request $request)
    {
        $dbusers = new UserModel();
        $action = $request->action;
        $iduser = $request->userid;
        if ($action == 'show') {
            return response($dbusers->showbookmark($iduser));
        }
        if ($action == 'update') {

            $listBookmarks = $request->Arrbookmap;
            return response($dbusers->deletebookmark($iduser, $listBookmarks));
        }

        $idfilm = $request->idFilm;
        if ($action == 'add') {
            return response($dbusers->addbookmark($iduser, $idfilm, $request->name, $request->img));
        }
        if ($action == 'delete') {
            return response($dbusers->deletebookmark($iduser, $idfilm));
        }

        return response(false);
    }

    public function getStart(Request $request)
    {
        $id_fiml = $request->id;
        $ip = $request->ip();
        $id_esopide=$request->esopide;   
        $countStar = round(DB::table('stars')->where('id_film', $id_fiml)->count('star'),1);
         $total = round(DB::table('stars')->where('id_film', $id_fiml)->avg('star'),1);
        $check = DB::table("stars")->where('ip', $ip)->where('id_film', $id_fiml)->where('id_esopide', $id_esopide)->exists();
        if ($request->action == 'needstar') {
        
            if ($check) {
                $star =( DB::table("stars")->where('ip', $ip)->where('id_film', $id_fiml)->where('id_esopide', $id_esopide))->first(['star']);
                return response(['star' => $star->star, 'total' => $total,'count'=>$countStar]);
            } else {
                return response(['star' => 5, 'total' => $total,'count'=>$countStar]);
            }
        }
        
        $star = $request->star;
        if ($check) {
            DB::table("stars")->where('ip', $ip)->where('id_film', $id_fiml)->where('id_esopide', $id_esopide)->update(['star' => $star]);
        } else {
            DB::table("stars")->insert(["id_film" => $id_fiml,"id_esopide"=>$id_esopide,"star" => $star, 'ip' => $ip]);
        }
        DB::table("film")->where('id_film', $id_fiml)->update(['votes'=> $total,'total_starts'=>$countStar]);
        return response(["total"=>$total,"count"=>$countStar]);
    }

    public function updateview(Request $request){
        $id=$request->id;
        DB::table('film')->where("id_film",$id)->increment('views',1);
        $views=DB::table('film')->where("id_film",$id)->select("views")->get();

        // updata exp
        $id_user=$request->id_user;
        if($id_user>0){
            $id_film=$id;
            $esopide=$request->esopide;
            $check=DB::table("exps_reward")->where("id_user",$id_user)->where("id_film",$id_film)->where("esopide",$esopide)->exists();
            if(!$check){
                $namefiml=DB::table('film')->where("id_film",$id_film)->select('name')->first();

                $message='Bạn được cộng 2 điểm kinh nghiệm khi xem <span class="content__notice-item_head">'.$namefiml->name. " Tập ".$esopide.'</span>' ;
                DB::table("notice")->insert(['id_user'=>$id_user,"kind_notice"=>1,"message"=>  $message]);

                DB::table('users')->where("id",$id_user)->increment('exps',2);
                DB::table('exps_reward')->insert(["id_user"=> $id_user,"id_film"=>$id_film,"esopide"=>$esopide,"award_exp"=>2]);
            }
        }
        return response($views);
    }


    public function addReport(Request $request){
        $fullname=$request->fullname;
        $id_user=$request->id_user;
        $comments=$request->comments;
        $id_film=$request->idfilm;
        $esopide=$request->esopide;
        
        DB::table('baocao_loi')->insert(["id_user"=>$id_user,"comments"=>$comments,"fullname"=>$fullname,"id_film"=>$id_film,"esopide"=>$esopide]);
        return response(true);
    }


}
