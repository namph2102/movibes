<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://i.imgur.com/qbF6OrO.png" type="image/x-icon">

    <title>[movibes.online]-Chúc mừng thành viên mới - {{$userNew->name}}</title>
</head>
<body>
    <header>
        <a href="{{route('film.home')}}"><img width="60" src="https://i.imgur.com/qbF6OrO.png" alt=""> <img width="140"
                src="https://i.imgur.com/MmBTU62.png" alt=""></a>
        <div style="width: 100%;height:4px; background-color: rgb(44, 194, 231); "></div>
        <h1 style="font-size: 16px;color:rgb(202, 10, 10);"><strong>MOVIBES TRÂN TRỌNG THÔNG BÁO</strong></h1>
        </div>
    </header>

    <main style="margin-top: 8px;">
        <p>Xin chào: Thành viên mới <strong style="text-transform: capitalize;">  {{$userNew->name}} </strong></p>
        <p>Đây là lần đầu tiên tôi gửi email cho bạn !</p>
        <p>Bạn nhận được email này, vì đã đăng ký thành công tài khoản mới trên hệ thống <a
                href="{{route('film.home')}}">movibes.online</a></p>
        <ul>
            <li>Bạn đã đăng ký thành công bất chấp mọi rào cản !.</li>
            <li>Vì lý do bảo mật nên tôi xin trân trọng thông báo để xác thực!</li>
            <li>Ngày tạo  {{$userNew->created_at}}</li>
            <li>Nếu trang website bị lỗi hãy báo cáo qua Facebook: <a href="https://www.facebook.com/profile.php?id=100087004991368" target="_blank" rel="noopener noreferrer">Movibes Group</a></li>
        </ul>
        <hr>
    </main>
    <footer>
        <p>Chúc bạn một ngày mới tốt lành và cảm ơn  đã sử dụng dịch vụ của  mình!</p>
    </footer>
</body>
 <script src="">
     
 </script>
</html>