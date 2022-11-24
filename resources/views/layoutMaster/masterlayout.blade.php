<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/paginationjs/dist/pagination.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       {{-- SEO  --}}
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:type" content="article" />
        <meta name="twitter:site" content="@movibes">
        <meta name="twitter:creator" content="@movibes">
        <meta property="fb:app_id" content="343112651044957" />
        <meta name="twitter:card" content="summary_large_image">
        <meta property="fb:pages" content="100087004991368" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="revisit-after" content="1 days" />
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="600">
        <meta property="og:image:height" content="315">
        <meta property="article:tag" content="Phim Bộ Hoạt Hình Trung Quốc" />
        <meta property="article:tag" content="Phim Hay" />
        <meta property="article:tag" content="Phim Hoạt Hình" />
        <meta property="og:site_name" content="Hoạt Hình Trung Quốc - Xem Hoạt hình Hay 3D | MOVIBES" />
      <!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js">
  </script>
<![endif]-->
   {{-- ENDV SEO  --}}
        @yield('meta')
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-B1D3SLFXFJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-B1D3SLFXFJ');
</script>
<script src="{{asset('js/ajax.js')}}"></script>
<?php  if(isset($_COOKIE["userLoading"]))
{
    echo "<script> window.location.reload(true);</script>";
    setcookie("userLoading", "", time() +3200, "/");
};?>

<body>
    <h1 class="text-danger"></h1>
    <div class="author_box">
    
        <input type="hidden" id="UserID" data-id="{{empty($users->id)?"0":$users->id}}" value="{{empty($users->id)?"":$users->id}}"/>
        <input type="hidden" value="{{empty($users->email)?"":$users->email}}" data-timechat="20" name="username" id="author_email">
    </div>
    <div class="loading hidden">
        <div class="loading__image">
            <img class="loading__logo--style" src="{{asset('img/loading.png')}}" alt=""><img class="loading__brand--style"
                src="{{asset('img/logo.png')}}" alt="">
        </div>
    </div>  

    <header class="container mb-0" id="header">
        <div class="row p-0 m-0 align-items-center">
            <div class="logo col-md-2 col-12">
                <a href="{{route('film.home')}}">   <img class="logo__movibes" style="width: 100px;" class="mb-2" src="{{asset('img/logo.png')}}" alt="MOVIBES | Phim hay tuyển chọn"></a>
             
            </div>

            <div class="show_at_tablet row m-0 p-0 col-md-10 col-12 justify-content-between align-items-center">
                <div class="search d-flex align-items-center py-2  col-md-9  col-12">
                    <i class="fa-solid fa-magnifying-glass pe-2 col-1 ps-1"></i>
                    <input type="text" id="search_input" class="flex-grow-1 fs-6 py-2" placeholder="Tìm kiếm tên phim.....">

                    <div class="result_search hidden">
                        <div class="result_search--heading">
                            <span>Kết quả tìm kiếm: <code> Không tìm thấy</code></span>
                        </div>
                        <div class="result_search--container">

                        </div>
                    </div>
                </div>

                <div class="profile  col-3">
                    <div class="profile__notice py-2 px-3 me-2">
                        <!-- Hiển thị thông báo -->
                        <span id="profile__notice-number" class="profile__notice-number">0</span>
                        <i><img src="{{asset('icon/bookmark.png')}}" alt=""></i>
                        <div class="bookmarks p-2">
                            <div class="bookmark__head d-flex justify-content-between border-bottom pb-2">
                                <strong title="Hãy thêm phim yêu thích tại đây" class="bookmark__head--title"><img
                                        width="40" height="40" src="{{asset('img/bookmark1.png')}}" alt="bookmarks">
                                    BOOKMARKS</strong>
                                <button class="btn btn-danger p-2 btn_close_profile">Đóng thẻ</button>
                            </div>
                            <div class="bookmark__body">
                                <!-- Loading boorkmark -->
                                <div class="bookmarks__loadding hidden">
                                    <div class="loading__image">
                                        <img class="loading__logo--style" src="{{asset('img/loading.png')}}" alt="">
                                    </div>
                                </div>
                                <!--End Loading boorkmark -->
                                <div class="bookmark__boxfilm my-2" id="bookmark__boxfilm">
                                    <p>Chưa có phim nào được <code>Bookmarks</code></p>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__avata">
                        @if(!empty($users->name)) 
                        <img src="{{$users->avata}}" alt="avata" class="profile__avata--image">
                        
                        @else
                        <img width="" src="{{asset('icon/login.png')}}" alt="" class="profile__avata--image">
                        @endif
                       
                        <div class="profile_information border border-secondary border-2  py-2"> 
                            <button style="position: absolute;right:0;top:0;z-index:1; " class="btn py-2 px-3 btn-danger d-sm-none d-block" onclick="closeElement(this,'.profile_information','hide')">Close</button>
                            @if(!empty($users->name)) 
                            <div class="profile__fullname text-capitalize fs-5" style="white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;">
                              
                                {{empty($users->name)?"":$users->name}}
                            </div>
                            <div class="profile__exp border-bottom pb-2" id="tuvi">
                              {{-- ajax --}}
                            </div>
                            
                            @endif           
                            <div class="profile__avata--sub">
                                <ul class="text-start">
                                   
                                   @if(!empty($users->name)) 
                                   <li><a href="{{route('profile.showprofile')}}"><i class="fa-regular fa-address-card"></i>
                                    Thông tin</a></li>
                                     <li><a href="{{route("profile.notice")}}#index_panation"><i class="fa-solid fa-bell"></i> Thông
                                    báo</a></li>
                                    <li><a href="{{route('topup.topup')}}"><i class="fa-solid fa-coins"></i> Nạp tiền</a></li>
                                   <li><a href="{{route('form.regester')}}"><i class="fa-regular fa-user"></i>
                                    Đăng Ký</a></li>
                                    <li onclick="openElement(this,'#profile_changepasswork')"><a  href="javascript:void(0)"><i class="fa-solid fa-ellipsis"></i> Đổi mật khẩu</a></li>
                                    <li><a  href="javascript:void(0)" id="logoutForm"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
                                 @if($users->permission=="admin")
                                 <li><a href="{{route('admin.dashboard')}}"><i class="fa-brands fa-vaadin"></i> Quản Trị Website</a></li>
                                 @endif
                                    @else 
                                    <li onclick="openElement(this,'#form__login')"><a><i class="fa-solid fa-right-from-bracket"></i> 
                                        Đăng nhập</a></li>
                                        <li><a href="{{route('form.regester')}}"><i class="fa-regular fa-user"></i>
                                            Đăng Ký</a></li>
                                    @endempty
                                 
                                   
                                    
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <menu style="z-index: 2;" class="ps-1 py-2" >
            <div class="menu__nav--bar d-xl-none col-2">
                <i  title="Click vào đầy để hiện Menu" class="fa-solid fa-bars fs-4 btn_menu"></i>
            </div>

            <ul id="menu" class="menu__main hide_of_xl">
                <li><a href="{{route("film.trangchu")}}"><i class="fa-solid fa-house"></i> Trang chủ </a></li>
                <li class="menu__navFist nav__kind"><a href="javascript:void(0)">Phim truyền hình <i class="fa-solid fa-caret-down"></i> </a>
                    <!-- Danh sách Thể loại phim -->
                    <ul class="sub__menu__navFist--nav sub__nav--kind">
                        <li><a href="/xem-phim-truyen-hinh-phim-le.html">Phim lẻ</a></li>
                        <li><a href="/xem-phim-truyen-hinh-phim-bo.html">Phim bộ</a></li>
                        <li><a href="/xem-phim-truyen-hinh-phim-chieu-rap.html">Phim Chiếu Rạp</a></li>
                       
                    </ul>
                </li>
                <li class="menu__navFist nav__kind menu__parent_drop hidden"><a href="javascript:void(0)">Quốc gia <i class="fa-solid fa-caret-down"></i> </a>
                    <!-- Danh sách Thể loại phim -->
                    <ul class="menudrop" id="country">
                    </ul>
                </li>

                <li class="menu__navFist nav__kind menu__parent_drop "><a href="javascript:void(0)">Thể loại <i class="fa-solid fa-caret-down"></i> </a>
                        <!-- Danh sách Thể loại phim -->
                        <ul class="menudrop" id="catelogy">
                     
                        </ul>
                </li>

                <li><a href="/xem-phim-le.html"><i class="fa-solid fa-film"></i> Phim lẻ </a></li>
                <li><a href="/xem-phim-dang-chieu.html"><i class="fa-solid fa-repeat"></i> Phim đang chiếu </a></li>
                <li class="menu__navFist nav__calendar"><a href="javascript:void(0)">Lịch chiếu phim <i
                            class="fa-solid fa-caret-down"></i></a>
                    <!-- Danh sách cách phim theo ngày  -->
                    <ul class="sub__menu__navFist--nav sub__nav--calendar">
                        <li><a href="/xem-phim-lich-chieu-phim-thu2.html">Thứ 2</a></li>
                        <li><a href="/xem-phim-lich-chieu-phim-thu3.html">Thứ 3</a></li>
                        <li><a href="/xem-phim-lich-chieu-phim-thu4.html">Thứ 4</a></li>
                        <li><a href="/xem-phim-lich-chieu-phim-thu5.html">Thứ 5</a></li>
                        <li><a href="/xem-phim-lich-chieu-phim-thu6.html">Thứ 6</a></li>
                        <li><a href="/xem-phim-lich-chieu-phim-thu7.html">Thứ 7</a></li>
                        <li><a href="/xem-phim-lich-chieu-phim-thu8.html">Chủ nhật</a></li>
                    </ul>
                </li>
                <li><a href="/xem-phim-hoan-thanh.html"><i class="fa-regular fa-circle-check"></i> Phim hoàn thành</a>
                </li>
                <li><a href="/xem-phim-sap-chieu.html"><i class="fa-regular fa-clock"></i> Phim sắp chiếu </a></li>
              
            </ul>
        </menu>
    </header>
    <!-- Modal -->


    <!-- toast -->
    <div id="toast" class="modal hidden">
        <div class="modal_container  pb-2 mx-4">
            <div class="modal_content row w-60">
                <div class="modal_content-head col-12">
                    <img class="toast__img" width="40" height="40" src="{{asset('img/danger.png')}}" alt="toastmessage">
                    <h1>Thông Báo</h1>
                    <button onclick="closeToast()" class="btn btn-danger me-1"><i
                            class="fa-solid fa-x btn_close"></i></button>
                </div>
                <div class="modal_content-container px-2 my-3 col-12">
                    <h2 class="modal_content-header fs-3">Thông báo </h2>
                    <p class="modal_content-des">vui lòng không spam</p>
                </div>
                <div class="modal_content-footer px-2 col-12">
                    <button onclick="closeToast()" class="btn btn-danger">Close</button>
                </div>
            </div>
        </div>
    </div>

    
    <!-- thông báo tổng -->
    <div class="modal__notice hidden">
        <div class="modal__notice-container">
            <img class="" src="{{asset('icon/bgnotice.png')}}" alt="">
            <span class="modal__notice--message">Vui lòng chọn đúng !</span>
        </div>
    </div>

    <!-- thông báo nap tien -->
    <div class="modal__toast_notice hidden">
        <div class="modal__toast_notice--container" style="background-image: url({{asset('icon/bg__topupnotice.png')}});">
            <button onclick="closeModal('.modal__toast_notice')" class="btn  modal__toast_notice-close"></button>
            <h1 class="modal__toast_notice--title fs-md-5 fs-6">
                Xác minh ngân hàng
            </h1>
            <div class="modal__toast_notice--body row">

                <h2 class="text-warning fs-6 col-12 text-center mt-3">Nhập thông tin ngân hàng của bạn để xác minh chính
                    chủ !</h2>
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <label for="selectBank" class="d-block">
                        <h6 class="text-start"> Ngân hàng:</h6>
                        <select class="input__style--topup" name="" id="selectBank">
                            <option value="1">VIETCOMBANK</option>
                            <option value="2">ARIBANK</option>
                            <option value="3">BIDV</option>
                            <option value="4">ACB</option>
                            <option value="5">VIETINBANK</option>
                        </select>
                    </label>
                    <label for="id-sm-tk" class="mt-2">
                        <h6 class="text-start">Tên Tài Khoảng:</h6>
                        <input type="text" placeholder="Tên Tài Khoảng" class="input__style--topup" id="id-sm-tk" />

                    </label>
                    <label for="id-sm-ck" class="mt-2">
                        <h6 class="text-start">Số Tiền:</h6>
                        <input type="text" oninput="formatnumber(this)" placeholder="Số Tiền"
                            class="input__style--topup number number" id="id-sm-ck" />

                    </label>

                    <button class="btn_image--pecial"><img src="{{asset('icon/btn_accept.png')}}" alt=""></button>
                </div>

            </div>
        </div>
    </div>
    <!-- end Modal -->
    <!-- Thanh cuộn -->
    <a class="gotoHead hidden" href="#header" title="Lên thanh Menu">
        <button class="btn py-2 px-2"><img src="{{asset('icon/btn_movetop.png')}}" alt=""></button>
    </a>
    <!-- Lớp overlay -->
    <div class="modal__overlay hidden">
    </div>

    <!-- Form login -->
    <div class="form__login container my-0  hidden" id="form__login" >
        <div class="row d-flex">
            <div class="form_login--container col-md-8 col-12 py-4" >
                <button style="my-3" class="btn btn-danger btn_close-form__login"
                    onclick="closeElement(this,'#form__login')">Close</button>
                <h2 class="fs-5 fw-bold text-center mb-4 mt-3">ĐĂNG NHẬP TÀI KHOẢN THÀNH VIÊN</h2>
                <form>
                    @csrf
                    <div class="mb-3 row me-2">
                        <label for="staticEmail" class="col-12 col-form-label">Email đăng nhập:</label>
                        <div class="col-12 box_input box__login">
                            <input type="text" placeholder="" data-type="email" class="form-control" name="user_email"
                                data-name="Email" id="staticEmail" value="">
                            <div class="box_message">Nhập UserName</div>
                            <p style="color: rgb(119, 7, 7)" class="m-0"  id="dbusernameMessage"> </p>
                        </div>
                    </div>
                    <div class="mb-3 row me-2">
                        <label for="staticPasswork" class="col-12 col-form-label">Mật khẩu:</label>
                        <div class="col-12 box_input box__login">
                            <input type="password" data-type="password" class="form-control" name="user_password"
                                data-name="password" id="passwordLogin" value="">
                            <div class="box_message">Nhập passwork </div>
                            <p style="color: rgb(119, 7, 7)" class="m-0"  id="dbpassMessage"> </p>
                        </div>
                    </div>
                    <div class="px-3"> <button id="btn_onsubmit" type="button" class="mt-4 mb-3 fs-5 fw-bold btn btn-success w-100"
                            onclick="ValidateFormLogin()">Đăng Nhập</button></div>
                </form>
                <a href="http://">Quên mật khẩu ?</a>
                <p class="text-center fs-5">Bạn chưa có tài khoản? <a href="{{route('form.regester')}}" class="text-uppercase"><strong>Đăng ký
                            ngay</strong></a></p>
                <figure class="figure">
                    <img src="{{asset('img/image_login.png')}}" width="150" class="figure-img img-fluid rounded"
                        alt="regester movibes">
                    <figcaption class="figure-caption">Giải trí sau áp lực.</figcaption>
                </figure>
            </div>
        </div>
    </div>

       <!-- Form Báo lỗi -->
       <div class="form__login container my-0 hidden" style="z-index: 11;" id="suport_erro">
        <div class="row d-flex">
            <div class="form_login--container col-md-8 col-12">
                <h2 class="fs-5 fw-bold  mb-4 mt-3"><img width="40" src="{{asset('img/danger.png')}}" alt=""><span class="ms-2"> Báo lỗi</span></h2>
                <form action="" id="Form__suport" onsubmit="return false">
                    <div class="mb-3 row me-2">
                        <label for="staticNameSuport" value="{{empty($users->name)?"0":$users->name}}" class="col-12 col-form-label">Tên của bạn:</label>
                        <div class="col-12">
                            <input type="text" placeholder="" data-type="Name" value="{{empty($users->name)?"":$users->name}}" class="form-control" maxlength="40" name="user_Name"
                                data-name="Name" id="staticNameSuport" value="">
                            <div class="box_message">Nhập Họ và Tên</div>
                        </div>
                    </div>
                    <div class="mb-3 row me-2 px-2">
                        <label for="staticContent" class="col-12 col-form-label">Nội dung:</label>
                        <textarea class="" minlength="10" maxlength="100"  name="staticContent" id="staticContent" rows="6"></textarea>
                    </div>
                   <div class="text-end px-4">
                        <button class="btn border text-white px-3" onclick="closeElement(this,'#suport_erro')">Đóng</button> <button class="btn btn-danger px-4" onclick="ValidateFormSuport(this)">Báo lỗi</button>
                   </div>
                </form>
        
                <figure class="figure">
                    <img src="{{asset('img/img_fixed.png')}}" width="150" class="figure-img img-fluid rounded"
                        alt="Fixed movibes">
                    <figcaption class="figure-caption">Chúng tôi sẽ cảm ơn sự đóng góp của bạn.</figcaption>
                </figure>
            </div>
        </div>
    </div>

       <!-- Form Đổi mật khẩu -->
       <div class="form__login container my-0 hidden box__center--modal" style="z-index: 3;" id="profile_changepasswork">
        <div class="row d-flex w-100">
            <div class="form_login--container col-md-8 col-12">
                <h2 class="fs-5 fw-bold  mb-4 mt-3 text-center"><span class="ms-2"> Đổi Mật Khẩu</span></h2>
                <form  onsubmit="return false">
                    <div class="mb-3 row me-2 px-2">
                        <label for="profille_user" class="col-12 col-form-label">UserName:</label>
                        <div class="col-12  box_input">
                            <input type="text" readonly data-type="Name" class="form-control" maxlength="100" name="profile_username"
                                data-name="Name" id="profille_user"  value="{{empty($users->email)?"0":$users->email}}">
                            <div class="box_message">Tài khoản của bạn</div>
                        </div>
                    </div>
                    <div class="mb-3 row me-2 px-2">
                        <label for="profile_pass" class="col-12 col-form-label">Mật khẩu cũ:</label>
                        <div class="col-12 box_input ">
                            <input type="password" placeholder="" data-type="Name" class="form-control" maxlength="100" name="profile_password"
                                data-name="Name" id="profile_pass" value="">
                            <div class="box_message">Nhập mật khẩu cũ</div>
                        </div>
                    </div>
                    <div class="mb-3 row me-2 px-2">
                        <label for="profile_rpass" value="" class="col-12 col-form-label">Mật khẩu mới:</label>
                        <div class="col-12  box_input">
                            <input type="password" placeholder="" data-type="Name" value="" class="form-control" maxlength="40" name="profile_password"
                                data-name="Name" id="profile_rpass" value="">
                            <div class="box_message">Nhập Mật khẩu mới</div>
                        </div>
                    </div>
                   <div class="text-end px-4">
                        <button class="btn border text-white px-3" onclick="closeElement(this,'#profile_changepasswork')">Đóng</button> <button class="btn btn-danger px-4" onclick="ValidateChangePass(this)">Thay đổi</button>
                   </div>
                </form>
        
                <figure class="figure">
                    <img src="{{asset('img/img_fixed.png')}}" width="150" class="figure-img img-fluid rounded"
                        alt="Fixed movibes">
                    <figcaption class="figure-caption">Đặt mật khẩu sao  cho dễ nhớ bạn nhé !.</figcaption>
                </figure>
            </div>
        </div>
    </div>

    <!-- ---------------------------------------End------------------------------------------------------ -->

    @yield('container')
    @yield('aside')
    <footer class="mb-0 mt-2">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4 col-12  my-lg-0 my-4">

                    <h6 class="fs-4">Thông tin liên hệ</h6>
                    <div class="footer__connect">
                        <a href="mailto:movibesfilm@gmail.com"><i class="fa-solid fa-envelope"></i>
                            Email: movibesfilm@gmail.com</a><br>
                        <a href="tel:+84325024277"><i class="fa-solid fa-phone-volume"></i>Phone: 0325024xxx</a><br>
                        <a href="https://goo.gl/maps/TzRZpupQuskCzBQ86" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-location-pin"></i>Địa chỉ: 200/34 Đường Tô Ký, Đông hưng
                            Thuận,
                            Quận 12, TP. HCM</a> <br>
                        <a href="{{route('film.home')}}" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-globe"></i>
                            Website : {{route('film.home')}}</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 px-lg-5 px-2">
                    <h6 class="text-center fs-4">Phương tiện tuyền thông <a href="{{route('film.home')}}"><img src="{{asset('img/logo.png')}}" alt="MOVIBES | Phim họat hình hay"></a></h6>
                    <div class="box__code d-flex justify-content-evenly">
                        <img src="{{asset('img/qrfacebook.png')}}" alt="Mã code facebook" title="Social Media facebook">
                        <img src="{{asset('img/qrinsta.png')}}" alt="Mã code instagram" title="Social Media Insta">
                        <img src="{{asset('img/qryoutube.png')}}" alt="Mã code youtube" alt="https://www.youtube.com/channel/UC6_Ea0pxumttuJwIPnis5JQ" title="Social Media Youtube">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                    <h6 class="fs-4 text-center">Theo dõi chúng tôi</h6>
                    <div class="fb-page w-100 text-center"
                        data-href="https://www.facebook.com/profile.php?id=100087004991368" data-tabs="timeline"
                        data-width="" data-height="80" data-small-header="false" data-adapt-container-width="true"
                        data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/profile.php?id=100087004991368"
                            class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/profile.php?id=100087004991368">Movibes Group</a>
                        </blockquote>
                    </div>

                </div>
            </div>
        </div>
        <section class="m-0 mt-2 text-center copyright">Bản quyền © thuộc về <strong><a href="{{route('film.trangchu')}}">MOVIBES.ONLINE</a></strong> - <a href="{{route('film.home')}}/sitemap.xml" target="_blank" rel="noopener noreferrer">SITEMAP</a> </section>
    </footer>
</body>

<script src="{{asset('js/api.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    let $$ = document.querySelector.bind(document);
    let $$l = document.querySelectorAll.bind(document);
</script>
<script src="{{asset('js/style.js')}}" type="text/javascript"></script>
<script src="{{asset('js/login.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0&appId=3210650549173249&autoLogAppEvents=1"
    nonce="OxIyeDUH"></script>

@yield('javascrpit')

</html>
