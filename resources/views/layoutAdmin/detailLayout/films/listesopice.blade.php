@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Trang Quản lý Phim | MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.films')}}">Manager Films</a>
    ><a >Films : {{$dbfimls->name}}</a>
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
            <h4>Total Esopide : <span>{{$dbfimls->episode}} </span></h4>
            <h4>Total Curent: <span>{{$dbfimls->episode_current}}  </span></h4>
        </div>
    </div>
    <h2> <span>Films: {{$dbfimls->name}}</span></h2>
    <form class="manager_member-content">
       
        <button name="newaccount" value="2"><a href="{{route("esopide.add",["id"=>$dbfimls->id_film])}}">Add Esopide</a></button>
    </form>

    <form class="form_member" action="">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Esopide</th>
                    <th >Operation</th>
    
                </tr>
            </thead>

            <tbody>
                @foreach ($dblistesi as $esopide)
                <tr>
                    <td>{{$esopide->id_deltail}}</td>
                    <td>Tập {{$esopide->esp}}</td>
                  <td><a href="{{route("film.listesopide",["change"=>$esopide->id_deltail,"id"=>$dbfimls->id_film])}}"><i
                      class="fa-solid fa-pen-to-square"></i></a></td>
              </tr>
                @endforeach
               
            </tbody>
        </table>
              
    </form>
    <div class="direction_profile">
      {{$dblistesi->links()}}
    </div>
</div>
@endsection
@section('js')

@endsection