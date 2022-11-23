@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/addaccount.css")}}">
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Thay đổi Profile</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.users')}}">User Profile</a> 
    > <a href="http://">Change User</a>
@endsection
@section('container')
<div class="box_message">
   @if(!empty($message)) <h2>{{$message}}</h2> @endif
</div>
{{-- <p>{{var_dump($dbuser)}}</p> --}}
<div class="container_content">
    <h3 class="container_content-name">Change Imformation User</h4>
    <h4 class="container_content-des">
        Email & password    
    </h4>
    <form class="form_create_profile" method="POST" action="{{route('profile.edit')}}" >
        @csrf
            <input type="text" hidden name="id" value="{{$dbuser->id}}">
        <table class="form_create_table" >
            <tr>
                <td class="forn_create_head">FullName *</td>
                <td><input type="text" name="fullname" id="username" value="{{$dbuser->name}}"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Phone *</td>
                <td><input type="text" name="phone" value="0{{$dbuser->phone}}" id="phone"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Email *</td>
                <td><input type="email" readonly name="email" value="{{$dbuser->email}}" id="email"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Password *</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td class="forn_create_head">User have icon *</td>
                <td><input type="text" readonly  value="@foreach ($dbuserhave as $have){{$have->id_icon}},@endforeach"></td>
            </tr>
           
            <tr>
                <td class="forn_create_head">Danh sách icon trên hệ thống*</td>
             <td>   <select name="icons" value="0"  id="">
                 @foreach ($dblistIcon as $icon)
                 <option value="{{$icon->id_icon}}">{{$icon->id_icon}} - {{$icon->name_icon}} - Lv:{{$icon->Level}}</option>
                 @endforeach
              
            </select></td>
            </tr>
           
        </table>
        <div class="container_footer">
            <button type="submit" name="change_user" value="2">Change User</button>
            <button type="button" name="back_user" value="2"><a href="{{route('admin.users')}}">Come Back</a></button>
        </div>
       
    </form>
</div>


@endsection
@section('js')

@endsection