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
                <!-- Loading film -->
                <div class="loading__film loading__film_fullday hidden" style="min-height: 400px;">
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
                <div class="row container__film--list__menu col-12">
                    <!-- show list fiml here -->
                   
                </div>
                <!-- Phân trang  -->
                <div class="panation" id="panation">
                    <ul>
                   
                    </ul>
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
<script>
      fc_loadingfilm('.loading__film_fullday',2400);
    function removeActive(index){
        let panation=$$l("#panation ul li a");
        Array.from(panation).forEach(element => {
            element.classList.remove('active')
        });
        if(panation[index]){
            panation[index].classList.add('active');
        }
    }
    localStorage.setItem('pageShowfilm', 0);
     
    $.get("/api/get-all-film",{amout:"all"},function(res){
        let len=16;
        render_film_container(res.data,'',len);
    })
    function handPanation(page,e){
        console.log(page)
        localStorage.setItem('pageShowfilm',page)
        $.get("/api/get-all-film",{amout:"all",page:page},function(res){
            render_film_container(res.data,'',16);
            localStorage.setItem('total_page',Math.floor(res.data.length/16)+1);
        })
    }
    function changePanation(value){
        let page=  localStorage.getItem('pageShowfilm');
        page=Number(value);
        if(page<=0) page=0;
        if(page>=localStorage.getItem('total_page')) page=localStorage.getItem('total_page');
        handPanation(page);
    }
    render_pagePanation()
    function render_pagePanation(){
        let panation=$$("#panation ul");
        let html=` <li  onclick="changePanation(-1)"><a href="#showall">PREV</a></li>
            <li><a onclick="changePanation(1)" href="#showall">	NEXT</a></li>`;
        panation.innerHTML=html;
       
    }
</script>
@endsection
