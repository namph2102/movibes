<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">

<meta name="keywords" content="dang ky moviebes,login movibes,dang ky phim online, regester movibes">
<meta name="description"
    content="Đăng ký tài khoản tại Mobibes, hãy trở thành thành viên thân thiết cùng với những chức năng hấp dẫn khác tại movibes.online">
<meta name="robots" content="noodp,index,follow" />

<meta property="og:type" content="article" />
    <!-- goomap -->
    <meta name="geo.region" content="VN" />
    <meta name="geo.placename" content="Ho Chi Minh City" />
    <meta name="geo.position" content="10.775844;106.701756" />
    <meta name="ICBM" content="10.775844, 106.701756" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<meta property="og:image" content="{{asset('img/loading.png')}}" />
<meta property="article:tag" content="" />
<link rel="stylesheet" href="{{asset('css/login.css')}}">
<title>Đăng Ký - MOVIBES- Website Xem phim miễn phí</title>

<head>

<body>
    <?php if(!empty($_GET['sucess'])){
        setcookie("userLoading", "1", time() +3200, "/");
   };?>
    <?php if(!empty($_GET['sucess'])){
          
        setcookie("userLoading", "1", time() +3200, "/");
        echo '<h1 class=" fs-3 text-center col-12 mb-3">Bạn đã Nhập thành thành công <a
            href="{{route("film.trangchu")}}" class="d-sm-inline-block d-block">Click me</a></h1>';
       } 
       
       ?>
    <div id="loadding" class="loading hidden">
        <div class="loading__image">
            <img class="loading__logo--style" src="{{asset('img/loading.png')}}" alt="Mobives Logo"><img
                class="loading__brand--style" src="{{asset('img/logo.png')}}" alt="">
        </div>
    </div>
    <div class="box__light btn">
        <img src="{{asset('icon/moon.png')}}" title="Mở chế độ ban đêm" data-name="moon" class="btn_moon hidden"
            onclick="changeBackground(this)" alt="Chế độ ban ngày">
        <img src="{{asset('icon/sun.png')}}" title="Mở chế độ ban ngày" data-name="sun" class="btn_sun hidden"
            onclick="changeBackground(this)" alt="Chế độ ban đêm">
        <span class="light_message">Tắt đèn</span>
    </div>
    <div class="form__login container ">
    
        <div class="row d-flex">
            <div class="col-4 d-lg-block d-none mt-lg-5 mt-0">
                <figure class="figure">
                    <img src="{{asset('img/image_login.png')}}" class="figure-img img-fluid rounded"
                        alt="login movibes">
                    <figcaption class="figure-caption">Giải trí sau áp lực.</figcaption>
                </figure>
            </div>
            <div class="form_login--container col-md-8 col-12 py-4">
                <h4 class=" fs-ms-5 fs-6 text-center col-12 mb-3">Chào mừng bạn đã quay trở lại trang <a
                        href="{{route('film.home')}}" class="d-sm-inline-block d-block">MOVIBES.ONLINE</a></h4>
                <h2 class="fs-5 fw-bold text-center mb-4">ĐĂNG NHẬP TÀI KHOẢN THÀNH VIÊN</h2>
                <form id="form_login" action="{{route('form.loginregester')}}" onsubmit="return false" method="POST">
                    @csrf   
                    <div class="mb-3 row me-2">
                        <label for="staticEmail" class="col-12 col-form-label">Email đăng nhập:</label>
                        <div class="col-12 box_input box__login">
                            <input type="text" placeholder="" data-type="email" class="form-control" name="user_email"
                                data-name="Email" id="staticEmail" value="">
                            <div class="box_message">Nhập UserName</div>
                        </div>
                        <p id="message_username"></p>
                    </div>
                    <div class="mb-3 row me-2">
                        <label for="staticPasswork" class="col-12 col-form-label">Mật khẩu:</label>
                        <div class="col-12 box_input box__login">
                            <input type="password" data-type="password" class="form-control" name="user_password"
                                data-name="password" id="passwordLogin" value="">
                            <div class="box_message">Nhập passwork </div>
                            <p id="message_password"></p>
                        </div>
                    </div>
                    <div class="px-3">  <button id="btn_login"  type="button" class="w-100 mt-4 mb-3 fs-5 fw-bold btn btn-success"
                            onclick="ValidateFormLogin()">Đăng Nhập</button></div>
                </form>
              
                <p class="text-center fs-6">Bạn chưa có tài khoản? <a href="{{route("form.regester")}}" class="text-uppercase d-block d-sm-inline-block"><strong>Đăng ký
                            ngay</strong></a></p>
                <figure class="figure d-lg-none">
                    <img src="{{asset('img/image_login.png')}}" width="150" class="figure-img img-fluid rounded"
                        alt="login movibes">
                    <figcaption class="figure-caption">Giải trí sau áp lực.</figcaption>
                </figure>
            </div>
           
        </div>
    </div>
</body>

<script type="text/JavaScript">
    function killCopy(e){
    return false
    }
    function reEnable(){
    return true
    }
    document.onselectstart=new Function ("return false")
    if (window.sidebar){
    document.onmousedown=killCopy
    document.onclick=reEnable
    }
</script>
<script>
    $(document).ready(function(){
        $("#staticEmail").blur(function(){
           let staticEmail=$("#staticEmail").val();
           if(!staticEmail) return false;
            $.get("/dang-nhap-check.html",{action:"check",username:staticEmail},function(data){
                if(!data){
                         $("#message_username").empty();
                         $("#message_username").css("color","#f44336")
                        $("#message_username").append("Tài khoảng "+staticEmail+" không tồn tại !");
                    }
                    else{
                       $("#message_username").empty();
                       $("#message_username").css("color","rgb(214, 214, 11)")
                        $("#message_username").append("Tài khoản "+staticEmail+" có thể login !");
                       
                    }
            })
        })

        $("#passwordLogin").blur(function(){
           let staticEmail=$("#staticEmail").val();
           let user_password=$("#passwordLogin").val();
           if(!user_password) return false;
            $.get("/dang-nhap-check.html",{action:"submit",user_password:user_password,username:staticEmail},function(data){
                if(!data){
                         $("#message_password").empty();
                         $("#message_password").css("color","#f44336")
                        $("#message_password").append("Mật khẩu không chính xác !");
                    }
                    else{
                       $("#message_password").empty();
                       $("#message_password").css("color","rgb(214, 214, 11)")
                        $("#message_password").append("Mật khẩu chính chính xác!");
                        setTimeout(()=>{
                            $("#loadding").removeClass("hidden");
                            $("#form_login").submit();
                        },1000)
                    }
            })
        })

    })

    // Tạo id
    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

    // validate form pro
    let $$ = document.querySelector.bind(document);
    let $$l = document.querySelectorAll.bind(document);
    let listInput = $$l('.box__login .form-control');
    let message = $$l('.box__login .box_message');
    let patternEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$$/i;
    let patternFullname = /^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$$/i;
    function ValidateFormLogin() {
        Array.from(listInput).forEach((input, index) => {
            let box_input = input.closest('.box_input.box__login');
            let nameInput = input.getAttribute('data-name');
            input.addEventListener('input', function () {
                if (input.value) {
                    input.classList.remove('error');
                    message[index].innerHTML = `Trường $${nameInput} đang được cập nhập.`;
                }
                else {
                    input.classList.add('error');
                    message[index].innerHTML = `Trường $${nameInput} không được để trống !`;
                }
            });
            input.addEventListener('blur', function () {
                if (!input.value) {
                    input.classList.add('error');
                    message[index].innerHTML = `Trường $${nameInput} không được để trống !`;
                }
                else {
                    input.classList.remove('error');
                    message[index].innerHTML = `Trường $${nameInput} đã được cập nhập !`;
                }
            });
            if (!input.value) {
                input.classList.add('error');
                message[index].innerHTML = `Trường $${nameInput} không được để trống !`;
            }
            else {
                input.classList.add('error');
                message[index].innerHTML = `$${nameInput} không hợp lệ!`;

                if (input.getAttribute('data-type') == 'email') {
                    let result = input.value.match(patternEmail);
                    if (result) {
                        input.classList.remove('error');
                        message[index].classList.add('hidden');
                    }
                }

                if (input.getAttribute('data-type') == 'password') {
                    input.classList.remove('error');
                    message[index].classList.add('hidden');

                }

            }
        });
        let passwordLogin = $$('#passwordLogin');
        let total_result = Array.from(listInput).find(input => {
            return input.className.includes('error');
        })
        if (!total_result) {
            $$('form').onsubmit = true;
            return true;

        }
        return false;
    }
    setTimeout(() => {
        $$('.loading').classList.add('hidden');
    }, 4000);
    function rootStyle(bg, text) {
        root.style.setProperty('--bg--color', bg);
        root.style.setProperty('--text--color', text);
    }
    var root = $$(':root');
    var idLocal = 'asdasdasdsadsaasd2323asd';

    SetStyle();
    function SetStyle() {
        let getLocalStyle = localStorage.getItem(idLocal);
        if (getLocalStyle) {
            if (getLocalStyle == 'sun') {
                rootStyle("#f5f7fd", "#1d1d1d");
                $$('.btn_moon').classList.add('hidden');
                $$('.btn_sun').classList.remove('hidden');
                $$('.light_message').innerHTML = 'Bật đèn';
            }
            else {
                localStorage.setItem(idLocal, 'moon');
                rootStyle("#21242D", "#f7efef");
                $$('.btn_moon').classList.remove('hidden');
                $$('.btn_sun').classList.add('hidden');
                $$('.light_message').innerHTML = 'Tắt đèn';
            }

        }
        else {
            let hour = new Date().getHours();
            localStorage.setItem(idLocal, `$${Number(hour) >= 12 ? 'moon' : 'sun'}`);
            SetStyle();
        }
    }


    function changeBackground(e) {
        if (e.getAttribute('data-name') == 'moon') {
            localStorage.setItem(idLocal, 'sun');

        }
        else {
            localStorage.setItem(idLocal, 'moon');

        }

        SetStyle();
    }
</script>

</html>

