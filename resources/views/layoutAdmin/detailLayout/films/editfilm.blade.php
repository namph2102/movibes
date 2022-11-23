

@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="{{asset("admin/css/addaccount.css")}}">
<title>Chỉnh sửa Trang phim | MOVIBES</title>
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.js"></script>
@endsection
@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a href="{{route('admin.users')}}">Manager Films</a>
    > <a href="#">Edit Phim</a>
@endsection
@section('style')
<style>
    table .img_edit{
        width: 120px;
        height: 80px;
        object-fit: cover;

    }
</style>
@endsection
@section('container')
<div class="container_content">
    <div class="box_message">
        @if(!empty($message)) <h2>{{$message}}</h2> @endif
     </div>
    <h4 class="container_content-products">Edit Film</h4>

    <form class="form_create_profile" method="POST" action="{{route("film.edit")}}" enctype="multipart/form-data">
        @csrf
        <input type="text" hidden name="id" value="{{$dbfiml->id_film}}">
        <table class="form_create_table">
            <tr>
                <td class="forn_create_head">Name Film *</td>
                <td><input type="text" value="{{$dbfiml->name}}" name="name" placeholder="Tên phim" id="nameProduct">
                </td>
            </tr>

            <tr>
                <td class="forn_create_head">Origin *</td>
                <td><input type="text" name="origin" id="origin" value="{{$dbfiml->origin_name}}"
                        placeholder="Tên tiếng anh"></td>
            </tr>
           
            <tr>
                <td class="forn_create_head">Name Slug *</td>
                <td><input type="text" name="slug" id="slug" value="{{$dbfiml->name_slug}}"
                        placeholder="Tên seo link"></td>
            </tr>
            
            
            <tr>
                <td class="forn_create_head">Thể Loại Phim *</td>
                <td><select required name="theloaiphim" value="{{$dbfiml->theloaiphim}}" id="">
                 
                    <option value="{{$dbfiml->theloaiphim}}">
                        @if ($dbfiml->theloaiphim==1)
                        3D
                        @elseif ($dbfiml->theloaiphim==2)
                        2D
                        @elseif ($dbfiml->theloaiphim==3)
                        VietSub
                        @elseif ($dbfiml->theloaiphim==4)
                        Thuyết Minh
                        @elseif ($dbfiml->theloaiphim==5)
                        Lồng Tiếng
                        @endif
                    </option>    
                    <option value="1">3D</option>    
                    <option value="2">2D</option>    
                    <option value="3">VietSub</option>    
                    <option value="4">Thuyết Minh</option>    
                    <option value="5">Lồng Tiếng</option>    
                </select></td>
            </tr>

            <tr>
                <td class="forn_create_head">Thumb *</td>
                <td>
                    <div class="content_upload_img">
                        <label for="thumb">
                            <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                            <h4>Upload Thumb Image</h4>
                            <img style="border-radius: 0px;"  name="uploadthumb" class="uploadthumb" src="" alt="" hidden>
                        </label>
                        <input type="file" hidden id="thumb" name="thumb">
                    </div>
                </td>
            </tr>
            
            <tr>
                <td class="forn_create_head">Poster *</td>
                <td>
                    <div class="content_upload_img">
                        <label for="poster">
                            <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                            <h4>Upload Sub Image</h4>
                            <img style="border-radius: 0px;"  name="uploadposter" class="uploadposter" src="" alt="" hidden>
                        </label>
                        <input type="file" hidden id="poster" name="poster">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="forn_create_head">Time *</td>
                <td><input type="number" name="time" id="time" value="{{$dbfiml->time}}"
                        placeholder="Thời gian phát"></td>
            </tr>

            <tr>
                <td class="forn_create_head">Year *</td>
                <td><input type="number" name="year" id="time" value="{{$dbfiml->year}}"
                        placeholder="Năm phát hành"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Trang thái *</td>
                <td><select name="status" id="">
                    <option value="{{$dbfiml->status}}">Mặc Định</option>
                    <option value="0">Phim chưa hoàn Thành</option>  
                    <option value="1">Phim đã hoàn Thành</option>    
                    <option value="2">Phim Trailer</option>    
                    <option value="3">Phim lẻ</option>    
                    <option value="4">Phim bộ</option>    
                    <option value="5">Phim Chiếu Rạp</option>    
                </select></td>
            </tr>

            <tr>
                <td class="forn_create_head">Quốc Gia *</td>
                <td><select  name="quocgia" value="{{$dbfiml->quocgia}}" id="">
                    <option value="{{$dbfiml->quocgia}}">{{$dbfiml->name_quocgia}}</option> 

                    @foreach($dbcountry as $quocgia)
                    <option value="{{$quocgia->id_quocgia}}">{{$quocgia->name_quocgia}}</option>  
                    @endforeach
                </select></td>
            </tr>



            <tr>
                <td class="forn_create_head">Total Episode  *</td>
                <td><input type="number" name="episode" id="episode" value="{{$dbfiml->episode}}"
                        placeholder="Tổng số tập"></td>
            </tr>

            <tr>
                <td class="forn_create_head">Episode_Current *</td>
                <td><input required type="number" name="episode_current" id="episode_current" value="{{$dbfiml->episode_current}}"
                        placeholder="Số tập hiện tại"></td>
            </tr>

            <tr>
                <td class="forn_create_head">Ngày phát input *</td>
                <td><input type="text" name="openday" id="Catetory" value="{{$dbfiml->openday}}"
                        placeholder="Điền thể loại ở đây"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Ngày phát *</td>
                <td><select id="">
                    <option value="1">1 - Thứ Hai</option>    
                    <option value="2">2 - Thứ Ba</option>
                    <option value="3">3 - Thứ Tư</option> 
                    <option value="4">4 - Thứ Năm</option>  
                    <option value="5">5 - Thứ Sáu</option>   
                    <option value="6">6 - Thứ Bảy</option> 
                    <option value="7">7 - Chủ Nhật</option>    
                </select></td>
            </tr>

            <tr>
                <td class="forn_create_head">Catetory input *</td>
                <td><input type="text" name="Catetory" id="Catetory" value="{{$dbfiml->category}}"
                        placeholder="Điền thể loại ở đây"></td>
            </tr>
            <tr>
                <td class="forn_create_head">Catetory *</td>
                <td>
                    <select value="{{$dbfiml->category}}" id="catetory">
                        <option value="{{$dbfiml->category}}">Thể Loại Mặc Định</option>
                        @foreach ($category as $cate)
                        <option value="{{$cate->id_cate}}">{{$cate->id_cate}} - {{$cate->name_cate}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        
        <table class="form_create_table"  >
            <tr >
               <td style="font-size:12px;"> <span >ThumB</span> :<img class="img_edit" src="{{$dbfiml->thumb_url}}" width="60" alt="" title="Ảnh đại diện">
                <span>Poster</span>: <img  class="img_edit" src="{{$dbfiml->poster_url}}" width="60" alt="" title="Ảnh Banner"></td>
            </tr>

            <tr class="">
                <td> <button  type="button" onclick="openEdit(this)" class="btn_close">Edit</button>
                    <textarea name="des" id="" cols="45" rows="5"
                        placeholder="Mô tả Phim">{{empty($dbfiml->des)?"NULL":$dbfiml->des}}</textarea></td>
            </tr>
            <tr>
                <td> <button  type="button" onclick="openEdit(this)" class="btn_close">Edit</button>
                    <textarea name="desseo" id="" cols="45 " rows="5" 
                        placeholder="Mô tả SEO"> {{empty($dbfiml->seo_des)?"NULL":$dbfiml->seo_des}} </textarea>
                    </td>
            </tr>
            <tr>
                <td> <button  type="button" onclick="openEdit(this)" class="btn_close">Edit</button>
                    <textarea name="descanhgioi" id="" cols="45" rows="5" 
                        placeholder="Mô tả Cảnh giới"> {{empty($dbfiml->mota_canhgioi)?"NULL":$dbfiml->mota_canhgioi}} </textarea>
                 </td>
            </tr>

            <tr>
            
                <td> <button  type="button" onclick="openEdit(this)" class="btn_close">Edit</button>
                    <textarea name="desnguoithan" id="" cols="45    " rows="5" 
                        placeholder="Mô tả người thân"> {{empty($dbfiml->mota_nguoithan)?"NULL":$dbfiml->mota_nguoithan}} </textarea>
                    </td>

            </tr>

            
        </table>
        <div class="container_footer " style="flex:1;">
            <button type="submit" value="2" name="create_form">Save Film</button>
            <button type="button" name="comeback"><a href="{{route('admin.films')}}">Come Back</a></button>
        </div>
    </form>
   
</div>
@endsection
@section('js')
<script>
    let form_products = document.querySelector('.form_create_profile');
  function showImg(label,uploadimgoflable){
    let upload = document.querySelector(label);
    let content_upload_img = document.querySelector(uploadimgoflable);
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
});
  }
  showImg('#thumb','.content_upload_img .uploadthumb');
  showImg('#poster','.content_upload_img .uploadposter');

  function openEdit(e){
    let parentElement=e.closest('tr').classList.toggle("show_all");
  }
</script>
@endsection