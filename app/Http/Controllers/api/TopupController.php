<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopupController extends Controller
{
    protected function random($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    

    protected  function curl_get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    protected function insertHandNapthe($id_user,$coin=0,$mathanhtoan,$loaithe=0,$seri=0,$mathe=0,$nameBank){
        DB::table("hand__napthe")->insert(["id_user"=>$id_user,"coin"=>$coin, "maThanhToan"=>$mathanhtoan, "loaiThe"=>$loaithe, "seri"=>$seri, "maThe"=>$mathe, "nameBank"=>$nameBank]);
        return true;
    }
    public function checkthecao(Request $request)
    {
        // xử lý nạp thẻ cào
        $mathe = $request->mathe;
        $seri = $request->seri;
        $loaithe = $request->loaithe;
        $menhgia = $request->menhgia;
        $user = $request->userid;
        $mathanhtoan=$this->random(8);
        $ranid=rand(111111111,999999999);
        $res=[
            "data"=>"",
            "notice"=>"Hệ thống đang xử lý...",
            "status"=>100
        ];
        if(strlen($mathe)<10 || strlen($mathe)>16 ) {
            $res=[
                "data"=>"",
                "notice"=>"Mã thẻ: <code>".$mathe."</code> không hợp lệ !",
                "status"=>404
            ];
            return response($res);
        } else if(strlen($seri)<10 || strlen($seri)>16){
            $res=[
                "data"=>"",
                "notice"=>"Số Seri: <code>".$seri."</code> không hợp lệ !",
                "status"=>404
            ];
            return response($res);
        }
        $this->insertHandNapthe($user,$menhgia,$mathanhtoan,$loaithe,$seri,$mathe,"Nạp Thẻ");
        $data=["mathe"=>$mathe,"seri"=>$seri,"menhgia"=>$menhgia,"mathanhtoan"=>$mathanhtoan,"ngaytao"=>date("d/m/y H:i:s")];
        $res=[
            "data"=>  $data,
            "notice"=>"Hệ thống đang xử lý thẻ...",
            "status"=>100
        ];
        $partner_id = '2767070643';
        $partner_key = 'd960218ed2b623d804e527a6ac7e2c2f';
        $restopup = $this->curl_get('https://thesieure.com/chargingws/v2?sign=' . md5($partner_key . $mathe . $seri) . '&telco=' . $loaithe . '&code=' . $mathe . '&serial=' . $seri . '&amount=' . $menhgia . '&request_id=' . $ranid . '&partner_id=' . $partner_id . '&command=charging');
        if(isset($restopup['status'])){
            if($restopup['status']==99){
                DB::table("napthe")->insert(["id_user"=>$user,"mathanhtoan"=>$mathanhtoan,"hinhThuc"=>("Nạp Thẻ ".$loaithe),"coin"=>$menhgia]);
                $res=[
                    "data"=>DB::table('napthe')->where("mathanhtoan",$mathanhtoan)->get(),
                    "notice"=>$restopup,
                    "status"=>200
                ];
            }
            else{
                $res=[
                    "data"=>"",
                    "notice"=>$restopup['message'],
                    "status"=>400
                ];
            }
           
        }
        return response($res);
       
    }

    public function checkpaybank(Request $request){
         // xử lý nạp thẻ cào
         $coin = $request->coin;
         $magiaodich = $request->magiaodich;
         $pthuong = $request->pt;
         $user = $request->userid;
        //  $id_user,$coin=0,$mathanhtoan,$loaithe=0,$seri=0,$mathe=0,$nameBank,$viDienTu
         $this->insertHandNapthe($user,$coin,$magiaodich,0,0,0,$pthuong);
         return response(['notice'=>"Liên Hệ với Admin để xác nhận sớm nhé !"]);
    }

    public function check_codepay(Request $request){
        // xử lý nạp thẻ cào
        $coin = $request->coin;
        $magiaodich = $request->magiaodich;
        $pthuong = $request->pt;
        $user = $request->userid;
       //  $id_user,$coin=0,$mathanhtoan,$loaithe=0,$seri=0,$mathe=0,$nameBank,$viDienTu
        $this->insertHandNapthe($user,$coin,$magiaodich,0,0,0,$pthuong);
        return response(['notice'=>"Liên Hệ với Admin để xác nhận sớm nhé !"]);
   }
   public function getHistory(Request $request){
    $user = $request->userid;
    $check= DB::table("hand__napthe")->where("id_user",$user)->exists();
    $db=["status"=>400];
    if($check){
        $data= DB::table("hand__napthe")->where("id_user",$user)->orderByDesc('ngaytao')->get();
        $db=["data"=> $data,"status"=>200];
    }
     return response( $db);
   }
}
