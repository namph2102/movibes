@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Trang Quản lý Phim | MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.films')}}">Manager Films</a>
    > <a >Show All Films</a>
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
    <div class="manager_member-head" action="">
        <div>
            <button name="members" class="members" value="2"><a href="{{route('film.add')}}">ADD FILM</a></button>
            <button name="members" class="members" value="2"><a href="{{route('film.find')}}">Find FILM</a></button>
        </div>
        <div >
            <h4>Total films: <span> {{$total_fiml}}</span></h4>
            <h4>Total Trailer: <span> {{$total_trailer}}</span></h4>
        </div>
    </div>
    <div class="box_message">
        @if(!empty($message)) <h2>{{$message}}</h2> @endif
     </div>

    <form class="form_member" action="">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Kinds</th>
                    <th>Curent</th>
                    <th>Views</th>
                    <th>Votes</th>
                    <th colspan="2">Operation</th>
                    <th colspan="2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dbfimls as $film)
                <td><img src="{{$film->thumb_url}}" alt=""></td>
                <td class="film__style-left">{{$film->name}}</td>  
                <td>
                    <?php
                        switch ($film->status) {
                            case 0:
                             echo "Remain";
                                break;
                            case 1:
                             echo "Finished";
                                break;
                            case 2:
                            echo " Trailer";
                                break;
                            case 3:
                            echo "Phim lẻ";
                                break;
                            case 4:
                            echo "Phim Bộ";
                                break;
                            case 5:
                            echo "Phim Chiếu Rạp";
                                break;
                            default:
                            echo "Chưa xác định";
                                break;
                        }   
                    ?>    
                </td>             
                <td>{{number_format($film->episode_current)}}</td>
                <td>{{number_format($film->views)}}</td>
                <td>{{number_format($film->votes)}}</td>

                 
                <td title="Chỉnh sửa phim {{$film->name}}"><a href="{{route('film.edit',["id"=>$film->id_film])}}"><i
                    class="fa-solid fa-pen-to-square"></i></a></td>
                 <td title="Danh sách tập phim {{$film->name}}"><a href="{{route("film.listesopide",["id"=>$film->id_film])}} "><i class="fa-solid fa-film"></i></a></td>
                 <td title="Xóa phim {{$film->name}}"><a href="{{route('film.edit',["id"=>$film->id_film,"action"=>"delete"])}}"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
                @endforeach
            </tbody>
        </table>
              
    </form>

    <div class="direction_profile">
         {{   $dbfimls->links()}}
    </div>

</div>

@endsection
@section('js')

@endsection