@extends('layoutAdmin.masterlayouts.admin')

@section('head')
<link rel="stylesheet" href="{{asset("admin/css/addaccount.css")}}">
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Thay đổi Profile</title>
@endsection

@section('direction')
    <a href="{{route('admin.dashboard')}}">Admin</a> > <a>Tạo SiteMap</a> 

@endsection
@section('container')
<div class="box_message">
  
</div>
{{-- <p>{{var_dump($dbuser)}}</p> --}}
<div class="container_content">
    <h4 class="container_content-name">Tạo sitemap</h4>

    <form class="form_create_profile" onsubmit="return false">
        <input type="text" hidden name="add" value="2">
        <table class="form_create_table" >
            <tr>
                <td class="forn_create_head">Nhập id sitemap *</td>
                <td><input type="text"  value="" id="id" name="id"></td>
            </tr>   
            <tr>
                <td class="forn_create_head">Copy here *</td>
                <td> <button  type="button" onclick="openEdit(this)" class="btn_close">Edit</button>
                    <textarea  required name="desseo" id="Sitemap" cols="60 " rows="10" 
                        placeholder="Sitemap"></textarea>
                    </td>
            </tr>

        </table>
        <div class="container_footer">
            <button type="button" name="change_Icons" onclick="clickSitemap()"  value="2">Creat Sitemap</button>
            <button type="button" name="back_Icons" value="2"><a href="{{route('icons.show')}}">Come Back</a></button>
        </div>
       
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function clickSitemap(){
            let id=document.querySelector("#id").value;
            $.get("/admin/creatsitemap/showcreatsitemap",{"id":id},function(data){
                console.log(data);
                data=data[0];   
                let html=creatSitemap(data.name_slug,data.id_film,data.episode);
                console.log(html);
                $("#Sitemap").text(html);
            })
        }
    function creatSitemap(nameslug, id, len) {
    let html ='';
    function creatFiml(){
        html = `<url>
        <loc>https://movibes.online/thong-tin-chi-tiet/${nameslug}/movibe${id}.html</loc>
        <lastmod>2022-11-09T13:11:49+00:00</lastmod>
        <priority>0.64</priority></url>`;
        for (let i = 1; i <= len; i++) {
            html += `<url>
            <loc>https://movibes.online/xem-phim-${nameslug}+tap-${i}+id-movibe${id}.html</loc>
            <lastmod>2022-11-09T13:11:49+00:00</lastmod>
            <priority>0.51</priority>
            </url>`
        }
        return html;
    }
    return creatFiml;
}

function openEdit(e){
    let parentElement=e.closest('tr').classList.toggle("show_all");
  }
    </script>
</div>


@endsection