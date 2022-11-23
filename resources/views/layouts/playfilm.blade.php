@extends('layoutMaster.materShowFilm')
@section('header')
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="video.movie" />
<meta name="keywords"
    content="{{$dbfiml->name}}, {{$dbfiml->origin_name}}, {{$dbfiml->origin_name}}, xem phim movibes, phim hoạt hình trung quốc, phim hoạt hình hay nhất">
<meta property="og:url"
    content="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html" />
<meta name="description" content="Xem Phim {{$dbfiml->name}} VietSub {{$dbfiml->year}}: {{$dbfiml->seo_des}}">
<meta itemprop="description" content="Xem Phim {{$dbfiml->name}} VietSub {{$dbfiml->year}}: {{$dbfiml->seo_des}}">
<meta name="twitter:description" content="Xem Phim {{$dbfiml->name}} VietSub {{$dbfiml->year}}: {{$dbfiml->seo_des}}">
<link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">

<meta property="article:tag" content="{{str_replace(" -"," ",$dbfiml->name_slug)}} tap {{$dbfiml->film->esp}}" />
<meta property="article:tag" content="{{$dbfiml->origin_name}}" />
<meta property="article:tag" content="{{$dbfiml->name}}" />

<meta property="article:tag" content="{{$dbfiml->name}}" />
<meta property="article:tag" content="{{$dbfiml->name}} - {{$dbfiml->year}}" />
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



<meta property="article:published_time" content="{{$dbfiml->created_at}}" />
<meta property="article:modified_time" content="{{$dbfiml->update_atfilm}}" />

<meta property="og:image" content="{{$dbfiml->thumb_url}} " />
<meta itemprop="image" content="{{$dbfiml->thumb_url}} ">
<meta name="twitter:image" content="{{$dbfiml->thumb_url}} ">

<meta property="og:title" content="{{$dbfiml->name}} Tập {{$dbfiml->episode_current}}  | MOVIBES" />
<meta itemprop="name" content="{{$dbfiml->name}} Tập {{$dbfiml->episode_current}}  | MOVIBES">
<meta name="twitter:title" content="{{$dbfiml->name}} Tập {{$dbfiml->episode_current}}  | MOVIBES">
<title>{{$dbfiml->name}} Tập {{$dbfiml->episode_current}} </title>


<link rel="stylesheet" href="{{asset('css/filmdetail.css')}}">
<link rel="stylesheet" href="{{asset('css/playfilm.css')}}">

<script src="https://cdn.jsdelivr.net/npm/hls.js@1"></script>

@endsection
@section('section')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0&appId=3210650549173249&autoLogAppEvents=1"
    nonce="kebV7lpY"></script>

<section class="player__wrapper container px-0 mb-2" id="box_playfiml">
    <input type="text" hidden id="userphim" value="{{empty($dbfiml->id_film)?" 0":$dbfiml->id_film}}">
    <input type="text" hidden id="esopide" value="{{$dbfiml->film->esp}}">
    <input type="text" hidden id="esopide_current" value="{{$dbfiml->episode_current}}">
    <input type="text" hidden id="binhluanID" value="{{empty($dbfiml->id_film)?" 0":$dbfiml->id_film}}">
    <input type="text" id="fullimrfomation" hidden data-name="{{$dbfiml->name}}" data-avata="{{$dbfiml->thumb_url}}"
        data-poster="{{$dbfiml->poster_url}}" value="{{$dbfiml->film->esp}}" data-current="{{$dbfiml->film->esp}}">
    <div>
        <div id="video_container">
            <video class="w-100" preload="auto" poster="{{$dbfiml->poster_url}}" src="/video/tinhthanbien.mp4"
                id="video">
            </video>
            <div class="loadding_video hidden">
                <div class="loading__image">
                    <img class="loading__logo--style" src="{{asset('img/loading.png')}}" alt="Mobives Logo">
                </div>
            </div>
            <figure class="video__notworking hidden">

                <img src="{{asset(" icon/video__empty.png")}}" alt="">
                <figcaption class="video__notworking-message">Chờ xíu nha đang :((</figcaption>
                <button class="btn" onclick="next_fiml(true)">Tập kế tiếp</button>

            </figure>
            <div class="lofo_fiml">
                <img src="{{asset('img/logo.png')}}">
            </div>
            <div class="box_video_container">
                <div class="video_background">
                    <i class="fa-solid fa-play "></i>
                </div>
                <style>
                    .sub_process{
                        position: absolute;
                        top:-7px;
                        left: 0;
                        width: 98%;
                    }
                    .sub_process_side{
                        width: 0%;
                        height: 4px;
                        background-color: rgb(243, 227, 3);
                        border-radius: 8px;
                    }
                    .video_slider input{
                        display: none
                    }
                    .video_slider:hover input{
                        display: block;
                    }
                    .video_slider:hover .sub_process{
                        display: none;
                    }
                </style>
                <div class="box_controllervideo">
                    <div class="video_slider w-100">
                        <input class="video_rank" type="range" step="0.1" min="0" max="100" value="0">
                        <div class="sub_process">
                            <div class="sub_process_side">

                            </div>
                        </div>
                        <div class="video_box_rank">
                            00:00
                        </div>
                    </div>
                    <div class="video_footer">
                        <div class="">
                            <span class="box_button_video">
                                <button onclick="video_pauplay()" class="play ">
                                    <i id="playvideo" class="fa-solid fa-play "></i>
                                    <i id="pausevideo" class="fa-solid fa-pause hidden"></i>
                                </button>
                                <div class="box_button_video-message pause_or_play">Phát</div>
                            </span>

                            <span class="box_button_video">
                                <button onclick="back10minute()"><i class="fa-solid fa-rotate-left"></i></button>
                                <div class="box_button_video-message">Back 10s</div>
                            </span>
                            <span class="video__volume">
                                <button class="btn_changemute" onclick="changemute(this)"><i
                                        class="fa-solid fa-volume-high"></i></button>
                                <input type="range" name="rank_volumn" min="0" step="0.01" value="1" max="1"
                                    id="rank_volumn">
                            </span>
                            <span class="video_current ms-md-4 text-warning">00:00</span><span class="text-warning"> /
                            </span><span class="video_durring text-warning">00:00</span>
                        </div>
                        <div>
                            <span class="box_button_video">
                                <button onclick="back10minute()"><i class="fa-solid fa-rotate-left"></i></button>
                                <div class="box_button_video-message">Back 10s</div>
                            </span>
                            <span class="box_button_video">
                                <button onclick="next10minute()">
                                    <i class="fa-solid fa-rotate-right"></i>
                                </button>
                                <div class="box_button_video-message">Next 10s</div>
                            </span>
                            <span class="box_settings">
                                <button><i class="fa-solid fa-gear"></i></button>
                                <div class="box_settings__overlay">
                                    <div class="box_settings__overlay-heading">
                                        <i class="fa-solid fa-clock"></i> <button
                                            onclick="closeSpeend('.box_settings__overlay')"
                                            class="btn-danger">X</button>
                                    </div>
                                    <ul class="video__speend">
                                        <li onclick="changeSpeend(this,0.25)">0.25x</li>
                                        <li onclick="changeSpeend(this,0.5)">0.5x</li>
                                        <li onclick="changeSpeend(this,1)" class="active">1x </li>
                                        <li onclick="changeSpeend(this,1.25)">1.25x </li>
                                        <li onclick="changeSpeend(this,2)">2x </li>
                                    </ul>
                                </div>

                            </span>
                            <span class="box_button_video">
                                <button onclick="fullwidth('#video')"><i
                                        class="fa-solid fa-up-right-and-down-left-from-center"></i></button>
                                <div style="min-width:80px;left:-24px;"
                                    class="box_button_video-message message__screen">Toàn màn hình</div>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            #video_embed{
                height: 640px;
            } @media (max-width:1100px){
                #video_embed{
                    height: 520px !important;
                }
            }
            @media (max-width:1000px){
                #video_embed{
                    height: 500px !important;
                }
            }
            @media (max-width:900px){
                #video_embed{
                    height: 450px !important;
                }
            }
            @media (max-width:800px){
                #video_embed{
                    height: 400px !important;
                }
            }
            @media (max-width:700px){
                #video_embed{
                    height: 350px !important;
                }
            }
            @media (max-width:600px){
                #video_embed{
                    height: 300px !important;
                }
            }
            @media (max-width:500px){
                #video_embed{
                    height: 250px !important;
                }
            }
            @media (max-width:400px){
                #video_embed{
                    height: 200px !important;
                }
            }
        </style>
        <div id="video_embed_container">
            <iframe id="video_embed"  class="w-100 hidden" src="{{$dbfiml->film->hhd}}" frameborder="0" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" ></iframe>
        </div>
        <div class="facebookScocaial my-2">
            <div class="row f-flex justify-content-between">
                <div class="col-md-2 col-12 order-md-1 order-2 ">
                        <div class="fb-share-button d-flex" data-href=""
                        data-layout="button_count" data-size="small"><a  target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u="
                        class="fb-xfbml-parse-ignore "></a>  
                </div>
            </div>
            <div
                class="video__setting col-md-10 col-12 order-md-2 order-1 d-flex justify-content-end text-white flex-wrap">
                <div class="setting_video-group my-sm-0 my-2 halim-prev-episode" onclick="next_fiml(false)"
                    id="btn_pre_film"><i class="fa-solid fa-backward "></i> Tập
                    trước</div>
                <div class="setting_video-group my-sm-0 my-2 halim-next-episode" onclick="next_fiml(true)"
                    id="btn_next_film"><i class="fa-solid fa-forward "></i> Tập tiếp
                    theo</div>
                <div class="setting_video-group my-sm-0 my-2" id="toggle-light"><i class="fa-regular fa-lightbulb "></i>
                    Tắt
                    đèn </div>
                <div class="setting_video-group my-sm-0 my-2" id="notice_errors"><img width="15"
                        src="{{asset('img/danger.png')}}" alt="previous image"> Báo lỗi</div>
                <div class="setting_video-group my-sm-0 my-2"><i class="fa-regular fa-eye "></i> <span
                        data-view="{{$dbfiml->views}}" id="view_fiml">{{number_format($dbfiml->views)}}</span> lượt xem
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content__website container">
    <div class="row">
        <!-- content firm -->
        <main class="col-lg-8 col-12">
            <!-- Lấy id tập phim  -->
            <input type="text" hidden class="fiml_id" id="fiml_id" value="{{$dbfiml->id_film}}">
            <div class="movie-imformation movie-imformation__box row d-flex">
                <div class="d-flex col-12">
                    <div class="movie-bookmark__box d-inline-block ">
                        <img width="20" height="22" id="addbookmark" class="movie-bookmark"
                            src="{{asset('img/bookmark.png')}}" alt="">
                        <span class="movie-bookmark__des">Thêm vào Bookmark</span>
                    </div>

                    <div class="movie-bookmark__added d-inline-block ">
                        <img style="width: 20px !;" width="60" height="60" id="removebookmark"
                            class="movie-bookmark hidden" src="{{asset('img/bookmark1.png')}}" alt="">
                        <span class="movie-bookmark__des">Đã thêm Bookmark</span>
                    </div>
                    <div class="movie-fiml" style="
                    display: flex;
                    flex-direction: column;
                    justify-content: center;">
                      <h4 class="fs-md-4 m-0 text-capitalize fs-6">{{$dbfiml->name}} tập <code
                        id="esopide_bookmard"> {{$dbfiml->episode_current}}</code> <span
                        class=""> | <strong>MOVIBES</strong></span></h4>
                        <p class="fs-6">{{$dbfiml->origin_name}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-7 col-sm-5">

                </div>
                <div class="movie-ratings text-right col-md-6 col-xl-5 col-sm-7 col-12" onmouseleave="handmouseLeave()">
                    <img width="40" class="main_stars" height="40" src="/img/star.png" alt="">
                    <span class="movie-bookmark__des">Đánh giá phim</span>
                    <span class="movie-rating_simple"><span class="number__start--chose" id="#number__start">5</span>/
                        <sub>5 (
                            <span class="rating__view">{{$dbfiml->votes}}</span> lượt )</sub> </span>
                    <span class="movie-star_list_stat"><img width="20" onmouseover="handMouse(1)"
                            onmouseup="handMouseUp(1)" data-index="1" height="20" src="/img/star.png"
                            title="Bình chọn 1 sao" alt="star movibes"><img width="20" onmouseover="handMouse(2)"
                            onmouseup="handMouseUp(2)" data-index="2" height="20" src="/img/star.png"
                            title="Bình chọn 2 sao" alt="star movibes"><img width="20" onmouseover="handMouse(3)"
                            onmouseup="handMouseUp(3)" data-index="3" height="20" src="/img/star.png"
                            title="Bình chọn 3 sao" alt="star movibes"><img width="20" onmouseover="handMouse(4)"
                            onmouseup="handMouseUp(4)" data-index="4" height="20" src="/img/star.png"
                            title="Bình chọn 4 sao" alt="star movibes"><img width="20" onmouseover="handMouse(5)"
                            onmouseup="handMouseUp(5)" data-index="5" height="20" src="/img/star.png"
                            title="Bình chọn 5 sao" alt="star movibes"></span>
                </div>
            </div>
            <div class="box__list-movie-eps">
                <h2 class="list__movie-title text-warning fs-3"><img src="/img/serve.png"> Sever</h2>
                <h3 class="fs-6 my-3">Sever Chính xem mặc định là <code>HHD</code> nên nếu xem thấy <strong
                        class="text-danger">LAG</strong> hãy chọn
                    sever <strong class="text-warning">MBS</strong> bên dưới nhé đạo hữu.</h3>
                <div id="sever_play" data-server="hhd" class="text-center my-4">
                    <button title="Chất lượng tốt" class="btn btn-primary" onclick="serveplayer(true)"><a
                            style="text-decoration: none;" class="text-white" href="#video">HHD</a></button>
                    <button class="btn btn-success" title="Chất lượng hơi yếu" onclick="serveplayer(false)"><a
                            style="text-decoration: none;" class="text-white" href="#video">MBS</a></button>
                </div>
                <ul class="list__movie-eps ps-0" id="list__movie-eps">

                </ul>
            </div>
            <img class="movie-thumb" hidden id="movie-imfomation" src="{{$dbfiml->thumb_url}}" alt="{{$dbfiml->name}}">

            <div class="movie-search__box my-4 col-12">
                <div class="filter-episode">
                    <button class="btn btn-success"> <i class="fa-solid fa-magnifying-glass"></i></button>
                    <span>TÌM TẬP NHANH</span>
                    <br>
                    <input class="mt-2 col-md-auto col-12 py-3 py-md-2" id="search_input_esp" min="0"
                        data-esp="{{$dbfiml->episode_current}}" data-name="{{$dbfiml->name}}" type="number" min="1"
                        step="1" placeholder="Nhập số tập..." class="search-episode">
                    <div class="box-message my-2"> </div>
                    <div class="search_episode-list">
                        <div class="loadding__episode hidden">
                            <div class="loading__image">
                                <img class="loading__logo--style" src="/img/loading.png" alt="">
                            </div>
                        </div>
                        <div class="search_episode-list__container">

                        </div>
                    

                    </div>
                </div>
            </div>
            <div class="halim--notice">
                <figure class="d-flex align-items-center">
                    <img src="/img/danger.png" width="40" height="40" alt="canh-bao-mobives">
                    <figcaption class="m-0">
                        <ul class="m-0">
                            <li>Mẹo tìm kiếm : thêm <strong>movibes</strong> phía sau để ra kết quả tốt nhất, ví
                                dụ : {{$dbfiml->name}} <strong>movibes</strong></li>
                            <li>Đừng tiếc 1 <code>comment</code> bên dưới để đánh giá phim</li>
                        </ul>
                    </figcaption>
                </figure>

                <figure class="d-flex align-items-center">
                    <img src="/img/calendar.png" width="40" height="40" alt="canh-bao-mobives">
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
                                @endforeach mỗi ngày
                            </li>

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
                    <p class="movie-des_fiml"> {!!$des!!} </p>
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
                    <p class="movie-des_fiml"> + {!!$des!!} </p>
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
                        <li> {!!$des!!} </li>
                        @endforeach
                    </ul>
                    @endif


                </div>
                <div class="item-content-gradient"></div>
                <label for="idcheckbox">
                    <span class="btn text-white idcheckbox">Mở rộng ...</span>
                </label>
            </section>

            <section class="movie-detail__film py-2">
                <input type="checkbox" id="idcheckboxseo" hidden>
                <div aria-readonly="true" class="mb-2 movie-detail__film--container movie-detail__tagSeo">
                    <!-- Seo -->
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        download class="tag__seo" title="dowload hoat hinh trung quoc">download hoat hinh trung
                        quoc</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="dowload hoat hinh trung quoc">movibes hoat hinh</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="{{$dbfiml->name}}">{{$dbfiml->name}}</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="{{$dbfiml->name}} vietsub">{{$dbfiml->name}}
                        vietsub</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="{{$dbfiml->name}} phu de">{{$dbfiml->name}} phu de</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="{{$dbfiml->name}} vietsub ton bo">{{$dbfiml->name}}
                        vietsub ton bo</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="{{$dbfiml->name}} vietsub full">{{$dbfiml->name}}
                        vietsub full</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="{{$dbfiml->name}} tap cuoi">{{$dbfiml->name}} tap
                        cuoi</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="{{$dbfiml->name}} hd">{{$dbfiml->name}} hd</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="xem phim hoat hinh trung quoc">xem phim hoat hinh trung
                        quoc</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="hoat hinh trung quoc hot">hoat hinh trung quoc hot</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="hoat hinh trung quoc tron bo">hoat hinh trung quoc tron
                        bo</a>

                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="hoat hinh trung quoc tron bo">{{str_replace("-","
                        ",$dbfiml->name_slug)}}
                        bo</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="hoat hinh trung quoc tron bo">hoat hinh {{str_replace("-","
                        ",$dbfiml->name_slug)}}
                        bo</a>
                    <a href="/xem-phim-{{$dbfiml->name_slug}}+tap-{{$dbfiml->episode}}+id-{{Str::random(6)}}{{$dbfiml->id_film}}.html"
                        class="tag__seo" title="hoat hinh trung quoc tron bo">anime {{str_replace("-","
                        ",$dbfiml->name_slug)}}
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

                <div class="aside__rank--body my-3 ">
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

            <div class="aside__rank aside__rank--course">
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
                            
                            @if(explode(",",$film->category)[0]=='1' )
                            3D
                            @elseif(explode(",",$film->category)[0]=='2')
                            2D
                            @elseif(explode(",",$film->category)[0]=='21')
                            <span class="px-1"> FULL</span>
                            @elseif(explode(",",$film->category)[0]=='24')
                           <span class="px-1"> FULL</span>
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

    videoEditStyle();
    // javscript cho phim video
    let is_light = true;
    function videoEditStyle() {
        let video ="";
            video = $$('#video_embed');
    
        if (video) {
            let light = $$('#toggle-light');
            light.innerHTML = '<img width="20" height="20" src="/img/lightoff.png" alt="lightoff"> Bật đèn';
            light.onclick = function () {
                $$('.modal__overlay').classList.toggle('hidden');
                is_light = !is_light;
                if (is_light) {
                    light.innerHTML = '<img width="20" height="20" src="/img/lightoff.png" alt="lightoff"> Bật đèn';
                }
                else {
                    light.innerHTML = '<img width="20" height="20" src="/img/lighton.png" alt="lighton"> Tắt đèn';
                }
            }
        };
    };

    $$('#notice_errors').onclick = function () {
        $$("#suport_erro").classList.remove("hidden");
    }

    // tạo toast   
    function creat_toast(nametoast, title, message) {
        $$('#toast').classList.remove('hidden');
        $$('.modal_content-head h1').innerText = title;
        $$('#toast .toast__img').setAttribute('src', arr__toast[nametoast]);
        $$('#toast .modal_content-des').innerHTML = message;
        $$('.modal_content').onclick = e => {
            e.stopPropagation();
        }
        document.onclick = () => {
            closeToast();
        }
    }
    //end
    let userphim = $("#userphim").val();
    let episode = $("#episode").val();
    let esopide_current = $("#esopide_current").val();
    let id__username = UserID.value;
    if (!id__username) id__username = 0;
    $.get("update-view-film", { id: userphim, esopide: esopide_current, id_user: id__username }, function (data) {
        if (data) {
            $("#view_fiml").text(`${new Intl.NumberFormat("en-US").format(data[0].views)}`);
        }
    });
    $.get("/get-phim.html", { id: userphim, episode: episode }, function (data) {
        if (data) {

            localStorage.setItem('listesopide', JSON.stringify(data));
        }
        else localStorage.setItem('listesopide', []);
    })

</script>

<script src="{{asset('js/video.js')}}"></script>
@endsection