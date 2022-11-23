@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="{{asset("admin/css/addaccount.css")}}">
<title>Thêm thành viên mới |MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.users')}}">Show Fimls</a> 
    > <a href="javascript:void(0)">Find Film</a>
@endsection


@section('container')

@section('container')
<div class="box_message">
    @if(!empty($message)) <h2>{{$message}}</h2> @endif
 </div>

 <form class="form_create_profile" action="{{route("film.find")}}" method="POST">
    <table class="form_create_table">
        <tr>
            <td class="forn_create_head">Id Film *</td>
            <td><input  required type="text"  value="{{empty($film->id_film)?"":$film->id_film}}" name="findid" placeholder="Nhập id film" id="findid">
             

            </td>
        </tr>
    </table>
    @csrf
   <div>
    <div class="container_footer " style="flex:1;">
        <button type="submit" value="2" name="findfilm">Tìm Kiếm</button>
        <button type="button" name="comeback"><a href="{{route('admin.films')}}">Come Back</a></button>
    </div>
   </div>
 </form>

 @if(!empty($film))
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
         
        </tbody>
    </table>    
</form>
 @endif


@endsection


@section('js')

@endsection