@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Trang Quản lý | MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.users')}}">User Profile</a>
@endsection

@section('container')
<div class="manager_member">
    <div class="manager_member-head" action="">
        <div>
            <button name="members" class="members" value="2">Members</button>
            <button name="admin" class="admins" value="2">Admin</button>
            <button name="admin" class="allmembers" value="2">All Members</button>
        </div>
        <div >
            <h4>Total member: <span>{{$total_user}}</span></h4>
            <h4>User Topup: <span>{{$total_coin}}</span></h4>
        </div>
    </div>
    <form class="manager_member-content">
        <span>Members</span>
        <button name="newaccount" value="2"><a href=" {{route('profile.add')}}">Add new</a></button>
        <button name="findmember" value="2"><a href="{{route('profile.find')}}">Find Members</a></button>
        <button name="export" onclick="reset_Exp()" value="2"><a href="javascript:void(0)">Renew exp and notice</a></button>
    </form>

    <form class="form_member" action="">
        <table>
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
        </table>
              
    </form>
    <div class="direction_profile">
        {{$dbuser->links()}}
    </div>
</div>
@endsection
@section('js')
<script>
    (function () {
        let list_acount = document.querySelectorAll('.major');
        if (list_acount) {
            let btn_members = document.querySelector('.members');
            let btn_admin = document.querySelector('.admins');
            let btn_allmember = document.querySelector('.allmembers');
            btn_members.onclick = function () {
                allactive();
                for (let mem of list_acount) {
                    let major = String(mem.innerText).toLowerCase();
                    if (major!='member') {
                        mem.closest('tr').classList.add('hiden');
                    }
                    else {
                        mem.closest('tr').classList.remove('hiden');
                    }
                }
            }
            btn_admin.onclick = function () {
                allactive();
                for (let mem of list_acount) {
                    let major = String(mem.innerText).toLowerCase();
                    if (major!='admin') {
                        mem.closest('tr').classList.add('hiden');
                    }
                    else {
                        mem.closest('tr').classList.remove('hiden');
                    }
                }
            }
            function allactive(){
                for (let mem of list_acount) {
                    mem.closest('tr').classList.remove('hiden');
                }
            }
            btn_allmember.onclick = function () {
                allactive();
            }
        }

    })()
    function reset_Exp(){
        $.get("/reset-exps_rewark.html",function(res){
            if(res){
                alert("Xóa thành công bảng ");
            }
        })
    }
</script>
@endsection