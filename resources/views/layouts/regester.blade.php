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
<?php if(!empty($_GET['sucess'])){
     setcookie("userLoading", "1", time() +3200, "/");
     echo '<script type="text/javascript">history.go(-2)</script>';
};?>
<body>
  <!-- thông báo tổng -->
  <div class="modal__notice hidden">
    <div class="modal__notice-container">
        <img class="" src="{{asset('icon/bgnotice.png')}}" alt="">
        <span class="modal__notice--message">Vui lòng chọn đúng !</span>
    </div>
</div>

<div class="loading loading_full hidden">
    <div class="loading__image">
        <img class="loading__logo--style" src="{{asset('img/loading.png')}}" alt="Mobives Logo"><img
            class="loading__brand--style" src="{{asset('img/logo.png')}}" alt="">
    </div>
</div>
<div class="loading Loading_logo hidden " style="opacity: 0.8;">
    <div class="loading__image">
        <img class="loading__logo--style" src="{{asset('img/loading.png')}}" alt="Mobives Logo">
    </div>
</div>
<div class="box__light btn">
    <img src="{{asset('icon/moon.png')}}" title="Mở chế độ ban đêm" data-name="moon" class="btn_moon hidden"
        onclick="changeBackground(this)" alt="Chế độ ban ngày">
    <img src="{{asset('icon/sun.png')}}" title="Mở chế độ ban ngày" data-name="sun" class="btn_sun hidden"
        onclick="changeBackground(this)" alt="Chế độ ban đêm">
    <span class="light_message">Tắt đèn</span>
</div>
<header class="container mb-md-0 mb-4">
    <div class="row">
        <div class="col-6 text-start">
            <a href="{{route('film.home')}}"><img src="{{asset('img/logo.png')}}" alt="logo Movibes"></a>
        </div>
        <div class="col-6 text-end"><a href="{{route('film.home')}}">Trở về trang chủ</a></div>
    </div>
    <style>.hidden{display: none}</style>
</header>
<main class="container">
   
    <div class="row">
        <?php if(!empty($_GET['sucess'])){
          
            setcookie("userLoading", "1", time() +3200, "/");
            echo '<h1 class=" fs-3 text-center col-12 mb-3">Bạn đã đăng ký thành công <a
                href="http://movibes.online/" class="d-sm-inline-block d-block">Click me</a></h1>';
           } else echo'<h1 class=" fs-3 text-center col-12 mb-3">Chào mừng bạn đã quay trở lại trang <a
                href="http://movibes.online/" class="d-sm-inline-block d-block">MOVIBES.ONLINE</a></h1>';
           
           
           ?>
     
       
        <form class="col-lg-7 col-12" method="POST" action="{{route('form.regester')}}">
            @csrf
            <h2 class="fs-5 fw-bold text-center mb-4">ĐĂNG KÍ TÀI KHOẢN THÀNH VIÊN</h2>
            <div class="mb-3 row me-2">
                <label for="staticEmail" class="col-12 col-form-label">Địa chỉ Email:</label>
                <div class="col-12 box_input">
                    <input type="text" data-type="email" class="form-control" name="user_email" data-name="Email"
                        id="staticEmail" value="">
                    <div class="box_message">Nhập Email </div>
                </div>
                <h6 class="text-left col-12" id="message_username"></h6>
            </div>
            <div class="col-12 row">
                <div class="mb-3 col-md-6 col-12">
                    <label for="inputPassword" class="col-12 col-form-label">Mật khẩu:</label>
                    <div class="col-12 box_input">
                        <input type="password" maxlength="60"  data-type="pass" class="form-control" name="use_password"
                            data-name="Password" id="inputPassword">
                        <div class="box_message">Nhập Mật khẩu </div>
                    </div>
                </div>
                <div class="mb-3  col-md-6 col-12">
                    <label for="inputPasswordr" class="col-12 col-form-label">Nhập lại Mật khẩu:</label>
                    <div class="col-12 box_input">
                        <input type="password" data-type="rpass" class="form-control" data-name="Repeat Password"
                            id="inputPasswordr">
                        <div class="box_message">Nhập Lại Mật khẩu </div>
                    </div>
                </div>
                <p class="from__message"><em>Mật khẩu đặt cho dễ nhớ bạn nhen !</em></p>
            </div>

            <div class="col-12 row">
                <div class="mb-3 col-md-6 col-12">
                    <label for="inputFullname" class="col-12 col-form-label">Họ và Tên:</label>
                    <div class="col-12 box_input">
                        <input type="text" data-type="name" class=" form-control" name="use_fullname"
                            data-name="Họ và Tên" maxlength="50" id="inputFullname" value="<?php echo (!empty($_GET['fullname']))?$_GET['fullname']:'';?>">
                        <div class="box_message">Nhập Họ Tên </div>

                    </div>
                </div>
                <div class="mb-3 col-md-6 col-12">
                    <label for="inputPhone" class="col-12 col-form-label">Số điện thoại:</label>
                    <div class="col-12 box_input">
                        <input type="text" data-type="phone" class=" form-control" name="use_phone"
                            data-name="Số điện thoại" minlength="9" maxlength="11"  id="inputPhone" value="<?php echo (!empty($_GET['phone']))?$_GET['phone']:'';?>">
                        <div class="box_message">Nhập Số điện thoại </div>
                    </div>
                </div>

            </div>
            <div class="col-12 row d-flex">
                <div class=" col-md-3 col-6 mb-4">Nhập mã kiểm tra</div>
                <div class=" col-md-3 col-6 mb-4 order-1 order-md-0 box_input">
                    <input type="text" data-type="capcha" data-name="Mã Capcha" placeholder="Capcha ..."
                        class="w-100 form-control" id="inputCapcha">
                    <div class="box_message">Nhập Số Mã capcha </div>
                </div>

                <div class=" col-md-3 col-6 mb-4 order-2 order-md-0 box__capcha">986532</div>
                <div class=" col-md-3 col-6 mb-4 order-3 order-md-0"><button type="button" onclick="changeCapcha()"
                        class="btn btn-primary">Reset
                        Captcha</button></div>
            </div>

            <div class="my-1 text-center ">
                <button class="btn btn-warning fs-5 me-4 text-body" type="submit" onclick="ValidateForm()">Đăng ký
                    tài
                    khoản</button>
                <button class=" btn btn-danger border border-danger fs-5 "><a class="text-white"
                        href="">Hủy</a></button>
            </div>
        </form>
        <div class="col-lg-5 d-lg-block d-none col-0">
            <figure class="figure">
                <img src="{{asset('img/image_register.png')}}" class="figure-img img-fluid rounded"
                    alt="regester movibes">
                <figcaption class="figure-caption">Cảm ơn bạn đã đồng hành cùng chúng tôi !.</figcaption>
            </figure>
        </div>
    </div>

</main>
</body>
<script>
 $(document).ready(function(){
    // form regester
    $("#staticEmail").blur(function(){
         var value=$(this).val();
         var _token = $("input[name='_token']").val();
  
         $.ajax({
                 url: "/dang-ky.html",
                 type:'POST',
                 data: {_token:_token, username:value},
                 success: function(res) {
                  
                    if(res){
                         $("#message_username").empty();
                         $("#message_username").css("color","#f44336")
                        $("#message_username").append("Tài khoảng "+value+" đã tồn tại !");
                    }
                    else{
                       $("#message_username").empty();
                    }
                 }
             });
        });
})
</script>
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
    let listInput = $$l('.form-control');
    let message = $$l('.box_message');
    let patternEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let patternFullname = /^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i;
    function isVietnamesePhoneNumber(number) {
        return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
    }
    $$('.box__capcha').innerText = makeid(6);
    function ValidateForm() {
        Array.from(listInput).forEach((input, index) => {
            let box_input = input.closest('.box_input');
            let nameInput = input.getAttribute('data-name');
            input.addEventListener('input', function () {
                if (input.value) {
                    input.classList.remove('error');
                    message[index].innerHTML = `Trường ${nameInput} đang được cập nhập.`;
                }
                else {
                    input.classList.add('error');
                    message[index].innerHTML = `Trường ${nameInput} không được để trống !`;
                }
            });
            input.addEventListener('blur', function () {
                if (!input.value) {
                    input.classList.add('error');
                    message[index].innerHTML = `Trường ${nameInput} không được để trống !`;
                }
                else {
                    input.classList.remove('error');
                    message[index].innerHTML = `Trường ${nameInput} đã được cập nhập !`;
                }
            });
            if (!input.value) {
                input.classList.add('error');
                message[index].innerHTML = `Trường ${nameInput} không được để trống !`;
            }
            else {
                input.classList.add('error');
                message[index].innerHTML = `${nameInput} không hợp lệ!`;

                if (input.getAttribute('data-type') == 'email') {
                    let result = input.value.match(patternEmail);
                    if (result) {
                        input.classList.remove('error');
                        message[index].classList.add('hidden');
                    }

                }
                if (input.getAttribute('data-type') == 'phone') {
                    if (isVietnamesePhoneNumber(input.value)) {
                        input.classList.remove('error');
                        message[index].classList.add('hidden');
                    }

                }
                if (input.getAttribute('data-type') == 'name') {
                    let result = input.value.match(patternFullname);
                    if (result) {
                        input.classList.remove('error');
                        message[index].classList.add('hidden');
                    }
                }

                if (input.getAttribute('data-type') == 'capcha') {
                    let result = $$('.box__capcha').innerText;
                    console.log(result, input.value)
                    if (result.toLocaleLowerCase() == input.value.trim().toLocaleLowerCase()) {
                        input.classList.remove('error');
                        message[index].classList.add('hidden');
                    }
                    else if (String(result).toLocaleLowerCase() == String(input.value).toLocaleLowerCase()) {
                        message[index].innerHTML = `Mã Capcha sai kiểu hoa thường !`;
                    }
                    else{
                        message[index].innerHTML = `Mã Capcha sai !`;
                        setTimeout(() => {
                        changeCapcha()
                        }, 1000);
                    }
                   
                }
            }

        });
        let inputPassword = $$('#inputPassword');
        let inputPasswordr = $$('#inputPasswordr');
        if (inputPassword.value && inputPasswordr.value) {
            if (inputPassword.value == inputPasswordr.value) {
                inputPassword.classList.remove('error');
                inputPasswordr.classList.remove('error');
                inputPassword.value=inputPassword.value.trim(); 
                inputPassword.closest('.box_input').querySelector('.box_message').innerHTML = ``;
                inputPasswordr.closest('.box_input').querySelector('.box_message').innerHTML = ``;
            }
            else {
                inputPassword.closest('.box_input').querySelector('.box_message').innerHTML = `Password không khớp với nhau!`;
                inputPasswordr.closest('.box_input').querySelector('.box_message').innerHTML = `Password không khớp với nhau!`;
            }
        }
        let total_result = Array.from(listInput).find(input => {
            return input.className.includes('error');
        })
        if (!total_result) {
            if($$("#message_username").innerText.includes('đã')){
                modal__notice(`${$$("#message_username").innerText}`,2000);
                return false;
            }
            modal__notice(`Thư chúc mừng đã gửi vào : ${$$("#staticEmail").value}`,2000);

            $$('form').onsubmit = true;
             $$('.Loading_logo').classList.remove('hidden');
            return true;
        }
        return false;
    }
    function changeCapcha() {
        $$('.box__capcha').innerText = makeid(6);
        $$('#inputCapcha').value='';
    }
    setTimeout(() => {
        $$('.loading_full').classList.add('hidden');
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
            localStorage.setItem(idLocal, `${Number(hour) >= 12 ? 'moon' : 'sun'}`);
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
    // Tạo modal__notice
function modal__notice(message, time = 2000) {
    if (message) {
        let modal__notice = $$('.modal__notice');
        let box__message = $$('.modal__notice--message');
        modal__notice.classList.remove('hidden');
        box__message.innerHTML = message;
        setTimeout(() => {
            modal__notice.classList.add('hidden');
        }, time);

        return true;
    }
    return false;
}
</script>
</html>

