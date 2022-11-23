@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="{{asset("admin/css/addaccount.css")}}">
<title>Thêm thành viên mới |MOVIBES</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.users')}}">User Profile</a> 
    > <a href="javascript:void(0)">Add Account</a>
@endsection


@section('container')

@section('container')
<div class="container_content">
    <h3 class="container_content-products">Add Products</h3>
    <div class="box_message">
        @if(!empty($message)) <h2>{{$message}}</h2> @endif
     </div>
    <form class="form_create_profile" method="POST" action="{{route("profile.add")}}" enctype="multipart/form-data">
    @csrf
        <table class="form_create_table">
            <tr>
                <td class="forn_create_head">UserName</td>
                <td><input type="email" required name="email" value="{{$email}}" placeholder="Tên Account" id="email">
                </td>
            </tr>

            <tr>
                <td class="forn_create_head">Password</td>
                <td><input type="text" name="password" id="password" required
                        placeholder="Mật khẩu"></td>
            </tr>

            <tr>
                <td class="forn_create_head">FullName</td>
                <td><input type="text" name="fullname" value="{{$fullname}}" id="fullname" required
                        placeholder="Họ và Tên"></td>
            </tr>

            <tr>
                <td class="forn_create_head">Phone</td>
                <td><input type="number" maxlength="12" name="phone" id="phone" required value="{{$phone}}"
                        placeholder="Số điện thoại"></td>
            </tr>

            <tr>
                <td class="forn_create_head">Avata</td>
                <td>
                    <div class="content_upload_img">
                        <label for="mypicture">
                            <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                            <h4>Upload Product Preview</h4>
                            <img class="uploadimg" src=""  alt="" hidden>
                        </label>
                        <input type="file" hidden id="mypicture" name="upLoadAvata">
                    </div>
                </td>
            </tr>
           <tr>
           <td class="forn_create_head">Permission</td>
           <td> <select name="permission" id="" required>
            <option value="member">MEMBER</option>
            <option value="member">MANAGER</option>
            <option value="member">ADMIN</option>
        </select></td>
           </tr>
        </table>
        <div class="container_footer">
            <button type="submit" name="change_user" value="2">Creat User</button>
            <button type="button" name="back_user" value="2"><a href="{{route('admin.users')}}">Come Back</a></button>
        </div>
    </form>
</div>

@endsection


@section('js')
<script>
    var upload = document.querySelector('#mypicture');
    let content_upload_img = document.querySelector('.content_upload_img .uploadimg');
    let form_products = document.querySelector('.form_create_profile');
    upload.addEventListener('change', function (event) {
        uploadedFile = URL.createObjectURL(this.files[0]);
        if (content_upload_img.src == "") {
            content_upload_img.hidden = false;
            content_upload_img.src = uploadedFile;
        }
        else {
            content_upload_img.hidden = false;
            content_upload_img.src = "";
            content_upload_img.src = uploadedFile;
        }
    })
</script>
@endsection