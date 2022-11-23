<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
class TopupController extends Controller
{
    public function topup(){
        $dbusers = new UserModel();
        $users = $dbusers->getAllifmUser();
        $user_movibes ='';
        return view('layouts.topup',compact('user_movibes','users'));
    }
}
