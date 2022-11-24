@extends('layoutMaster.materShowFilm')
@section('header')
<link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">
<meta name="keywords" content="movie, movibes, xem tat ca phim mobives, phim hay movibes, phim hoat hinh, phim chat luong, phim hoat hinh 3d trung quoc">
<meta property="og:type" content="article" />
<meta property="og:url" content="{{route('film.all')}}" />
<meta property="og:image" content="{{asset('img/loading.png')}}" />
<meta property="article:tag" content="Xem phim tại MOVIBES" />
<link rel="stylesheet" href="{{asset('css/filmdetail.css')}}">
<link rel="stylesheet" href="{{asset('css/playfilm.css')}}">

<meta name="description"
    content="Xem những bộ phim hoạt hình 3D với đồ họa đẹp mắt, hấp dẫn, được tuyển chọn. Những bộ phim bộ, phim lẻ được cập nhật việt sub liên tục, phim xem nhanh.">
<meta itemprop="description" content="Xem những bộ phim hoạt hình 3D với đồ họa đẹp mắt, hấp dẫn, được tuyển chọn. Những bộ phim bộ, phim lẻ được cập nhật việt sub liên tục, phim xem nhanh.">
<meta name="twitter:description" content="Xem những bộ phim hoạt hình 3D với đồ họa đẹp mắt, hấp dẫn, được tuyển chọn. Những bộ phim bộ, phim lẻ được cập nhật việt sub liên tục, phim xem nhanh.">

<link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">
<meta property="og:image" content="{{asset('avata/avatafull.png')}}" />
<meta itemprop="image" content="{{asset('avata/avatafull.png')}}">
<meta name="twitter:image" content="{{asset('avata/avatafulll.png')}}">

<meta property="og:title" content="Phim hoạt hình 3D mới nhất được |MOVIBES" />
<meta itemprop="name" content="Phim hoạt hình 3D mới nhất được |MOVIBES">
<meta name="twitter:title" content="Phim hoạt hình 3D mới nhất được |MOVIBES">
<title>Phim hoạt hình 3D mới nhất được |MOVIBES</title>
@endsection
@section('section')

<section class="content__website container" id="showall">
  
    <div class="row">
        <main class="col-lg-8 col-12" style="min-height: 600px;">
            <!-- Lịch phim theo ngày  -->
            <div class="day__weekend justify-content-center row col-12">
                <h5 class="d-inline-block direction-title">Phim mới cập nhập</h5>
                <div class="row col-sm-6 col-12">
                    <div data-day="" class="box__day active col">
                        <a href="javascript:void(0)">
                            <p class="d-sm-block d-none">Mới</p>
                            Cập nhập
                        </a>
                    </div>
                    <div data-day="1" class="box__day col">
                        <a href="javascript:void(0)">
                            <p class="d-sm-block d-none">Mon</p>
                            Thứ Hai
                        </a>
                    </div>
                    <div data-day="2" class="box__day col">
                        <a href="javascript:void(0)">
                            <p class="d-sm-block d-none">Tue</p>
                            Thứ Ba
                        </a>
                    </div>
                    <div data-day="3" class="box__day  col">
                        <a href="javascript:void(0)">
                            <p class="d-sm-block d-none">Wed</p>
                            Thứ Tư
                        </a>
                    </div>
                </div>
                <div class="row col-sm-6 my-sm-0 my-1 col-12">
                    <div data-day="5" class="box__day col">
                        <a href="javascript:void(0)">
                            <p class="d-sm-block d-none">Thu</p>
                            Thứ Năm
                        </a>
                    </div>
                    <div data-day="6" class="box__day col">
                        <a href="javascript:void(0)">
                            <p class="d-sm-block d-none">Fri</p>
                            Thứ Sáu
                        </a>
                    </div>
                    <div data-day="7" class="box__day col">
                        <a href="javascript:void(0)">
                            <p class="d-sm-block d-none">Sat</p>
                            Thứ Bảy
                        </a>
                    </div>
                    <div data-day="8" class="box__day col">
                        <a href="javascript:void(0)">
                            <p class="d-sm-block d-none">Sun</p>
                            Chủ nhật
                        </a>
                    </div>
                </div>
            </div>

            <div class="container__film--menu my-2">
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

                        <a href="#">
                            <figure class="d-flex">
                                <div class="box__avata--rank">
                                    <img src="https://hoathinh3d.com/wp-content/uploads/2021/02/dau-la-dai-luc-1-300x450.jpg"
                                        alt="">
                                    <div class="box__film--bookmark">
                                        <span>1</span>
                                    </div>
                                </div>
                                <figcaption>
                                    <h4 class="fs-6">Đấu la đại lục</h4>
                                    <div class="box__review-star">
                                        <input type="number" hidden value="5">
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                    </div>
                                    <div class="box__review-detail">
                                        <p class="text-primary">12.6k <i class="fa-solid fa-eye"></i> Lượt xem</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>

                        <a href="http://">
                            <figure class="d-flex">
                                <div class="box__avata--rank">
                                    <img src="https://hoathinh3d.com/wp-content/uploads/2021/02/dau-la-dai-luc-1-300x450.jpg"
                                        alt="">
                                </div>
                                <figcaption>
                                    <h4 class="fs-6">Đấu la đại lục</h4>
                                    <div class="box__review-star">
                                        <input type="number" hidden value="5">
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                    </div>
                                    <div class="box__review-detail">
                                        <p class="text-primary">12.6k <i class="fa-solid fa-eye"></i> Lượt xem</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>
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

    
  })('demo1');
};


</script>
@endsection
