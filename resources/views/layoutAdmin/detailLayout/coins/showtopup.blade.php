@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Trang Quản lý Phim | MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="javascript:void(0)">Coin</a>
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
    <h2 style="text-align: center;"> <span>Danh sách nạp tiền </span></h2>
    <form class="manager_member-content">
       
        <button name="newaccount" value="2"><a href=" ">Add Coins</a></button>
    </form>

    <form class="form_member" action="">
        <table>
            <thead>
                <tr>
                    <th>Mã giao dịch</th>
                    <th>PT Thanh toán</th>
                    <th>Coin</th>
                    <th>Thẻ card</th>
                    <th>Thời gian</th>
                    <th>Trạng thái</th>
                    <th colspan="3">Operation</th>
                </tr>
            </thead>

            <tbody>
                  @foreach ($dbtopup as $topup)
                  <tr>
                    <td>#{{ $topup->maThanhToan}}</td>
                    <td>{{ $topup->nameBank}}</td>
                    <td>{{ number_format($topup->coin)}}</td>
                     <td>{{ $topup->loaiThe}} <br> MT:{{ $topup->maThe}}-SR:{{ $topup->seri}}</td>
                    <td>{{date("d/m/Y",strtotime($topup->ngaytao))}} <br> {{date("H:i:s",strtotime($topup->ngaytao))}}</td>
                    <td>{{ $topup->status}} </td>
                    <td><button><a href="{{route("topup.naptien",["action"=>"addmomo","id"=>$topup->id,"iduser"=> $topup->id_user])}}">Top Up</a></button></td>
                    <td><button class="success_topup"><a href="{{route("topup.show",["id"=> $topup->id,"userid"=> $topup->id_user ,"action"=>"success"])}}">Thành công</a></button></td>
                    <td><button class="error_topup"><a href="{{route("topup.show",["id"=> $topup->id,"userid"=> $topup->id_user,"action"=>"fail"])}}">Thất bại</a></button></td>
                </tr>

                @endforeach          
               
            </tbody>
        </table>
              
    </form>
    <div class="direction_profile">
        {{$dbtopup->links()}}
    </div>
</div>
@endsection
@section('js')

@endsection