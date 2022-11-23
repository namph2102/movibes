@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Tìm Kiếm user |MOVIBES</title>
@endsection
@section('style')
<style>   
    table{
        width: 100%;
        text-align: center;
    }
    table th,table tr{
    font-size: 1.2rem;
    } 
    
    .major h5{
    text-align: center;
    }
    table h5{
    text-align: center;
    }
    .form_create_table tr:hover {
    background-color: transparent;
    }</style>
@endsection


@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.users')}}">User Profile</a> 
    > <a href="{{route("profile.find")}}">Find Member</a>
@endsection
@section('container')
<div class="box_message">
   @if(!empty($message)) <h2>{{$message}}</h2> @endif
</div>
<div class="container_content">
    <h4 class="container_content-name">Find Imformation User</h4>
    <h4 class="container_content-des">
        Email & password </h4>
        <form class="form_create_table form_create_profile" method="POST" action="{{route("profile.find")}}">
            @csrf
           <table class="form_create_table">
           <tr>
                <td class="forn_create_head">Email *</td>
                <td><input type="email" name="email" id="username"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Phone *</td>
                <td><input type="text" name="phone" id="phone"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Permission *</td>
                <td><input type="text" name="permission" id="major"></td>
            </tr>
           </table>

        <table>
            @if(!empty(count($dbuser)>0))
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Exp</th>
                    <th colspan="2">Operation</th>
                    <th>Coin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dbuser as $user)
                <td><img src="{{$user->avata}}" alt=""></td>
                <td>{{$user->email}}</td>
                <td class="major">
                    <h5 class="{{$user->permission}}">{{$user->permission}}</h5>
                </td>
                <td>{{number_format($user->exps)}}</td>

                 
                <td><a href="{{route('profile.edit',["id"=>$user->id])}}"><i
                    class="fa-solid fa-pen-to-square"></i></a></td>
                 <td><a href="{{route('profile.delete',["id"=>$user->id])}}"><i class="fa-solid fa-trash-can"></i></a></td>

                <td>{{number_format($user->coin)}}</td>
            </tr>
                @endforeach
            </tbody>
            @endif
            
        </table>
        <div class="container_footer">
            <button type="submit" name="find_user" value="2">Find User</button>
            <button type="button" name="back_user" value="2"><a href="{{route('admin.users')}}">Come Back</a></button>
        </div>
    </form>


</div>


@endsection
@section('js')

@endsection