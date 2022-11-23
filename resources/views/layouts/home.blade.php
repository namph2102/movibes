@extends('layoutMaster.materShowFilm')
{{-- Seo onpage --}}
@section('meta')
<meta name="keywords" content="movibes, trang chu movibes, home movibes, phim hoạt hình trung quốc, phim hoạt hình hay nhất">
<meta property="og:url" content="{{route('film.trangchu')}}" />
<link rel="canonical" href="{{route('film.trangchu')}}" />
<meta name="description"
    content="MOVIBES là trang website chuyên cung cấp những bộ phim hay nhất được chọn lọc kỹ càng kỹ càng,  nội dung lôi cuốn, hấp dẫn, phim xem nhanh và chất lượng HD.">
<meta itemprop="description" content="Phim hay Movibes tuyển chọn trên Netflix được xem nhiều nhất hiện nay. Trùm phim hoạt hình Trung Quốc,phim cổ trang, phim lẻ chiếu rạp, phim ý nghĩa và những bộ film Trung Quốc cổ trang nên xem một lần trong đời.">
<meta name="twitter:description" content="Phim hay Movibes tuyển chọn trên Netflix được xem nhiều nhất hiện nay. Trùm phim hoạt hình Trung Quốc,phim cổ trang, phim lẻ chiếu rạp, phim ý nghĩa và những bộ film Trung Quốc cổ trang nên xem một lần trong đời.">
<meta property="og:type" content="website" />
<link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">
<meta property="og:image" content="{{asset('img/logo_banner_movibes.png')}}" />
<meta itemprop="image" content="{{asset('img/logo_banner_movibes.png')}}">
<meta name="twitter:image" content="{{asset('img/logo_banner_movibes.png')}}">

<meta property="og:title" content="MOVIBES - Phim  hoạt hình Trung Quốc | Phim lẻ | Phim nhiều tập tuyển chọn| Phim VietSub| Phim Thuyết Minh" />
<meta itemprop="name" content="MOVIBES - Phim  hoạt hình Trung Quốc | Phim lẻ | Phim nhiều tập tuyển chọn| Phim VietSub| Phim Thuyết Minh">
<meta name="twitter:title" content="MOVIBES - Phim  hoạt hình Trung Quốc | Phim lẻ | Phim nhiều tập tuyển chọn| Phim VietSub| Phim Thuyết Minh">
<title>MOVIBES - Phim  hoạt hình Trung Quốc | Phim lẻ | Phim nhiều tập tuyển chọn| Phim VietSub| Phim Thuyết Minh </title>
@endsection
@section('section')
<section class="content__website container">
    <div class="row">
        <main class="col-lg-8 col-12">

            <figure class="main__banner">
                <a href="" class="show__link--banner"><img class="main__banner--link"
                        src="https://hoathinh3d.com/wp-content/uploads/2021/10/pham-nhan-tu-tien-phan-2.jpg" alt="">
                </a>

                <figcaption>
                    <h3 class="my-0 fs-4 name__film--banner">Phàm nhân tu tiên</h3>
                    <p class="fs-6  sologan__film--banner text-capitalize">Bình định thiên hạ</p>
                </figcaption>
                <div class="banner__index--slide d-flex justify-content-between">
                    <div class="box__silde active"></div>
                    <div class="box__silde"></div>
                    <div class="box__silde"></div>
                    <div class="box__silde"></div>
                    <div class="box__silde"></div>
                </div>
                <button class="btn_banner--left btn"> <i class="fa-solid fa-angle-left"></i> </button>
                <button class="btn_banner--right btn"> <i class="fa-solid fa-angle-right"></i> </button>
            </figure>

            <!-- Lịch phim theo ngày  -->
            <div class="day__weekend justify-content-center row col-12">

                <div class="row col-sm-6 col-12">
                    <div data-day="" class="box__day active col">
                        <a>
                            <p class="d-sm-block d-none">Mới</p>
                            Cập nhập
                        </a>
                    </div>
                    <div data-day="1" class="box__day col">
                        <a>
                            <p class="d-sm-block d-none">Mon</p>
                            Thứ Hai
                        </a>
                    </div>
                    <div data-day="2" class="box__day col">
                        <a>
                            <p class="d-sm-block d-none">Tue</p>
                            Thứ Ba
                        </a>
                    </div>
                    <div data-day="3" class="box__day  col">
                        <a>
                            <p class="d-sm-block d-none">Wed</p>
                            Thứ Tư
                        </a>
                    </div>
                </div>
                <div class="row col-sm-6 my-sm-0 my-1 col-12">
                    <div data-day="4" class="box__day col">
                        <a>
                            <p class="d-sm-block d-none">Thu</p>
                            Thứ Năm
                        </a>
                    </div>
                    <div data-day="5" class="box__day col">
                        <a>
                            <p class="d-sm-block d-none">Fri</p>
                            Thứ Sáu
                        </a>
                    </div>
                    <div data-day="6" class="box__day col">
                        <a>
                            <p class="d-sm-block d-none">Sat</p>
                            Thứ Bảy
                        </a>
                    </div>
                    <div data-day="7" class="box__day col">
                        <a>
                            <p class="d-sm-block d-none">Sun</p>
                            Chủ nhật
                        </a>
                    </div>
                </div>
            </div>

            <div class="container__film--menu my-2">
                <!-- Loading film -->
                <div class="loading__film loading__film_fullday hidden">
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
                <div class="row p-0 m-0 container__film--list__menu col-12">
                    <!-- show list fiml here -->
                   
                </div>
                <div class="box__film--views_all col-12 text-end">
                    <a href="xem-tatca-phim.html">Xem tất cả</a>
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

                <div class="aside__rank-style-box  aside__rank--body my-3 ">
                    <!-- Loading film -->
                    <div class=" loading__film loading__film__rank hidden">
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
                    <div class=" list__film_ranking">
                    
                        {{-- <a href="#">
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
                                        <p class="text-primary mb-0">12.6k <i class="fa-solid fa-eye"></i> Lượt xem</p>
                                    </div>
                                    <div class="box__review-top">
                                        #1
                                    </div>
                                    <div class="box__review-catelory">
                                        VIETSUB
                                    </div>
                                </figcaption>

                            </figure>
                        </a> --}}

                    </div>
                </div>
            </div>

            <div class="aside__rank-style-box  aside__rank aside__rank--course">
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
                    <div class="aside__rank-style-box  aside__rank--container__course">
                        
                       
                    </div>
                </div>
            </div>
        </aside>
    </div>
</section> 

@endsection

@section('js')
<script>
    
    // list tất cả phim trang home
    fc_loadingfilm('.loading__film_fullday');
    $.get("/api/get-all-film",{amout:"12",page:"home"},function(res){
    if(res.status=200){
       render_film_container(res.data);
    }
  });

</script>
@endsection
