@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Trang Quản icons| MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route("catelory.show")}}">Show Icons</a>
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
        <button name="newaccount" value="2"><a href="{{route("catelory.add")}}">Thêm Catelory</a></button>
    </form>

    <form class="form_member">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="1">Operation</th>
                </tr>
            </thead>
            
                @foreach ($dbcategory as $cate)
                <tr>
                    <td>{{$cate->id_cate}}</td>
                    <td>{{$cate->name_cate}}</td>
                    <td><a href="{{route("catelory.show",["action"=>"change","id"=>$cate->id_cate])}}"><i class="fa-solid fa-pen-to-square"></i> </a></td>
                </tr>
                @endforeach
               
            </tbody>
        </table>        
    </form>
    <div class="direction_profile">
        {{$dbcategory->links()}}
    </div>
</div>
@endsection
@section('js')

@endsection