@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Trang Quản icons| MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.films')}}">Show Icons</a>
    >
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
    <div class="manager_member-head">
        <div >
            <h4>Total Icons : <span> </span></h4>
        </div>
    </div>

    <form class="manager_member-content">
        <button name="newaccount" value="2"><a href="{{route("icons.add")}}">Thêm Icon</a></button>
    </form>

    <form class="form_member">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th >Level</th>
                    <th>Image</th>
                    <th colspan="2">Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dbicons as $icon)
                <tr>
                    <td>{{ $icon->id_icon}}</td>
                    <td>{{ $icon->name_icon}}</td>
                    <td>{{ $icon->Level}}</td>
                    <td><img src="{{ $icon->link}}"></td>
                    <td><a href="{{route("icons.show",["action"=>"change","id"=>$icon->id_icon])}}"><i class="fa-solid fa-pen-to-square"></i> </a></td>
                    <td><a href="{{route("icons.show",["action"=>"delete","id"=>$icon->id_icon])}}"><i class="fa-solid fa-trash-can"></i> </a></td>
                </tr>
                @endforeach
             
               
            </tbody>
        </table>
              
    </form>
    <div class="direction_profile">
        {{$dbicons->links()}}
    </div>
</div>
@endsection
@section('js')

@endsection