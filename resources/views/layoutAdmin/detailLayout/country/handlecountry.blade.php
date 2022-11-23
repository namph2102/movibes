@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/addaccount.css")}}">
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Thay đổi Profile</title>
@endsection

@section('direction')
<a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route("country.show")}}">Danh sách Quốc gia</a>
> <a>Xử lý Quốc Gia</a>
@endsection
@section('container')
<div class="box_message">
   @if(!empty($message)) <h2>{{$message}}</h2> @endif
</div>
<div class="container_content">
    <form class="form_create_profile" method="POST" action="{{route("country.add")}}"  >
        @csrf
        <input type="text" hidden name="id" value="{{empty($dbcountry->id_quocgia)?"":$dbcountry->id_quocgia}}">
        <table class="form_create_table" >
            <tr>
                <td class="forn_create_head">name_quocgia *</td>
                <td><input type="text" required value="{{empty($dbcountry->name_quocgia)?"":$dbcountry->name_quocgia}}"  name="name"></td>
            </tr>
        </table>
        <div class="container_footer">
            <button type="submit" name="change_country" value="2">Thay đổi Country</button>
            <button type="submit" style="background-color:rgb(36, 230, 19);" name="add_country" value="2">Thêm mới Country</button>
            <button type="button" name="back_Icons" value="2"><a href="{{route('country.show')}}">Come Back</a></button>
        </div>
       
    </form>
</div>


@endsection