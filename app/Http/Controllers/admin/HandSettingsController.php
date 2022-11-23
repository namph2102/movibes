<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HandSettingsController extends Controller
{
    protected function handImg($id,$nameimg,$name_icon,$Level,$action="update"){
     
        if($action=="update"){
            if(!$nameimg){
                DB::table('icons')->where('id_icon',$id)->update(["name_icon"=>$name_icon,"Level"=>$Level]);
                return true;
            }else{
                $target_dir = '/icon/';
                $target_file = $target_dir .uniqid().'-'. $_FILES[$nameimg]["name"];
                $imgold=public_path().DB::table('icons')->where('id_icon',$id)->first()->link;         
                if(file_exists($imgold)){ 
                       unlink($imgold); 
                }
                if(move_uploaded_file($_FILES[$nameimg]["tmp_name"], public_path().$target_file)){
                    DB::table('icons')->where('id_icon',$id)->update(["link"=>$target_file,"name_icon"=>$name_icon,"Level"=>$Level]);
                 }
            }
           
        }else if($action=="add"){
            $target_dir = '/icon/';
            $target_file = $target_dir .uniqid().'-'. $_FILES[$nameimg]["name"];
            if(move_uploaded_file($_FILES[$nameimg]["tmp_name"], public_path().$target_file)){
                DB::table('icons')->insert(["link"=>$target_file,"name_icon"=>$name_icon,"Level"=>$Level]);
            }
            
        }  
    }

    public function showicons(Request $request){
        $message='';
        if($request->change_Icons){
            $name=$request->name;
            $level=$request->lv;
            if($request->update){
                $id=$request->id;
                $upLoadAvata=$request->upLoadAvata;
                if(!$upLoadAvata){
                    $this->handImg($id,"",$name,$level,"update");
                }
               else $this->handImg($id,"upLoadAvata",$name,$level,"update");
              $message="UPDATE  thành công ";
            }

            if($request->add){
                $this->handImg("không cần","upLoadAvata",$name,$level,"add");
                $dbicon=DB::table("icons")->orderByDesc('id_icon')->first();
                $image=$dbicon->link;
                $message="Thêm thành công Tên:$name ====> Level :$level ";
                return view("layoutAdmin.detailLayout.icons.addicons",compact("image","message"));
            }
        }
       
      
        if($request->action){
            $action=$request->action;  
            $id=$request->id;
            if($action=="change"){
                // view change icons
                $dbicon=DB::table("icons")->where("id_icon", $id)->first();
                return view("layoutAdmin.detailLayout.icons.changeIcons",compact("dbicon","message"));
            }else if($action=="delete"){
                DB::table("user_icon")->where("id_icon",$id)->delete();
                DB::table("icons")->where("id_icon",$id)->delete();
                $message="Xóa thành công icon có id: ".$id;
            }
        }
      
        $dbicons=DB::table("icons")->paginate(12);
        return view("layoutAdmin.detailLayout.icons.showAllicons",compact("dbicons","message"));
    }

    public function iconsadd(){
        $message='';
        return view("layoutAdmin.detailLayout.icons.addicons",compact("message"));
    }
    public function showbaoloi(Request $request){
        $message="";
        if($request->action){
            $id=$request->id;

            if($request->action=="duyet"){
                $userid=$request->userid;
                $dbuser=DB::table("users")->where("id",$userid);
                $dbuser->increment("exps",10);
                DB::table("notice")->insert(["id_user"=>$userid,"kind_notice"=>4,"message"=>"Cảm ơn bạn đã giúp chúng tôi kịp thời sửa chữa lỗi"]);
                DB::table("notice")->insert(["id_user"=>$userid,"kind_notice"=>1,"message"=>"Bạm được cộng <span class="."text-warning"."> 10 điểm  kinh nghiệm </span> về việc báo cáo lỗi"]);
            }

            $dbloi=DB::table("baocao_loi")->where("id_error",$id)->delete();
        }
        $dbloi=DB::table("baocao_loi")->paginate(5);
        return view("layoutAdmin.detailLayout.baoloi.showloi",compact('dbloi','message'));
    }
    public function showcatelory(Request $request){
        $message="";
        if($request->change_Icons){
            $category=DB::table("category")->where("id_cate",$request->id)->update(["name_cate"=>$request->name]);
            $message="Thay đổi thành công";
        }
        if($request->add_icons){
            $category=DB::table("category")->insert(["name_cate"=>$request->name]);
            $message="Thêm thành thành công";
            
        }
        if($request->action){
            $action=$request->action;
            if($action="change"){
                $category=DB::table("category")->where("id_cate",$request->id)->first();
                return view("layoutAdmin.detailLayout.catelogy.handleCate",compact('category','message'));
            }
        }
        $dbcategory=DB::table("category")->paginate(10);
        return view("layoutAdmin.detailLayout.catelogy.showcatelogy",compact('dbcategory','message'));
    }
    public function cateloryadd(){
        $message='';
        return view("layoutAdmin.detailLayout.catelogy.handleCate",compact('message'));
    }


    public function showcountry(Request $request){
           $message="";
           $dbcountry=DB::table("quocgia")->paginate(10);
          return view("layoutAdmin.detailLayout.country.showcountry",compact('dbcountry','message'));
    }
    public function countryadd(Request $request){
        $message="Chọn đúng Nhu cầu Nhé";
        $id=$request->id;
        if($request->change_country){
            $message="Thay đổi Thành công !";
            $nameconutry=$request->name;
            $nameslug=$this->convert_vi_to_en( $nameconutry);
         DB::table("quocgia")->where("id_quocgia",$id)->update(["name_quocgia"=>$nameconutry,"quocgia_slug"=>$nameslug]);
        }
        if($request->add_country){
            $message="Thêm mới Thành công !";
            $nameconutry=$request->name;
            $nameslug=$this->convert_vi_to_en( $nameconutry);
         DB::table("quocgia")->insert(["name_quocgia"=>$nameconutry,"quocgia_slug"=>$nameslug]);
        }

        $dbcountry=DB::table("quocgia")->where("id_quocgia",$id)->first();
   
        return view("layoutAdmin.detailLayout.country.handlecountry",compact('dbcountry','message'));
    }

    public function showcreatsitemap(Request $request){
        if($request->id){
            $id=$request->id;
            $dbfilm=DB::table("film")->where("id_film",$id)->select(['id_film','name_slug','episode'])->get();
            return response($dbfilm);
        }
        return view("layoutAdmin.detailLayout.sitemap");
    }
    

    protected function convert_vi_to_en($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        return strtolower($str);
    }
}
