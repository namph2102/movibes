@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="{{asset("admin/css/addaccount.css")}}">
<title>Thêm thành viên mới |MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.users')}}">User Profile</a> 
    > <a href="javascript:void(0)">Add Account</a>
@endsection


@section('container')

@section('container')
<div class="container_content">
    <h3 class="container_content-products">Nạp tiền cho id: </h3>
    <div class="box_message">
        @if(!empty($message)) <h2>{{$message}}</h2> @endif
     </div>
    <form class="form_create_profile" method="POST" action="{{route("topup.naptien")}}" >
    @csrf
            <input type="text" hidden name="submitform" value="2">
        <table class="form_create_table">
            <tr>
                <td class="forn_create_head">Id *</td>
                <td><input type="text" readonly name="id" value="{{$id}}" placeholder="Id bên nạp tiền">
                </td>
            </tr>

            <tr>
                <td class="forn_create_head">IdUser *</td>
                <td><input type="text" name="iduser" value="{{$dbuser->id}}" placeholder="Id user tài khoản">
                </td>
            </tr>

            <tr>
                <td class="forn_create_head">Tên *</td>
                <td><input type="text" readonly name="name" value="{{$dbuser->name}}" placeholder="Tên người nạp">
                </td>
            </tr>

            <tr>
                <td class="forn_create_head">Top Up* </td>
                <td><input type="text" name="coin" id="coin" required
                        placeholder="Nhập số tiền" value="0"></td>
            </tr>

         
        </table>
        <div class="container_footer">
            <button type="submit" name="duyet_user"  value="2">Duyệt tiền</button>
            <button type="submit" name="error_user"  value="2">Duyệt Thất bại</button>
            <button type="submit" name="topup_user" style="background-color:rgb(36, 230, 19);" value="2">Nạp tiền</button>
            <button type="button" name="back_user" value="2"><a href="{{route('topup.show')}}">Come Back</a></button>
        </div>
    </form>
</div>

@endsection


@section('js')

@endsection