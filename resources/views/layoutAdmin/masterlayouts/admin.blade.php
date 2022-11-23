<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('admin/css/dashboard.css')}}">
    <link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">
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
        <meta name="keywords" content="nap tien, uung ho,movie, movibes, xem tat ca phim mobives, phim hay movibes, phim hoat hinh, phim chat luong, phim hoat hinh 3d trung quoc">
    <meta name="description"
    content="MOVIBES Rất cảm ơn quý khách, mọi sự ủng hộ của bạn giúp chúng tôi có động lực để duy trì và cải thiện tối tốt hơn mang đến sự thư giản">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('head')
    <title> Quản trị viên MOVIBES</title>
</head>
@yield('style')
<body>
    <div class="sidebar">
        <div class="logo_content">  
            <div class="logo">
                <i class="bx bxl-html5"></i>
                <div class="logo_name">Admin</div>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <i class="bx bx-search"></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="{{route('admin.dashboard')}}">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="{{route("admin.users")}}">
                    <i class="bx bx-home-alt"></i>
                    <span class="links_name">User Profile</span>
                </a>
                <span class="tooltip">User Profile</span>
            </li>
           
            <li>
                <a href="{{route("admin.films")}}">
                    <i class="bx bx-movie-play"></i>
                    <span class="links_name">Film</span>
                </a>
                <span class="tooltip">Film</span>
            </li>
            <li>
                <a href="{{route("topup.show")}}">
                    <i class="bx bx-compass"></i>
                    <span class="links_name">Coins</span>
                </a>
                <span class="tooltip">Coins</span>
            </li>
            <li>
                <a href="{{route("icons.show")}}">
                    <i class="bx bx-folder"></i>
                    <span class="links_name">Show Icons</span>
                </a>
                <span class="tooltip">Show Icons</span>
            </li>
            <li>
                <a href="{{route("catelory.show")}}">
                    <i class="bx bx-heart"></i>
                    <span class="links_name">Category</span>
                </a>
                <span class="tooltip">Category</span>
            </li>
            <li>
                <a href="{{route("country.show")}}">
                    <i class="fa-solid fa-globe"></i>
                    <span class="links_name">Quốc Gia</span>
                </a>
                <span class="tooltip">Quốc Gia</span>
            </li>
            <li>
                <a href="{{route("creatsitemap.show")}}">
                    <i class="fa-solid fa-sitemap"></i>
                    <span class="links_name">Site Map
                    </span>
                </a>
                <span class="tooltip">Sit Map
                </span>
            </li>

            <li>
                <a href="{{route("baoloi.show")}}">
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Báo lỗi</span>
                </a>
                <span class="tooltip">Báo lỗi</span>
            </li>

          
           
        </ul>

        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <img src="https://haycafe.vn/wp-content/uploads/2021/12/hinh-anh-anime-nam-ngau-lanh-lung-1-742x600.jpg" alt="">
                    <div class="name_job">
                        <div class="name">Hoài Nam</div>
                        <div class="job">Web Developer</div>
                    </div>
                </div>
                <i class="bx bx-log-out" id="log_out"></i>
            </div>
        </div>
    </div>
    <div class="home_content">
        <div class="container_home">
            <div class="container_content-comback">
                <i class="fa-solid fa-circle-left icon_vipback"></i>
                <div class="container_home_directory">

                   <!--Điều Hướng Here-->
                   @yield('direction')
                    <!--End Điều Hướng Here-->

                </div>
                <div class="container_content-logo_admin">                 
                     <a href="#"> <i class="fa-solid fa-globe"></i></a>
                    <div class="logo_admin_icon_down"><img src="https://st.quantrimang.com/photos/image/2022/02/26/anonymous-tuyen-bo-se-danh-sap-cac-trang-web-cua-chinh-phu-nga.jpg" alt="">
                        <i class="fa-solid fa-caret-down"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="home">
            <div class="container_content">
            <!--Container Here-->
                @yield('container')
            <!--End Container Here-->
            </div>
        </div>
    </div>

    <div class="settings">
        <div class="set_icon"><i class="fa-solid fa-gear"></i></div>
        <div class="settings_controller hide">
            <h5>SIDEBAR BACKGROUND</h5>
            <div class="colors-setting">
                <div class="color pink"></div>
                <div class="color blue"></div>
                <div class="color green"></div>
            </div>
            <div class="change_frontend_menu">
                <span>BackGround</span><input type="color" class="bg_menu_vip" value="#ff0000" /> <input type="color"   class="text_menu_vip" value="#fff214"/>  <span>Text Menu</span>
            </div>
            <div class="colors-setting">
                <div class="colors-setting setting_light_more"><span>LIGHT MORE</span>
                    <div class="color white"></div>
                </div>
                <div class="colors-setting setting_dark_more">
                    <div class="color dark"></div><span>DARK MORE</span>
                </div>
            </div>
            <button class="pink"><a href="#">Change Admin</a></button>
            <button class="blue"><a href="#">Documentation</a></button>
            <h4>MY WEBSITE </h4>
            <button class="sidebar_vip blue"><a href="{{route("film.home")}}">GOTO WEBSTIE</a></button>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset("admin/js/admin.js")}}"></script>
@yield('js')
</html>