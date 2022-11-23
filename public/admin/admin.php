<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <meta name="robots" content="index,follow" />
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
    <link rel="stylesheet" href="css/dashboard.css">

    
    <title> Admin</title>
</head>
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
                <a href="{{route('admin.home')}}">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="{{route('admin.account')}}">
                    <i class="bx bx-home-alt"></i>
                    <span class="links_name">User Profile</span>
                </a>
                <span class="tooltip">User Profile</span>
            </li>
            <li>
                <a href="{{route('admin.product')}}">
                    <i class="bx bx-compass"></i>
                    <span class="links_name">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-movie-play"></i>
                    <span class="links_name">Library</span>
                </a>
                <span class="tooltip">Library</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-folder"></i>
                    <span class="links_name">File Manager</span>
                </a>
                <span class="tooltip">File Manager</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-cart-alt"></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-heart"></i>
                    <span class="links_name">Saved</span>
                </a>
                <span class="tooltip">Saved</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
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
            <?php include('blade/creataccount.php') ;?> 
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
            <button class="sidebar_vip blue"><a href="#">GOTO WEBSTIE</a></button>
        </div>
    </div>



</body>

<script>
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
    let btn = $("#btn");
    let sidebar = $(".sidebar");
    let searchBtn = $(".bx-search");
    let icon_Btn = $(".container_content-comback i");
    let settings = $(".settings");
    let settings_controller = $(".settings_controller")
    let setting_light_more = $(".setting_light_more");
    let setting_dark_more = $(".setting_dark_more");
    let color_pink = $(".color.pink");
    let color_blue = $(".color.blue");
    let color_green = $(".color.green");
    let sidebar_vip = $(".sidebar_vip");
    let bg_menu_vip=$('.bg_menu_vip');
    let text_menu_vip=$('.text_menu_vip');
    var rootStyle = document.documentElement.style;
    if(!localStorage.getItem('bg_menu')){
        localStorage.setItem('bg_menu',"#ead4b7");
         localStorage.setItem('text_sidebar',"#ae369c");
        localStorage.setItem('bg_content','#1E1B3A');
        localStorage.setItem('text_color','rgba(255,255,255,0.97)');
    }
    
    let is_Icons_push=localStorage.getItem('is_Icons_push');
    if(is_Icons_push=='true'){
        sidebar.classList.add("active");
        icon_Btn.classList.toggle("fa-circle-right");
    }
    let bg_menu=localStorage.getItem('bg_menu');
    let text_sidebar=localStorage.getItem('text_sidebar');
    let bg_content=localStorage.getItem('bg_content');
    let text_color=localStorage.getItem('text_color');
    rootStyle.setProperty('--bg-sidebar', bg_menu);
    rootStyle.setProperty('--text-sidebar', text_sidebar);
    rootStyle.setProperty('--bg', bg_content);
    rootStyle.setProperty('--text-color', text_color);

    rootStyle.setProperty('--color', "#222831");
    function local_color_nav(bg_menu,text_sidebar){
        rootStyle.setProperty('--bg-sidebar', bg_menu);
        rootStyle.setProperty('--text-sidebar', text_sidebar);
        localStorage.setItem('bg_menu', bg_menu);
        localStorage.setItem('text_sidebar', text_sidebar);
    }
    color_pink.onclick = function() {
        bg_menu="rgba(255,255,255,0.8";
        text_sidebar="#5e4040";
        local_color_nav(bg_menu,text_sidebar);
    }
    color_blue.onclick = function() {
        bg_menu= "#26275e";
        text_sidebar= "#a3bb1c";
        local_color_nav(bg_menu,text_sidebar);
    }
    color_green.onclick = function() {
        bg_menu="#0f6e6d";
        text_sidebar= "#d07558";
        local_color_nav(bg_menu,text_sidebar);
    }
    setting_light_more.onclick = function() {
        bg_content="#fff";
        text_color="rgba(0,0,0,0.9)";
        rootStyle.setProperty('--bg', bg_content);
        rootStyle.setProperty('--text-color', text_color);
        localStorage.setItem('bg_content', bg_content);
        localStorage.setItem('text_color', text_color);
    }
    setting_dark_more.onclick = function() {
        bg_content="#1E1B3A";
        text_color="rgba(255,255,255,0.97)";
        rootStyle.setProperty('--bg', bg_content);
        rootStyle.setProperty('--text-color', text_color);
        localStorage.setItem('bg_content', bg_content);
        localStorage.setItem('text_color', text_color);
    }


    settings.onclick = function(e) {
        settings_controller.classList.toggle("hide");
        e.stopPropagation();
        
    }
    settings_controller.onclick = function(e) {
        e.stopPropagation();
    }
    document.onclick = function () {
       if(!settings_controller.classList.contains("hide")){
        settings_controller.classList.add('hide');
       }
    }
    change_color_vip();
    function change_color_vip(){
        bg_menu_vip.value=localStorage.getItem('bg_menu');
        text_menu_vip.value=localStorage.getItem('text_sidebar');
        bg_menu_vip.addEventListener('input',function(e){
        rootStyle.setProperty('--bg-sidebar', e.target.value);     
        })
        bg_menu_vip.addEventListener('change',function(e){
        localStorage.setItem('bg_menu', bg_menu);
        })
        text_menu_vip.addEventListener('input',function(e){
        rootStyle.setProperty('--text-sidebar', e.target.value);
        })
        text_menu_vip.addEventListener('change',function(e){
        localStorage.setItem('text_sidebar',  e.target.value);
        })
    }
    function local_icon_push(element){
        let isS=element.classList.contains('active');
        localStorage.setItem('is_Icons_push',isS);
    }
    sidebar_vip.onclick = function() {
        sidebar.classList.toggle("active");
        icon_Btn.classList.toggle("fa-circle-right");
        local_icon_push(sidebar);
    }
    btn.onclick = function() {
        sidebar.classList.toggle("active");
        icon_Btn.classList.toggle("fa-circle-right");
         local_icon_push(sidebar);
    }
    searchBtn.onclick = function() {
        sidebar.classList.toggle("active");
        icon_Btn.classList.toggle("fa-circle-right");
         local_icon_push(sidebar);
    }
    icon_Btn.onclick = function() {
        sidebar.classList.toggle("active");
        this.classList.toggle("fa-circle-right");
         local_icon_push(sidebar);
    }
</script>
</html>