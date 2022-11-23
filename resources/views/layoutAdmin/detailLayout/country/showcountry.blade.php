@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Trang Quản Trị Quốc Gia| MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route("country.show")}}">Danh sách Quốc gia</a>
@endsection
@section('style')
<style>
    .film__style-left{
        text-align: left;
        text-transform: capitalize;
}
</style>
@endsection
@section('container')
<div class="manager_member">
    <div class="box_message">
        @if(!empty($message)) <h2>{{$message}}</h2> @endif
     </div>

    <form class="manager_member-content">
        <button name="newaccount" value="2"><a href="{{route("country.add")}}">Thêm Quốc Gia</a></button>
    </form>

    <form class="form_member">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Name Slug</th>
                    <th colspan="1">Operation</th>
                </tr>
            </thead>
                <tbody>
                   
            
                @foreach ($dbcountry as $contry)
                <tr>
                    <td>{{$contry->id_quocgia}}</td>
                    <td>{{$contry->name_quocgia}}</td>
                    <td>{{$contry->quocgia_slug}}</td>
                    <td><a href="{{route("country.add",["action"=>"change","id"=>$contry->id_quocgia])}}"><i class="fa-solid fa-pen-to-square"></i> </a></td>

                </tr>
                @endforeach
               
            </tbody>
        </table>        
    </form>
    <div class="direction_profile">
        {{$dbcountry->links()}}
    </div>
</div>
@endsection
@section('js')

@endsection