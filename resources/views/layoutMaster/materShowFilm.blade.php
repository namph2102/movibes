@extends('layoutMaster.masterlayout')
@section('meta')
@yield('header')
@endsection

{{-- l ấy id phim --}}



@section('aside')

<article>
    
    <div class="container conments px-0" id="form__chatting_direct">
        <div class="conments__header">
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-home_selector btn_repeat"><i class="fa-solid fa-rotate-right"></i></button>
                </div>
                <div class="col-10 text-end">
                    <button class="btn btn-home_selector btn__conments" >Bình Luận</button>
                    <button class="btn btn-home_selector btn_top ms-1">Phong Thần</button>
                    <button class="btn btn-home_selector btn_guide ms-1 mt-1 mt-sm-0">HD</button>
                </div>
            </div>
            <span class="px-2 my-2 d-md-inline-block d-block text-sm-left text-center">Nếu có lỗi khi sử dụng hãy thông báo cho mình : <a href="https://www.facebook.com/profile.php?id=100087004991368" target="_blank" class="d-md-inline-block d-block text-sm-left text-center" rel="noopener noreferrer">MOVIBES FANPAGE</a></span>
        </div>

        <div class="conments__container" >

            <div class="products__loadding hidden">
                <div class="loading__image">
                    <img class="loading__logo--style" src="{{asset('img/loading.png')}}" alt="">
                </div>
            </div>

            
            <form class="conments__container__chat my-1" onsubmit="return false" method="POST" id="form__chatting">
                @csrf
                <p class="text-danger text-center warning_chatting col-12 pt-1 fs-6"><a href="#form__chatting_direct" onclick="openElement(this,'#form__login')" class="fw-bold fs-5" style="text-decoration: none; cursor: pointer;"  rel="noopener noreferrer"><em>Đăng nhập</em></a> để bình luận bình luận...!</p>
                <input  class="chating hidden" name="comments" id="chatting" rows="1" maxlength="101" placeholder="Viết bình luận..."/>
                <button type="submit" id="btn_Binhluan" class="btn btn-success " onclick="submitComment('#form__chatting')"><i class="fa-solid fa-share pe-1"></i>Gửi</button>
                
            </form>
            <div class="loading__chatting hidden">
                <div class="box__container">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <p class="loading__chatting-message">Ai đó đang bình luận....</p>
            </div>
            <ul class="box__container--scrool menu__conment" id="binhluan">
            
            </ul>
            <ul class="box__container--scrool menu__conment hidden" id="bxh">
               
               <li class="d-inline-block" style="height: 160px;"></li>
                <div class="" id="bxhUser">
                    
                </div>
            </ul>
            <div class="box__container--scrool content__rules menu__conment hidden" id="hd">
                <h3><strong>1. Lưu ý</strong></h3>
                <ol type="a">
                    <li>Mỗi một bộ phim được xem sẽ tính 2 điểm kinh nghiệm, qua ngày mới (12 giờ đêm) xem lại cùng
                        bộ phim đó sẽ tính thêm 2 điểm kinh nghiệm.</li>
                        <li>Khi nạp thẻ thành công <span class="text-warning">1000 coin</span> tương ứng với <code>10 điểm lực chiến</code> và <code> 10 điểm vip</code></li>
                    <li>Mỗi một cấp độ sẽ cần một lượng kinh nghiệm nhất định để đột phá. Mỗi một đại cảnh giới sẽ
                        có những danh hiệu khác nhau.</li>
                    <li>Mỗi tài khoản đăng nhập trên một trình duyệt nhất định, nếu đăng nhập tài khoản đó trên
                        trình duyệt khác sẽ bị đăng xuất trên trình duyệt cũ và ngược lại.</li>
                    <li><strong class="text-danger">Bảng Phong Thần</strong> xếp hạng dựa vào lực chiến (EXP)</li>
                </ol>
                <h3> <strong>2. Hê thống cảnh giới</strong> </h3>
                <ol type="A">
                    <li style="color:#fff;">- Lv.1 Phàm Nhân </li>
                    <li style="color:#fffff1;">- Lv.2 Luyện Khí Kỳ</li>
                    <li style="color:#7c7c64;"> - Lv.3 Trúc Cơ Kỳ</li>
                    <li style="color:#c9c989;">- Lv.4 Kết Đan Kỳ </li>
                    <li style="color:#dfdf4d;">- Lv.5 Nguyên Anh Kỳ </li>
                    <li style="color:#7e7e1c;">- Lv.6 Hóa Thần Kỳ </li>
                    <li style="color:#43d64b;">- Lv.7 Luyện Hư Kỳ </li>
                    <li style="color:#19b313;"> - Lv.8 Hợp Thể Kỳ</li>
                    <li style="color:#20bb3a;"> - Lv.9 Đại Thừa Kỳ</li>
                    <li style="color:#01f736;"> - Lv.10 Độ Kiếp Kỳ</li>
                    
                    <li style="color:#0cb3b3;">- Lv.11 Ngụy Tiên </li>
                    <li style="color:#1087be;"> - Lv.12 Huyền Tiên</li>
                    <li style="color:#02828b;"> - Lv.13 Địa Tiên</li>
                    <li style="color:#068888;"> - Lv.14 Chân Tiên Cảnh</li>
                    <li style="color:#055a74;"> - Lv.15 Kim Tiên Cảnh</li>

                    <li style="color:#b62dec;"> - Lv.16 Vương Cấp Sơ Kỳ</li>
                    <li style="color:#af0bb4;"> - Lv.17 Vương Cấp Trung Kỳ</li>
                    <li style="color:#790560;"> - Lv.18 Vương Cấp Hậu Kỳ</li>

                    <li style="color:#f83650;"> - Lv.19 Thần Cấp Sơ Kỳ</li>
                    <li style="color:#c22b33;"> - Lv.20 Thần Cấp Trung Kỳ</li>
                    <li style="color:#b31c35;"> - Lv.21 Thần Cấp Hậu Kỳ</li>

                    <li style="color:#ac1818;">- Lv.22 Chuẩn Tiên Đế </li>
                    <li style="color:#e2d519;">- Lv.23 Tiên Đế</li>
                    <li style="color:#f5e506;">- Max : Chí Tôn Tiên Đế</li>
                </ol>
                <h3> <strong>3. Hệ thống vip</strong> </h3>
                <ol type="I">
                    <li style="color:#fff;">- Vip 0 Exp:(0/1000)</li>
                    <li style="color:rgb(180, 168, 176);">- Vip 1 Exp:(1000/2000)</li>
                    <li style="color:rgb(145, 108, 130);">- Vip 2 Exp:(2000/3000)</li>
                    <li style="color:rgb(155, 106, 139);">- Vip 3 Exp:(3000/4500)</li>
                    <li style="color:rgb(102, 86, 146);">- Vip 4 Exp:(4500/6200)</li>
                    <li style="color:rgb(222, 220, 250);">- Vip 5 Exp:(6200/8000)</li>
                    <li style="color:rgb(151, 149, 179);">- Vip 6 Exp:(8000/9400)</li>
                    <li style="color:rgb(224, 233, 214);">- Vip 7 Exp:(9400/10000)</li>
                    <li style="color:rgb(185, 184, 139);">- Vip 8 Exp:(10000/12000)</li>
                    <li style="color:rgb(53, 194, 230);">- Vip 9 Exp:(12000/15000)</li>
                    <li style="color:rgb(231, 200, 20);">- Vip 10 Exp:(15000)</li>
                </ol>
                <h3> <strong>4. Hoạt động :</strong> </h3>
                <span>- Web sẽ tổ chức thường xuyên một số hoạt động ở phần bình luận, tham gia bình luận sôi nổi sẽ
                    được thưởng chiến tích và điểm kinh nghiệm để nhanh chóng thăng cấp cảnh giới.</span> <br>
                <strong>- Admin sẽ kiểm tra thường xuyên mọi tài khoản vi phạm nội dung ảnh hưởng tới người khác sẽ
                    bị ban nick vĩnh viễn.</strong>
            </div>
        </div>

    </div>
</article>

@endsection


@section('container')
@yield('section')

@endsection
@section('javascrpit')
@yield('js')

@endsection

