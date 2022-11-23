@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/addaccount.css")}}">
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Thay đổi Profile</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('icons.show')}}">Show icons</a> 
    > <a>Change Icons</a>
@endsection
@section('container')
<div class="box_message">
   @if(!empty($message)) <h2>{{$message}}</h2> @endif
</div>
{{-- <p>{{var_dump($dbuser)}}</p> --}}
<div class="container_content">
    <h4 class="container_content-name">UPDATE ICONS</h4>

    <form class="form_create_profile" method="POST" action="{{route("catelory.show")}}"  >
        @csrf
        <input type="text" hidden name="add" value="2">
        <table class="form_create_table" >
            <tr>
                <td class="forn_create_head">id_cate *</td>
                <td><input type="text"  value="{{empty($category->id_cate)?"":$category->id_cate}}"  name="id"></td>
            </tr>

            <tr>
                <td class="forn_create_head">name_cate *</td>
                <td><input type="text" required value="{{empty($category->name_cate)?"":$category->name_cate}}"  name="name"></td>
            </tr>
        </table>
        <div class="container_footer">
            <button type="submit" name="change_Icons" value="2">Change Icons</button>
            <button type="submit" style="background-color:rgb(36, 230, 19);" name="add_icons" value="2">Add Icons</button>
            <button type="button" name="back_Icons" value="2"><a href="{{route('icons.show')}}">Come Back</a></button>
        </div>
       
    </form>
</div>


@endsection