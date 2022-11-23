@extends('layoutAdmin.masterlayouts.admin')

@section('head')


<title>Chỉnh sửa phim | MOVIBES</title>
<link rel="stylesheet" href="{{asset("admin/css/addaccount.css")}}">
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.films')}}">Manager Films</a>
    ><a >Thêm tập mới phim {{$dbfiml->name}}</a>
@endsection
@section('style')


@endsection
@section('container')
<div class="container_content">
    <h5 class="container_content-products"> Tập hiện tại phim : {{$dbfiml->name}}- Tập  {{empty($dbfimlDetail->esp)?"0":$dbfimlDetail->esp}} </h5>
    <div class="box_message">
        @if(!empty($message)) <h2>{{$message}}</h2> @endif
     </div>
    <form class="form_create_profile" method="POST" action="{{route("esopide.add")}}" enctype="multipart/form-data">
            @csrf
        <table class="form_create_table">
            <input type="text" hidden name="id" value="{{$dbfiml->id_film}}">
            <tr>
                <td class="forn_create_head">Tên phim *</td>
                <td><input type="text"  value="{{$dbfiml->name}}" readonly placeholder="Tên sản phẩm" id="name" readonly>
                </td>
            </tr>

            <tr>
                <td class="forn_create_head">Tập mới nhất *</td>
                <td><input type="number" readonly  value="{{empty($dbfimlDetail->esp)?"0":$dbfimlDetail->esp}}"
                        placeholder="Tập phim"></td>
            </tr>
            
            <tr>
                <td class="forn_create_head">Tập sẽ thêm *</td>
                <td><input type="number" name="esopide" id="esopide" value="{{(empty($dbfimlDetail->esp)?"1":($dbfimlDetail->esp+1))}}"
                        placeholder="Tập phim"></td>
            </tr>

            <tr>
             
                <td class="forn_create_head">Link phim online *</td>
                <td> 
                    <button  type="button" onclick="openEdit(this)" class="btn_close">Edit</button>
                    <textarea name="linkhhd" id="" cols="60" rows="3"
                        placeholder="link video"> NULL</textarea></td>
            </tr>


            <tr>
                <td class="forn_create_head">Link phim đuôi .m3u8*</td>
                <td> 
                    <button  type="button" onclick="openEdit(this)" class="btn_close">Edit</button>
                    <textarea name="linkvip" id="" cols="60" rows="3" 
                        placeholder="link video">NULL </textarea></td>
            </tr>

            <tr>
                <td class="forn_create_head">Danh sách phim embed*</td>
                <td> 
                    <button  type="button" onclick="openEdit(this)" class="btn_close">Edit</button>
                    <textarea name="listhhd" id="" cols="60" rows="6" 
                        placeholder="link video">NULL</textarea></td>
            </tr>

            <tr>
                <td class="forn_create_head">Danh sách phim đuôi .m3u8*</td>
                <td> 
                    <button  type="button" onclick="openEdit(this)" class="btn_close">Edit</button>
                    <textarea name="listvip" id="" cols="60" rows="6" 
                        placeholder="link video">NULL</textarea></td>
            </tr>


            <tr>
                <td class="forn_create_head">Link từ máy</td>
                <td>
                    <div class="content_upload_img">
                        <label for="myvideo">
                            <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                            <h4>Upload link video</h4>
                            <video height="200" height="100" controls class="uploadvideo" src=""  alt="" hidden>
                        </label>
                        <input type="file" hidden id="myvideo" name="myvideo">
                    </div>
                </td>
            </tr>
        </table>
        <div class="container_footer ">
            <button type="submit" name="update_film" value="2">ADD Esopide</button>
            <button type="button" name="comback"><a href="{{route('film.listesopide',["id"=>$dbfiml->id_film])}}"> Come Back</a></button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script> function openEdit(e){
    let parentElement=e.closest('tr').classList.toggle("show_all");
  }</script>

  

<script>
    var upload = document.querySelector('#myvideo');
    let content_upload_img = document.querySelector('.content_upload_img .uploadvideo');
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