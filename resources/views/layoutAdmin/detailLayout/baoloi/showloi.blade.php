@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Trang Quản Lỗi phim | MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="javascript:void(0)">Báo lỗi</a>
@endsection
@section('style')
<style>
    .film__style-left{
        text-align: left;
        text-transform: capitalize;
}
.form_member .success_topup{
    background-color: rgb(14, 126, 14);
}
.form_member .error_topup{
    background-color: rgb(128, 28, 28);
}
</style>
@endsection
@section('container')
<div class="manager_member">
    <div class="box_message">
        @if(!empty($message)) <h2>{{$message}}</h2> @endif
     </div>
    <div class="manager_member-head">
    </div>
    <h2 style="text-align: center;"> <span>Danh sách Lỗi </span></h2>
    <form class="form_member" action="">
        <table>
            <thead>
                <tr>
                    <th>ID Phim</th>
                    <th>Tập phim</th>
                    <th>Id user</th>
                     <td>Nội dung lỗi</td>
                    <th colspan="2">Operation</th>
                </tr>
            </thead>

            <tbody>
                 @foreach ($dbloi as $loi)
                     <tr>
                         <td>{{$loi->id_film}}</td>
                         <td>{{$loi->esopide}}</td>
                         <td>{{$loi->id_user}}</td>
                         <td>{{$loi->comments}}</td>
                         <td><button><a href="{{route("baoloi.show",["action"=>"duyet","userid"=>$loi->id_user,"id"=>$loi->id_error])}}">Duyệt</a></button></td>
                         <td><button class="admin"><a href="{{route("baoloi.show",["action"=>"khongduyet","id"=>$loi->id_error])}}">Không duyệt</a></button></td>
                     </tr>
                 @endforeach
                 

           
            </tbody>
        </table>
              
    </form>
    <div class="direction_profile">
      
    </div>
</div>
@endsection
@section('js')

@endsection