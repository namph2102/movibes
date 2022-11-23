<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShowFilmModel extends Model
{
    use HasFactory;
    public function getFilm($id = null)
    {
        $id = substr($id, 6);
        $dbFiml = DB::table('film')
            ->where('id_film', $id)
            ->leftJoin('quocgia',"quocgia.id_quocgia",'=','film.quocgia')
            ->get()[0];

        if (!empty($dbFiml)) {
            $id=1;
            DB::table('film')
                ->where('id_film', $id)
                ->get()[0];
               
        }
        DB::table('film')->increment('views',1);
        $dbFimlDetail = DB::table('film_detail')
            ->where('id_filmDetail', $id)
            ->get();
        $arrKind = [];
        $arrDay = [];
        $dbfilmSameKind=DB::table('film')
        ->where('category', "like",$dbFiml->category)->limit(6)->get();
        $kinds = explode(',', $dbFiml->category);
        $fulldays ='';
        $categorys = DB::table('category')->get('name_cate');
        if(strlen($dbFiml->openday)>1){
            $fulldays = explode(',', $dbFiml->openday);

            $days = DB::table('openday')->get();
            foreach ($fulldays as $day) {
                $arrDay[] = $days[$day-1];
            }
        }
        else{
            $arrDay = DB::table('openday')->where('id_day',$dbFiml->openday)->get();
        }
        foreach ($kinds as $kind) {
            $arrKind[] = $categorys[$kind-1];
        }
        $dbFiml->episodes = $dbFimlDetail;
        $dbFiml->kinds = $arrKind;
        $dbFiml->fulldays = $arrDay;
        return [$dbFiml,$dbfilmSameKind];
    }

    public function getDeltailFilm($episode=null,$id=null,$action=null){
     
        $detailfilm=DB::table('film')
            ->where("id_film",$id)->first();
        $filmAll=DB::table("film_detail")
        ->where('id_filmDetail',$id)
        ->orderBy('esp')
        ->select(['esp','hhd','vip'])
         ->get();
       
        $fimldetail=DB::table("film_detail")
        ->where('id_filmDetail',$id)
        ->where('esp',$episode)
        ->orderBy('esp')
        ->select(['esp','hhd','vip'])
         ->first();
         $stars=DB::table("stars")->where("id_film",$id)->count('star');
         if($stars<=0) $stars='1.0';
         $arrDay=[];
         if(strlen($detailfilm->openday)>1){
            $fulldays = explode(',', $detailfilm->openday);

            $days = DB::table('openday')->get();
            foreach ($fulldays as $day) {
                $arrDay[] = $days[$day-1];
            }
        }
        else{
            $arrDay = DB::table('openday')->where('id_day',$detailfilm->openday)->get();
        }

         $detailfilm->episodes=$filmAll;
         $detailfilm->film=$fimldetail;
         $detailfilm->fulldays=$arrDay;
         $detailfilm->votes=$stars;
       return ($detailfilm);
    }
  
    public function getshowFilm($kind=null,$day=null)
    {
        $dbFiml='';
        if($kind=='le'){
            $dbFiml=DB::table("film")->where('episode',1)->get();
        }else if($kind=='dangchieu'){
            $dbFiml=DB::table("film")->where('status',0)->get();
        }else if($kind=='hoanthanh'){
            $dbFiml=DB::table("film")->where('status',1)->get();
        }else if($kind=='sapchieu'){
            $dbFiml=DB::table("film")->where('status',2)->get();
        }else if($kind=='lichchieuphim'){
            $dbFiml=DB::table("film")->where('status',0)->where('openday','like',$day)->get();
        }else if($kind=='truyenhinh'){
            $status=3;
            if($day=="phimle"){
                $status=3;
            }else if($day=="phimbo"){
                $status=4;
            }else if($day=="phimchieurap"){
                $status=5;
            }
            $dbFiml=DB::table("film")->where('status',$status)->get();
        }
       
        return  $dbFiml;
      
    }
}
