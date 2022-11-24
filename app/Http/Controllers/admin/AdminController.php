<?php

namespace App\Http\Controllers\admin;

use App\Models\AdminModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LDAP\Result;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view("layouts.login");
    }
    public function AdminDashBoard()
    {
        $dbadmin = new AdminModel();
        $dbfiml = $dbadmin->dashboard();
        return view("layoutAdmin.detailLayout.home", compact('dbfiml'));
    }
    public function AdminUsers()
    {
        $dbuser = DB::table("users")->paginate(5);
        $total_user = DB::table("users")->count();
        $total_coin = DB::table("users")->where('coin', '>', 0)->count();
        return view("layoutAdmin.detailLayout.users", compact("dbuser", "total_coin", "total_user"));
    }
    public  function changeProfile(Request $request)
    {
        $id = $request->id;
        $check = false;
        $message = '';
        if ($request->password) {
            $dbuser = DB::table("users")->where('id', $id)->update(['password' => password_hash($request->password, null)]);
            $check = true;
        }
        if ($request->fullname) {
            $dbuser = DB::table("users")->where('id', $id)->update(['name' => $request->fullname]);
            $check = true;
        }
        if ($request->phone) {
            $dbuser = DB::table("users")->where('id', $id)->update(['phone' => $request->phone]);
            $check = true;
        }
        if ($check) {
            $message = 'Thay đổi thành công thông tin tài khoản id: ' . $id;
        }
        if ($request->icons) {
            DB::table("user_icon")->insert(["id_user" => $id, "id_icon" => $request->icons]);
            $message = 'Thêm icon thành công cho id:: ' . $id;
        }
        $dbuser = DB::table("users")->where('id', $id)->first();
        $dblistIcon = DB::table("icons")->get();
        $dbuserhave = DB::table("user_icon")->where("id_user", $id)->get();
        return view("layoutAdmin.detailLayout.users.changeAccount", compact("dbuser", "dbuserhave", "dblistIcon", "message"));
    }

    public function deleteProfile(Request $request)
    {
        $id = $request->id;
        DB::table('users')->where('id', $id)->delete();
        DB::table('user_icon')->where('id_user', $id)->delete();
        DB::table('notice')->where('id_user', $id)->delete();
        DB::table('hand__napthe')->where('id_user', $id)->delete();
        DB::table('exps_reward')->where('id_user', $id)->delete();
        DB::table('comments')->where('id_user', $id)->delete();
        DB::table('bookmarks')->where('id_user', $id)->delete();
        DB::table('baocao_loi')->where('id_user', $id)->delete();
        return redirect()->route("admin.users");
    }
    public function findProfile(Request $request)
    {
        $dbuser = [];
        $message = '';
        $check = false;
        if ($request->email) {
            $dbuser = DB::table("users")->where('email', $request->email)->get();
            $check = true;
        }
        if ($request->phone) {
            $dbuser = DB::table("users")->where('phone', $request->phone)->get();
            $check = true;
        }
        
        if ($request->permission) {
            $dbuser = DB::table("users")->where('permission', $request->permission)->get();
            $check = true;
        }
        if ($check) {
            if (!count($dbuser)) {
                $message = 'Không tim thấy thông tin bạn cần tìm!';
            } else {
                $message = 'Đã tìm thấy thông tin tài khoản!';
            }
        }
        return view("layoutAdmin.detailLayout.users.findmember", compact("dbuser", "message"));
    }

    //ajax
    public function resetExps()
    {
        DB::table('exps_reward')->truncate();
        DB::table('notice')->truncate();
        return response(true);
    }

    public function addProfile(Request $request)
    {
        $dbadmin = new AdminModel();
        $message = '';
        $email = '';
        $fullname = '';
        $phone = '';
        if ($request->email) {
            $email = $request->email;
            $password = password_hash($request->password, null);
            $phone = $request->phone;
            $fullname = $request->fullname;
            $token = $request->_token;
            $avata = $request->upLoadAvata;
            $result = $dbadmin->addprofile($email, $password, $phone, $fullname, $token, $avata);
            if ($result) {
                $message = "Thêm thành công tài khoản:" . $email . "";
            } else {
                $message = "Tài khoản đã tồn tại !";
            }
        }
        return view("layoutAdmin.detailLayout.users.addAccount", compact("message", "phone", "fullname", "email"));
    }


    // xử lý fiml 

    public function AdminFimls()
    {
        $dbfimls = DB::table("film")->orderByDesc('views')->paginate(10);
        $total_fiml = DB::table("film")->count();
        $total_trailer = DB::table("film")->where('status', 2)->count();
        return view("layoutAdmin.detailLayout.films.showfiml", compact("dbfimls", "total_fiml", "total_trailer"));
    }
    protected function handImg($id, $kind, $nameimg)
    {
        $target_dir = '/avata/';
        $target_file = $target_dir . uniqid() . '-' .  ($_FILES[$nameimg]["name"]);
        $imgold = public_path() . DB::table('film')->where('id_film', $id)->first()->$kind;
        if (file_exists($imgold)) {
            unlink($imgold);
        }
        if (move_uploaded_file($_FILES[$nameimg]["tmp_name"], public_path() . $target_file)) {
            DB::table('film')->where('id_film', $id)->update([$kind => $target_file]);
        }
    }
    public function editfilm(Request $request)
    {
        $category = DB::table("category")->get();
        $id = $request->id;
        $message = '';
        if ($request->action == "delete") {
            $message = "Xóa thành công phim có id: " . $id;
            DB::table("film")->where("id_film", $id)->delete();
            DB::table("film_detail")->where("id_filmDetail", $id)->delete();
            DB::table("baocao_loi")->where("id_film", $id)->delete();

            DB::table('comments')->where('id_film', $id)->delete();
            DB::table('bookmarks')->where('id', $id)->delete();

            DB::table('exps_reward')->where('id_film', $id)->delete();
            DB::table('stars')->where('id_film', $id)->delete();

            $dbfimls = DB::table("film")->orderByDesc('views')->paginate(10);
            return view("layoutAdmin.detailLayout.films.showfiml", compact('dbfimls', 'message'));
        }
        if ($request->action != "add" && ($request->poster || $request->thumb)) {
            if ($request->poster) {
                $this->handImg($id, 'poster_url', "poster");
            }
            if ($request->thumb) {
                $this->handImg($id, 'thumb_url', "thumb");
            }
            $message = 'Thay đổi ảnh thành công!';
            $dbfiml = DB::table("film")->where('id_film', $id)
                ->leftJoin('quocgia', 'quocgia.id_quocgia', '=', 'film.quocgia')
                ->first();
            $dbcountry = DB::table("quocgia")->get();
            return view("layoutAdmin.detailLayout.films.editfilm", compact('dbfiml', 'category', 'dbcountry', "message"));
        }

        if ($request->create_form) {

            $dbadmin = new AdminModel();
            $name = $request->name;
            $origin = $request->origin;
            $slug = str_replace(" ","-",$this->convert_vi_to_en($name));
            $theloaiphim = $request->theloaiphim;
            $time = $request->time;
            $status = $request->status;
            $year = $request->year;
            $episode = $request->episode;
            $episode_current = $request->episode_current;
            $quocgia = $request->quocgia;
            $openday = $request->openday;
            $Catetory = $request->Catetory;
            $des = $request->des;
            $desseo = $request->desseo;
            $descanhgioi = $request->descanhgioi;
            $desnguoithan = $request->desnguoithan;

            if ($request->action == "add") {
                $dbadmin->handFilm("add", $id, $name, $origin, $slug,$theloaiphim, $time, $year, $status, $episode, $episode_current, $quocgia, $openday, $Catetory, $des, $desseo, $descanhgioi, $desnguoithan);
                $message = "Thêm phim thành công : " . $name;
            } else {
                $dbadmin->handFilm("update", $id, $name, $origin, $slug,$theloaiphim, $time, $year, $status, $episode, $episode_current, $quocgia, $openday, $Catetory, $des, $desseo, $descanhgioi, $desnguoithan);
                $message = "Update Thành công thông tin Phim: " . $name;
            }
        }

        $dbfiml = DB::table("film")->where('id_film', $id)
            ->leftJoin('quocgia', 'quocgia.id_quocgia', '=', 'film.quocgia')
            ->first();
        // dd($dbfiml);
        $dbcountry = DB::table("quocgia")->get();
        return view("layoutAdmin.detailLayout.films.editfilm", compact('dbfiml', 'category', 'dbcountry', 'message'));
    }
    public function addfilm(Request $request)
    {
        $id = (DB::table("film")->orderByDesc('id_film')->first()->id_film) + 1;
        $category = DB::table("category")->get();
        $dbcountry = DB::table("quocgia")->get();
        $message = "";
        return view("layoutAdmin.detailLayout.films.addfilm", compact('category', 'message', 'dbcountry', 'id'));
    }
    public function listesopide(Request $request)
    {
        $message = '';
        $id = $request->id;
        $dblistesi = DB::table("film_detail")->where("id_filmDetail", $id)->orderBy('esp')->paginate(20);
        $dblistesi->appends(['id' =>  $id]);
        $dbfimls =  DB::table("film")->where("id_film", $id)->first();
        if ($request->update_form) {
            $linkold = public_path() . DB::table("film_detail")->where("id_filmDetail", $request->id)->where("esp", $request->esopide)->first()->hhd;
            if (file_exists($linkold)) {
                unlink($linkold);
            }
            if ($request->myvideo) {
                $target_dir = "/video/";
                $target_path = $target_dir . uniqid() . "-" . ($_FILES["myvideo"]["name"]);
                if (move_uploaded_file($_FILES["myvideo"]["tmp_name"], public_path() . $target_path)) {
                    $message = "Video upload thành công";
                    DB::table("film_detail")->where("id_filmDetail", $request->id)->where("esp", $request->esopide)->update(["hhd" => $target_path, "vip" => $request->linkvip]);
                }
                $message = "Update thành công link phim có id :" . $request->id . " Tập " . $request->esopide;
            } else {
                DB::table("film_detail")->where("id_filmDetail", $request->id)->where("esp", $request->esopide)->update(["hhd" => $request->linkhhd, "vip" => $request->linkvip]);
                $message = "Update thành công link phim có id :" . $request->id . " Tập " . $request->esopide;
            }
        }
        if ($request->change) {
            $dblistesi = DB::table("film_detail")->where("id_deltail", $request->change)->first();
            return view("layoutAdmin.detailLayout.films.changeesopide", compact('dblistesi', "dbfimls", 'message'));
        }
        return view("layoutAdmin.detailLayout.films.listesopice", compact('dblistesi', "dbfimls", 'message'));
    }

    public function esopideAdd(Request $request)
    {
        $message = '';

        $id = $request->id;
        // danh sách phim
        if ($request->update_film && (trim($request->listvip) != "NULL" || trim($request->listhhd) != "NULL")) {
           if(trim($request->listvip)!="NULL" && trim($request->listhhd) != "NULL"){
            $arrayvip= explode("*", $request->listvip);//m3u8
            $arrayhhd= explode("*", $request->listhhd);//linkembed
            for($i=0;$i<count($arrayvip);$i++){
                if(!empty(explode("|",$arrayhhd[$i])[0])){
                    DB::table("film_detail")->insert(["id_filmDetail" => $id, "esp" =>explode("|",$arrayhhd[$i])[0], "hhd" => explode("|",$arrayhhd[$i])[1], "vip" => explode("|",$arrayvip[$i])[1]]);
                }
                
            }
           }else if(trim($request->listvip)!="NULL"){
            $arrayvip= explode("*", $request->listvip);//m3u8
            for($i=0;$i<count($arrayvip);$i++){
                if(!empty(explode("|",$arrayvip[$i])[0])){
                    DB::table("film_detail")->insert(["id_filmDetail" => $id, "esp" =>explode("|",$arrayvip[$i])[0], "hhd" => "NULL", "vip" => explode("|",$arrayvip[$i])[1]]);
                }
            }
            }else if(trim($request->listhhd)!="NULL"){
                $arrayhhd= explode("*", $request->listhhd);//linkembed
                for($i=0;$i<count($arrayhhd);$i++){
                    if(!empty(explode("|",$arrayhhd[$i])[0])){
                        DB::table("film_detail")->insert(["id_filmDetail" => $id, "esp" =>explode("|",$arrayhhd[$i])[0], "hhd" =>  explode("|",$arrayhhd[$i])[1], "vip" =>"NULL"]);
                    }
            }
             
          }
          date_default_timezone_set("Asia/Ho_Chi_Minh");
          $date = date("Y-m-d H:i:s", time());
          $count=DB::table("film_detail")->where("id_filmDetail",$id)->count();
          $message = "Thêm Nhiều tập phim mới thành công ";
          DB::table("film")->where("id_film",$id)->update(["episode_current"=>$count,"update_atfilm" => $date]);
        }
        if ($request->update_film &&  trim($request->listvip) == "NULL"  && trim($request->listhhd) == "NULL") {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $date = date("Y-m-d H:i:s", time());
            $linkvip = 'NULL';
            if ($request->linkvip) {
                $linkvip = $request->linkvip;
            }
            $linkhhd = 'NULL';
            if ($request->linkhhd) {
                $linkhhd = $request->linkhhd;
            }
            if ($request->myvideo) {
                $target_dir = "/video/";
                $target_path = $target_dir . uniqid() . "-" . ($_FILES["myvideo"]["name"]);
                if (move_uploaded_file($_FILES["myvideo"]["tmp_name"], public_path() . $target_path)) {
                    $message = "Video upload thành công";
                    DB::table("film_detail")->insert(["id_filmDetail" => $id, "esp" => $request->esopide, "hhd" => $target_path, "vip" => $linkvip]);
                    DB::table("film")->where('id_film', $id)->increment('episode_current', 1);
                    DB::table("film")->where('id_film', $id)->update(["update_atfilm" => $date]);
                }
            } else {
                if (trim($linkhhd) == "NULL" && trim($linkvip) == "NULL") {
                    $message = "UPLOAD THẤT BẠI !";
                } else {

                    DB::table("film")->where('id_film', $id)->increment('episode_current', 1);
                    DB::table("film")->where('id_film', $id)->update(["update_atfilm" => $date]);
                    DB::table("film_detail")->insert(["id_filmDetail" => $id, "esp" => $request->esopide, "hhd" => $linkhhd, "vip" => $linkvip]);
                    $message = "Thêm tập mới thành công ";
                }
            }
        }
        $dbfiml = DB::table("film")->where('id_film', $id)
            ->leftJoin('quocgia', 'quocgia.id_quocgia', '=', 'film.quocgia')
            ->first();
        $dbcountry = DB::table("quocgia")->get();
        $dbfimlDetail = DB::table("film_detail")->where('id_filmDetail', $id)->orderByDesc('esp')->first();
        return view("layoutAdmin.detailLayout.films.addesopide", compact('dbfiml', 'dbfimlDetail', 'dbcountry', 'message'));
    }

    public function findfilm(Request $request)
    {
        $film = '';
        $message = "";
        if ($request->findfilm) {
            $film = DB::table("film")->where("id_film", $request->findid)->first();
            $message = "Đã tìm thấy phim : " . $film->name;
        }
        return view("layoutAdmin.detailLayout.films.findfiml", compact('film', 'message'));
    }
    protected function handTopup($id, $userid, $coin = null, $status)
    {
        if ($coin == null) {
            $coin = DB::table("hand__napthe")->where("id", $id)->first()->coin;
        } else {
            $coin = DB::table("hand__napthe")->where("id", $id)->update(["coin" => $coin]);
        }
        if ($status) {
            $point = 0;
            if ($coin > 0) $point = round($coin / 5);
            $point = round($point / 100);
            echo "--------------------------Điểm thưởng-----------" . $point . "---Số tiền---" . $coin;

            DB::table("users")->where("id", $userid)->increment('exps', $point);
            DB::table("users")->where("id", $userid)->increment('coin', $point);
            DB::table("users")->where("id", $userid)->increment('lv_vip', $point);

            DB::table("hand__napthe")->where("id", $id)->update(["status" => "Thành công"]);
            DB::table("notice")->insert(["id_user" => $userid, "kind_notice" => 2, "message" => ("Bạn nạp Thành công: <span class=" . "text-warning" . ">" . number_format($coin) . "</span> VND")]);

            $lv_vip = DB::table("users")->where("id", $userid)->first()->lv_vip;
            $listvip = [22, 21, 20, 19, 18, 17, 16, 15, 14, 13];
            $index = null;

            if ($lv_vip >= 15000) {
                $index = 0;
            } else if ($lv_vip >= 12000) {
                $index = 1;
            } else if ($lv_vip >= 10000) {
                $index = 2;
            } else if ($lv_vip >= 9400) {
                $index = 3;
            } else if ($lv_vip >= 8000) {
                $index = 4;
            } else if ($lv_vip >= 6200) {
                $index = 5;
            } else if ($lv_vip >= 4500) {
                $index = 6;
            } else if ($lv_vip >= 3000) {
                $index = 7;
            } else if ($lv_vip >= 2000) {
                $index = 8;
            } else if ($lv_vip >= 1000) {
                $index = 9;
            }
            if ($index) {
                foreach ($listvip as $icon) {
                    if (DB::table("user_icon")->where("id_user", $userid)->where("id_icon", $icon)->exists()) {
                        $id_check = DB::table("user_icon")->where("id_user", $userid)->where("id_icon", $icon)->first()->user_icon;
                        DB::table("user_icon")->where("user_icon", $id_check)->delete();
                    }
                }
                DB::table("notice")->insert(["id_user" => $userid, "kind_notice" => 3, "message" => ("Chúc mừng bạn đã dạt được danh hiệu <span class=" . "text-warning" . ">thành viên VIP" . "</span>")]);
                DB::table("users")->where("id", $userid)->update(["permission" => "vip"]);
                DB::table("user_icon")->insert(["id_user" => $userid, "id_icon" => $listvip[$index]]);
            }
        } else {
            DB::table("hand__napthe")->where("id", $id)->update(["status" => "Thất Bại"]);
            DB::table("notice")->insert(["id_user" => $userid, "kind_notice" => 2, "message" => ("Bạn nạp thất bại: <span class=" . "text-warning" . ">" . number_format($coin) . "</span> VND")]);
        }
    }

    public function  showtopup(Request $request)
    {
        $message = '';
        if ($request->action) {
            $id = $request->id;
            $userid = $request->userid;
            $action = $request->action;
            if ($action == "success") {
                $this->handTopup($id, $userid, null, true);
                $message = 'Đã xử lý Thành công!';
            } else if ($action == "fail") {
                $this->handTopup($id, $userid, null, false);
                $message = 'Đã xử lý thất bại !';
            }
        }
        $dbtopup = DB::table("hand__napthe")->where("status", "Chờ xử lý")->orderByDesc('ngaytao')->paginate(6);
        return view("layoutAdmin.detailLayout.coins.showtopup", compact('dbtopup', 'message'));
    }

    public function topUpAccount(Request $request)
    {
        $message = '';
        $iduser = $request->iduser;
        $id = $request->id;
        if ($request->submitform) {
            $id = $request->id;
            $userid = $request->iduser;
            $coin = $request->coin;
            if ($request->duyet_user) {
                $this->handTopup($id, $userid, $coin, true);
                $message = 'Duyệt tiền Thành công!';
            } else if ($request->error_user) {
                $this->handTopup($id, $userid, $coin, false);
                $message = 'Duyệt tiền thất bại !';
            } else if ($request->topup_user) {
                $idran = uniqid();
                DB::table("hand__napthe")->insert(["id_user" => $userid, "coin" => $coin, "maThanhToan" => $idran]);
                $id = DB::table("hand__napthe")->where("maThanhToan", $idran)->first()->id;
                $this->handTopup($id, $userid, $coin, true);
                $message = 'Nạp tiền cho tài khoản: ' . $userid . " Thành công !";
            }
        }


        $dbuser = DB::table("users")->where("id", $iduser)->first();
        return view("layoutAdmin.detailLayout.coins.topupuser", compact('dbuser', 'message', 'id'));
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
