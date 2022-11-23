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
    <p style="font-size: 13px;"> Mô tả : LEVEL 1-icon xếp hạng -- LEVEL 2-icon chat-- LEVEL 3-Chức vụ-- LEVEL 4-Huân chương</p>
    <h4 class="container_content-des">
        Email & password    
    </h4>
    <form class="form_create_profile" method="POST" action="{{route("icons.show")}}" enctype="multipart/form-data" >
        @csrf
        <input type="text" hidden name="update" value="2">
        <table class="form_create_table" >
            <tr>
                <td class="forn_create_head">ID *</td>
                <td><input type="text" value="{{$dbicon->id_icon}}" readonly name="id" id="id" ></td>
            </tr>
            <tr>
                <td class="forn_create_head">Name *</td>
                <td><input type="text" value="{{$dbicon->name_icon}}"  name="name"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Level *</td>
                <td><input type="level"  value="{{$dbicon->Level}}"  name="lv" id="level"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Avata *</td>
                <td><img src="{{$dbicon->link}}" alt=""></td>
            </tr>
         <tr>
                <td class="forn_create_head">Avata</td>
                <td>
                    <div class="content_upload_img">
                        <label for="mypicture">
                            <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                            <h4>Upload Icon</h4>
                            <img class="uploadimg" src=""  alt="" hidden>
                        </label>
                        <input type="file" hidden id="mypicture" name="upLoadAvata">
                    </div>
                </td>
            </tr>
           
           
        </table>
        <div class="container_footer">
            <button type="submit" name="change_Icons" value="2">Update Icons</button>
            <button type="button" name="back_Icons" value="2"><a href="{{route('icons.show')}}">Come Back</a></button>
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