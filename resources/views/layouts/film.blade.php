@extends('layoutMaster.materShowFilm')
@section('header')

<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="video.movie" />
<meta name="keywords" content="{{$dbfiml->name}}, {{$dbfiml->origin_name}}, {{$dbfiml->origin_name}}, xem phim movibes, phim hoạt hình trung quốc, phim hoạt hình hay nhất">
<meta property="og:url" content="{{route("film.home")}}/thong-tin-chi-tiet/{{$dbfiml->name_slug}}/{{Str::random(6)}}{{$dbfiml->id_film}}.html" />
<meta name="description"content="Xem Phim {{$dbfiml->name}} VietSub {{$dbfiml->year}}: {{$dbfiml->seo_des}}">
<meta itemprop="description" content="Xem Phim {{$dbfiml->name}} VietSub {{$dbfiml->year}}: {{$dbfiml->seo_des}}">
<meta name="twitter:description" content="Xem Phim {{$dbfiml->name}} VietSub {{$dbfiml->year}}: {{$dbfiml->seo_des}}">
<link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">

<meta property="article:tag" content="{{str_replace("-"," ",$dbfiml->name_slug)}} tap {{($dbfiml->episode_current)-3}}" />
<meta property="article:tag" content="{{str_replace("-"," ",$dbfiml->name_slug)}} tap {{($dbfiml->episode_current)-2}}" />
<meta property="article:tag" content="{{str_replace("-"," ",$dbfiml->name_slug)}} tap {{($dbfiml->episode_current)-1}}" />

<meta property="article:tag" content="{{$dbfiml->name}}" />
<meta property="article:tag" content="{{$dbfiml->name}} -{{$dbfiml->year}}" />
<meta property="article:tag" content="{{$dbfiml->name}} anime" />
<meta property="article:tag" content="{{$dbfiml->name}} download" />
<meta property="article:tag" content="{{$dbfiml->name}} full" />
<meta property="article:tag" content="{{$dbfiml->name}} HD" />
<meta property="article:tag" content="{{$dbfiml->name}} phu de" />
<meta property="article:tag" content="{{$dbfiml->name}} tai ve" />
<meta property="article:tag" content="{{$dbfiml->name}} tap cuoi" />
<meta property="article:tag" content="{{$dbfiml->name}} tron bo" />
<meta property="article:tag" content="{{$dbfiml->name}} vietsub" />
<meta property="article:tag" content="{{$dbfiml->name}} vietsub dowload" />
<meta property="article:tag" content="{{$dbfiml->name}} vietsub full" />
<meta property="article:tag" content="{{$dbfiml->name}} vietsub hd" />
<meta property="article:tag" content="{{$dbfiml->name}} vietsub tron bo" />
<meta property="article:tag" content="hoat hinh anime" />


<meta property="article:tag" content="{{$dbfiml->origin_name}}" />
<meta property="article:tag" content="{{$dbfiml->name}}" />
@forEach($dbfiml->kinds as $kind) <meta property="article:tag" content="Phim {{$kind->name_cate}}"  />
  @endforeach
<meta property="article:published_time" content="{{$dbfiml->created_at}}" />
<meta property="article:modified_time" content="{{$dbfiml->update_atfilm}}" />

<meta property="og:image" content="{{$dbfiml->thumb_url}} " />
<meta itemprop="image" content="{{$dbfiml->thumb_url}} ">
<meta name="twitter:image" content="{{$dbfiml->thumb_url}} ">

<meta property="og:title" content="{{$dbfiml->name}} Next Tập {{$dbfiml->episode_current}} [Việt Sub] | MOVIBES" />
<meta itemprop="name" content="{{$dbfiml->name}} Next Tập {{$dbfiml->episode_current}} [Việt Sub] | MOVIBES">
<meta name="twitter:title" content="{{$dbfiml->name}} Next Tập {{$dbfiml->episode_current}} [Việt Sub] | MOVIBES">
<title>{{$dbfiml->name}} Next Tập {{$dbfiml->episode_current}} [Việt Sub] | MOVIBES</title>


<link rel="stylesheet" href="{{asset("css/filmdetail.css")}}">
@endsection

@section('section')

<section class="content__website container">
    <input type="text" hidden id="esopide" value="{{$dbfiml->episode_current}}">
    <input type="text" hidden id="userphim" value="{{empty($dbfiml->id_film)?"0":$dbfiml->id_film}}">
    @section('idphim')
    <input type="text" hidden id="IDphimbinhluan" value=" {{empty($dbfiml->id_film)?"0":$dbfiml->id_film}}">
    @endsection

    <div class="row">
        
        <input type="text" hidden id="binhluanID" value="{{empty($dbfiml->id_film)?"0":$dbfiml->id_film}}">
        <!-- content firm -->
        <main class="col-lg-8 col-12">
            <figure class="row">
                <div class="movie-poster col-md-5 col-12  d-md-block d-flex justify-content-center">
                    <div class="movie-content">
                    
                        <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode_current}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html">
                         
                            <img class="movie-thumb"  id="movie-imfomation"
                                src="{{$dbfiml->thumb_url}}"
                                alt="{{$dbfiml->name}}">
                        </a>
                        <section class="movie__box-btn">
                            <button onclick="OpenAllEsp(this)" data-episode="{{$dbfiml->episode_current}}" title="Chọn nhiều tập phim"><a href="#tapphim"><i class="fa-solid fa-sort-down"></i> Tập
                                    phim</a></button>
                            <button title="Xem phim ngay"><a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode_current}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"><i class="fa-solid fa-caret-right"></i> Xem
                                    phim</a></button>
                        </section>
                        <div class="movie-bookmark__box">
                            <img id="addbookmark"  class="movie-bookmark" src="{{asset('img/bookmark.png')}}" alt="">
                            <span class="movie-bookmark__des">Thêm vào Bookmark</span>
                        </div>
                        <div class="movie-bookmark__added ">
                            <img width="60" height="60" id="removebookmark" class="movie-bookmark hidden" src="{{asset('img/bookmark1.png')}}"
                                alt="">
                            <span class="movie-bookmark__des">Đã thêm Bookmark</span>
                        </div>
                    </div>
                </div>
                <figcaption class="movie-imformation px-lg-4 px-xl-0 py-4 col-md-7 cpide_currentol-12">
                    <h1 class="movie-title">{{$dbfiml->name}}</h1>
                    <input type="hidden" class="fiml_id" data-id="{{$dbfiml->id_film}}" name="fiml_id" value="{{$dbfiml->votes}}">
                    <h2 class="movie-sologan">{{$dbfiml->origin_name}}</h2>
                    <p class="movie-released">
                        <movie-calendar><i class="fa-solid fa-calendar-days"></i> <span>{{$dbfiml->year}}</span></movie-calendar>
                        <movie-episode><i class="fa-regular fa-clock"></i> <span>{{$dbfiml->episode}}? </span>Tập</movie-episode>
                    </p>
                    <p>Đang phát: <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode_current}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="movie-newesp">Tập {{$dbfiml->episode_current}} </a></p>
                    <p class="movie-lastEps">
                        Tập mới nhất:
                        
                        @if($dbfiml->episode_current>=4)
                        <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode_current-3}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html">
                            {{$dbfiml->episode_current-3}}
                        </a>
                        <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode_current-2}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html">
                            {{$dbfiml->episode_current-2}}
                        </a>
                        <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode_current-1}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html">
                            {{$dbfiml->episode_current-1}}
                        @elseif($dbfiml->episode_current>=2)
                        <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode_current-3}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html">
                            {{$dbfiml->episode_current-2}}
                        </a>
                        <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode_current-2}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html">
                            {{$dbfiml->episode_current-1}}
                        </a>
                        @else
                        <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode_current-2}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html">
                            {{$dbfiml->episode_current}}
                        </a>
                        @endif

                       
                        </a>
                    </p>
                    <p class="movie-category">Thể loại: <span>
                     <?php $i=0;?>
                        @foreach ($dbfiml->kinds as $kind)
                        <?php $i++;?>
                            @if (count($dbfiml->kinds)==$i)
                            <span>{{$kind->name_cate}}</span>.                                    
                            @else
                            {{$kind->name_cate}} ,                                         
                            @endif 
                            @endforeach
                        </span></p>
                    <p>
                        Quốc Gia : <span> <strong>{{$dbfiml->name_quocgia}} </strong></span>
                    </p>
                    <div class="movie-ratings" onmouseleave="handmouseLeave()">

                        <img width="40" class="main_stars" height="40" src="{{asset('img/star.png')}}" alt="">
                        <span class="movie-bookmark__des">Đánh giá phim</span>

                        <span class="movie-rating_simple"><span class="number__start--chose">5</span>/ <sub>5 (
                                <span class="rating__view" id="rating__view">0</span> lượt )</sub> </span>
                        <span class="movie-star_list_stat">
                            <img width="20" height="20" src="/img/starnone.png" alt="">
                            <img width="20" height="20" src="/img/starnone.png" alt="">
                            <img width="20" height="20" src="/img/starnone.png" alt="">
                            <img width="20" height="20" src="/img/starnone.png" alt="">
                            <img width="20" height="20" src="/img/starnone.png" alt="">
                        </span>
                    </div>
                </figcaption>

                <div class="movie-search__box my-4 col-12" id="tapphim">
                    <div class="filter-episode">
                        <button class="btn btn-success"> <i class="fa-solid fa-magnifying-glass"></i></button>
                        <label for="search_input_esp">TÌM TẬP NHANH</label>
                        <br>
                        <input class="mt-2 col-md-auto col-12 py-3 py-md-2"  id="search_input_esp" min="0"  data-esp="{{$dbfiml->episode_current}}" data-name="{{$dbfiml->name}}" type="number" min="1" step="1"
                            placeholder="Nhập số tập..." class="search-episode">
                        <div class="box-message my-2"> </div>
                        <div class="search_episode-list" >
                            <div class="loadding__episode hidden">
                                <div class="loading__image">
                                    <img class="loading__logo--style" src="{{asset('img/loading.png')}}" alt="">
                                </div>
                            </div>
                            <div class="search_episode-list__container" >
                            
                            </div>
                            <!-- <a href="lnikphim" title="Đấu phá thương khung">26</a> -->
                        </div>
                    </div>
                </div>
                <div class="halim--notice">
                    <figure class="d-flex align-items-center">
                        <img src="{{asset("img/danger.png")}}" width="40" height="40" alt="canh-bao-mobives">
                        <figcaption class="m-0">
                            <ul class="m-0">
                                <li>Mẹo tìm kiếm : thêm <strong>movibes</strong> phía sau để ra kết quả tốt nhất, ví
                                    dụ : {{$dbfiml->name}} <strong>movibes</strong></li>
                                <li>Đừng tiếc 1 <code>comment</code> bên dưới để đánh giá phim</li>
                            </ul>
                        </figcaption>
                    </figure>

                    <figure class="d-flex align-items-center">
                        <img src="{{asset('img/calendar.png')}}" width="40" height="40" alt="canh-bao-mobives">
                        <figcaption class="m-0">
                            <ul class="m-0">
                                <li>Phim cập nhập 
                                    <?php $i=1;  ?>
                                     @foreach ($dbfiml->fulldays as $day)
                                    <?php $i++;?>
                                    @if (count($dbfiml->fulldays)==$i)
                                        <code>{{$day->name_day}}</code> và                                             
                                     @else
                                    <code>{{$day->name_day}}</code>                                                                                                
                                     @endif
                                    @endforeach  mỗi ngày </li>                                         
                            </ul>
                        </figcaption>
                    </figure>

                </div>
            </figure>
            <section class="movie-detail__film">
                <h2>Nội dung phim</h2>
                <input type="checkbox" id="idcheckbox" hidden>
                <div class="movie-detail__film--container" aria-readonly="true">
                    <h3 class="text-info">{{$dbfiml->name}} VietSub {{$dbfiml->year}}:</h3>
                    <p class="movie-des_fiml">
                        @php
                         $arrDes =explode('*',$dbfiml->des);
                        @endphp
                        @foreach ($arrDes as $des)
                        <p class="movie-des_fiml">  {!!$des!!}  </p>
                        @endforeach
                    </p>

                    @if( ($dbfiml->mota_nguoithan)!="NULL" && !empty($dbfiml->mota_nguoithan) )
                    <p class="movie-des_fiml">
                        Quan hệ nhân vật
                      </p>
                      <p class="movie-des_fiml">
                        @php
                        $arrDes =explode('*',$dbfiml->mota_nguoithan);
                       @endphp
                       @foreach ($arrDes as $des)
                       <p class="movie-des_fiml"> + {!!$des!!}  </p>
                       @endforeach
                    </p>
                    @endif
                   
                    @if( ($dbfiml->mota_canhgioi)!="NULL" && !empty($dbfiml->mota_canhgioi) )
                    <h3>Cảnh giới tu luyện</h3>
                    <ul>
                        @php
                        $arrDes =explode('*',$dbfiml->mota_canhgioi);
                       @endphp
                       @foreach ($arrDes as $des)
                       <li> {!!$des!!}  </li>
                       @endforeach
                    </ul>
                    @endif
                    
                </div>
                <div class="item-content-gradient"></div>
                <label for="idcheckbox">
                    <span class="btn text-white idcheckbox">Mở rộng ...</span>
                </label>
            </section>
            <?php function generateRandomString($length = 6) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            };
            ?>
            <section class="movie-detail__film py-2">
                <input type="checkbox" id="idcheckboxseo" hidden>
                <div aria-readonly="true" class="mb-2 movie-detail__film--container movie-detail__tagSeo">
                    <!-- Seo -->
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" download class="tag__seo" title="dowload hoat hinh trung quoc">download hoat hinh trung
                        quoc</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="dowload hoat hinh trung quoc">movibes hoat hinh</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="{{$dbfiml->name}}">{{$dbfiml->name}}</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="{{$dbfiml->name}} vietsub">{{$dbfiml->name}}
                        vietsub</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="{{$dbfiml->name}} phu de">{{$dbfiml->name}} phu de</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="{{$dbfiml->name}} vietsub ton bo">{{$dbfiml->name}}
                        vietsub ton bo</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="{{$dbfiml->name}} vietsub full">{{$dbfiml->name}}
                        vietsub full</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="{{$dbfiml->name}} tap cuoi">{{$dbfiml->name}} tap
                        cuoi</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="{{$dbfiml->name}} hd">{{$dbfiml->name}} hd</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="xem phim hoat hinh trung quoc">xem phim hoat hinh trung
                        quoc</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="hoat hinh trung quoc hot">hoat hinh trung quoc hot</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="hoat hinh trung quoc tron bo">hoat hinh trung quoc tron
                        bo</a>
                   
                        <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="hoat hinh trung quoc tron bo">{{str_replace("-"," ",$dbfiml->name_slug)}}
                            bo</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="hoat hinh trung quoc tron bo">hoat hinh {{str_replace("-"," ",$dbfiml->name_slug)}}
                                bo</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" class="tag__seo" title="hoat hinh trung quoc tron bo">anime {{str_replace("-"," ",$dbfiml->name_slug)}}
                                    bo</a>
                    <!-- end Seo -->
                </div>
                <div class="item-content-gradient mb-2"></div>
                <label for="idcheckboxseo">
                    <span class="btn text-white idcheckboxseo">Mở rộng ...</span>
                </label>
            </section>
        </main>
        <!-- end content firm -->

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
                                </div>
                                <figcaption>
                                    <h4 class="fs-6">{{$dbfiml->name}}</h4>
                                    <div class="box__review-star">
                                        <input type="number" hidden value="{{$dbfiml->votes}}">
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                        <div class="box--star"></div>
                                    </div>
                                    <div class="box__review-detail">
                                        <p class="text-primary">{{$dbfiml->views}} <i class="fa-solid fa-eye"></i> Lượt xem</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </a>

                        {{-- <a href="http://">
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
                        </a> --}}
                    </div>

                </div>
            </div>

            <div class="aside__rank-style-box  aside__rank aside__rank--course">
                <div class="aside__rank--head">
                    <h4 class="fs-6 p-1 pb-2 me-2 text-danger fs-4">Phim ngày hôm nay</h4>
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
                                        <div class="box--star haft"></div>
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
        </aside>
    </div>
</section>


<article class="content__website container px-2">
    <main>
        <h5 class="d-inline-block direction-title ">Nội Dung Tương Tự</h5>
        <div class="container__film--menu row">
           <?php function render__kind($index,$esopide,$totalepisode){
            switch ($index){
                case 0: return "Tập ".$esopide;
                case 1: return "Hoàn tất ( ".$esopide."/".$totalepisode. ")";
                case 2: return "Trailer";
                case 3: return "FULL ";
                case 4: return "Tập ".$esopide;
                case 5: return "FULL";
            }
            return  '';
        }
        ?>
            
                    @if (!empty($dbsame ))
                    @foreach ($dbsame as $film)
                    @if($film->id_film != $dbfiml->id_film)
                    <div class="box__film--item col-md-4 col-xl-2 col-lg-3 col-6" title="{{$film->name}}">
                        <a href="/thong-tin-chi-tiet/{{$film->name_slug}}/{{Str::random(6)}}{{$film->id_film}}.html" title="{{$film->name}}" class="box__avata--item ">
                            <img src="{{$film->thumb_url}}"
                                alt="{{$film->name}}">
                        </a>
                        <div class="box__film--episode">
                                               
                            {{render__kind($film->status,$film->episode_current,$film->episode)}}                       
                        </div>
                        <div class="box__film--kind">
                         
                            @if ($film->theloaiphim==1)
                            3D
                            @elseif ($film->theloaiphim==2)
                            2D
                            @elseif ($film->theloaiphim==3)
                            VietSub
                            @elseif ($film->theloaiphim==4)
                            Thuyết Minh
                            @elseif ($film->theloaiphim==5)
                            Lồng Tiếng
                            @endif

                        </div>
                        <div class="box__film--title">
                            <h4 class="m-0 fs-6">{{$film->name}}</h4>
                            <p class="m-0">{{$film->origin_name}}</p>
                        </div>
                        <a href="/thong-tin-chi-tiet/{{$film->name_slug}}/{{Str::random(6)}}{{$film->id_film}}.html" title="{{$film->name}}" class="box__avata--item " class="item__overplay">
                        </a>
                    </div>
                    @endif
                    @endforeach
                    @endif    
        </div>
        
    </main>   
</article>

@endsection
@section('js')
<script src="{{asset('js/filmdetail.js')}}" type="text/javascript"></script>
<script>
let userphim=$("#userphim").val();
let episode=$("#episode").val();
$.get("/get-phim.html",{id:userphim,episode:episode},function(data){
    if(data){
      
     localStorage.setItem('listesopide',JSON.stringify(data));
    }
    else  localStorage.setItem('listesopide',[]);
 })</script>
@endsection