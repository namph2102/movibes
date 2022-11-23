@extends('layoutMaster.materShowFilm')
@section('header')
<link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">
<meta name="keywords" content="movie, movibes, xem tat ca phim mobives, phim hay movibes, phim hoat hinh, phim chat luong, phim hoat hinh 3d trung quoc">
<meta name="description"
    content="Tuyển chọn những bộ phim, hấp dẫn, đồ họa đỉnh cao. Những bộ phim bộ, phim lẻ được cập nhật việt sub liên tục, phim xem nhanh.">
<meta itemprop="description" content="Tuyển chọn những bộ phim, hấp dẫn, đồ họa đỉnh cao. Những bộ phim bộ, phim lẻ được cập nhật việt sub liên tục, phim xem nhanh.">
<meta name="twitter:description" content="Tuyển chọn những bộ phim, hấp dẫn, đồ họa đỉnh cao. Những bộ phim bộ, phim lẻ được cập nhật việt sub liên tục, phim xem nhanh.">

<link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">
<meta property="og:image" content="{{asset('avata/avatafull.png')}}" />
<meta itemprop="image" content="{{asset('avata/avatafull.png')}}">
<meta name="twitter:image" content="{{asset('avata/avatafulll.png')}}"/>

<meta property="og:type" content="article" />
<meta property="og:url" content="{{route('film.all')}}" />
<meta property="og:image" content="{{asset('img/loading.png')}}" />
<meta property="article:tag" content="" />
<link rel="stylesheet" href="{{asset('css/filmdetail.css')}}">
<link rel="stylesheet" href="{{asset('css/playfilm.css')}}">
<title>{{$title}}</title>
@endsection
  
@section('section')
{{-- <p> {{var_dump($dbfiml)}}</p> --}}
<section class="content__website container" id="showall">
    <div class="row">
        
        <main class="col-lg-8 col-12">
                <!-- Loading showkind -->
                <div class="showkind_loadding" style="position: relative">
                    <div class="loading__image">
                        <img class="loading__logo--style" src="{{asset('img/loading.png')}}" alt="">
                    </div>
                </div>
                <!--End Loading showkind -->

            <h5 class="d-inline-block direction-title">{{$direct}}</h5>
            <div class="container__film--menu my-2">
                @if(count($dbfiml)<=0)
                  <div class="text-center">
                    <h2 class=" text-warning">404 NOT FOUND!</h2>
                    <p class="fs-6">Không tìm thấy phim theo yêu cầu, bạn tìm tên phim trên ô tìm kiếm nhé.</p>
                    <button class="btn btn-primary"> <a style="text-decoration: none;" class="text-white" href="{{route("film.home")}}">Back Home</a></button>

                  </div>
                 
                @endif
                <div class="row container__film--list__menu col-12 demo1">

                </div>   

                <div id="pagination-demo1" style="display: flex;justify-content: space-around;" class="mt-2">

                  </div>
            </div>
        </main>
        
        <aside class="col-lg-4 col-12">
            <div class="aside__rank">
                <div class="aside__rank--head d-flex">
                    <h3 class="fs-6 p-1 pb-2 me-2 ">Xếp hạng</h3>
                    <div class="rank__day rank__day__list--btn">
                        <button class="btn p-1 text-white active" data-day="day">Ngày</button>
                        <button class="btn p-1 text-white" data-day="week">Tuần</button>
                        <button class="btn p-1 text-white" data-day="month">Tháng</button>
                        <button class="btn p-1 text-white" data-day="all">Tất cả</button>
                    </div>
                </div>

                <div class="aside__rank-style-box aside__rank--body my-3 ">
                    <!-- Loading film -->
                    <div class="loading__film loading__film__rank hidden">
                        <div class="box__loadding hidden"></div>
                        <div class="box__loadding active"></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                    </div>
                    <!--  end Loading film -->
                    <div class="list__film_ranking">
                   
                    </div>

                </div>
            </div>

            <div class="aside__rank-style-box aside__rank aside__rank--course">
                <div class="aside__rank--head">
                    <h4 style="font-size: 24px;" class="p-1 pb-2 me-2 text-danger">Phim hôm nay</h4>
                </div>

                <div class="aside__rank--body my-3 ">
                    <!-- Loading film -->
                    <div class="loading__film loading__film_course hidden">
                        <div class="box__loadding hidden"></div>
                        <div class="box__loadding active"></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                        <div class="box__loadding "></div>
                    </div>
                    <!--  end Loading film -->
                    <div class="aside__rank--container__course">
                       
                    </div>
                </div>
            </div>
        </aside>
    </div>
</section>



@endsection

@section('js')
<script src="{{asset("css/paginationjs/src/pagination.js")}}"></script>
<script>
let url=location.href;
 $.get(url,{action:"getvalue"},function(data){
        rendernotice(data);
         return false;
    })
   
    function checkkind(kind){
        switch (Number(kind)){
     
     case 1: return `3D`;
     case 2: return `2D`;
     case 3: return `VIETSUB `;
     case 4: return `Thuyết Minh`;
     case 5: return `Lồng Tiếng`;
 }
 return  'VIETSUB';
    }
function rendernotice(data) {
  (function(name) {
    var container = $('#pagination-' + name);
    var sources = function () {
      var result = [];
        data.forEach(item =>{
        result.push(`<div class="box__film--item col-md-4 col-xl-3 col-6" title="Xem phim ${item.name}">
        <a href="thong-tin-chi-tiet/${item.name_slug}/${makeid(6)}${item.id_film}.html" class="box__avata--item" title="${item.name}">
            <img src="${item.thumb_url}"
                alt="${item.name}">
               
        </a>
        <div class="box__film--episode">
            ${render__kind(item.status,item.episode_current,item.episode)}
        </div>
        <div class="box__film--kind">
        <span class="px-2"> ${checkkind(item.theloaiphim)} </span>
        </div>
        <div class="box__film--title">
            <h4 class="m-0 fs-6">${item.name}</h4>
            <p class="m-0">${item.origin_name}</p>
        </div>
        <a  href="/thong-tin-chi-tiet/${item.name_slug}/${makeid(6)}${item.id_film}.html" class="item__overplay">
        </a>
    </div>`);
      })

      return result;
    }();

    var options = {
      dataSource: sources,
      pageSize: 16,
      callback: function (response, pagination) {
        dataHtml="";
        $.each(response, function (index, item) {
          dataHtml +=  item ;
        });
        container.prev().html(dataHtml);
      }
    };
    container.pagination(options);
    addhref();
    
  })('demo1');
};
function addhref(){
    let listurl=Array.from(document.querySelectorAll('.paginationjs-pages li a'));
    listurl.forEach(element=>{
        element.href= element.href+"#showall";
    })

}
setTimeout(() => {
$$('.showkind_loadding').classList.add('hidden');
}, 1000);
</script>
@endsection
