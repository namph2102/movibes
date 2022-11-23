
@extends('layoutMaster.masterHeadFoot')
@section('header')
<link rel="shortcut icon" href="{{asset('img/loading.png')}}" type="image/x-icon">
<meta name="keywords" content="nap tien, uung ho,movie, movibes, xem tat ca phim mobives, phim hay movibes, phim hoat hinh, phim chat luong, phim hoat hinh 3d trung quoc">
<meta name="description"
    content="MOVIBES Rất cảm ơn quý khách, mọi sự ủng hộ của bạn giúp chúng tôi có động lực để duy trì và cải thiện tối tốt hơn mang đến sự thư giản">
<meta property="og:type" content="article" />
<meta property="og:url" content="{{route('film.all')}}" />
<meta property="og:image" content="{{asset('img/loading.png')}}" />
<meta property="article:tag" content="" />
<link rel="stylesheet" href="{{asset('css/filmdetail.css')}}">
<link rel="stylesheet" href="{{asset('css/playfilm.css')}}">
<title>Ủng hộ chúng tôi - Movibes</title>
@endsection

@section('section')
<main>
    <div class="container">
        <div class="layout__topup d-flex justify-content-center row">
            <div class="layout__topup-profile col-12">
                <marquee>
                    <h6><img width="30" height="30" src="{{asset('img/affection.png')}}" alt=""> Mọi sự đóng góp, ủng hộ
                        của bạn
                        tạo <strong><code>động lực lớn</code></strong class="text-danger"> cho team MOVIBES !</h6>
                </marquee>
            </div>
            <div class="col-lg-3 col-12 my-lg-0 my-4">
                <div class="menu__topup d-flex w-lg-100 d-lg-block">
                    <button data-name="paywin" class="btn__menu--topup  mt-lg-none mt-2">Pay.Win <img
                            src="/icon/runing.png" alt=""></button>
                    <button data-name="paybank" class="btn__menu--topup active mt-lg-none mt-2">Ngân Hàng <img width="10"
                            src="/icon/bank.png" alt=""></button>
                    <button data-name="paycode" class="btn__menu--topup mt-lg-none mt-2">Code Pay <img width="10"
                            src="/icon/payment.png" alt=""></button>
                    <button data-name="paycard" class="btn__menu--topup mt-lg-none mt-2">Thẻ cào <img
                            src="/icon/card.png" alt=""></button>
                    <button data-name="paywallet" class="btn__menu--topup mt-lg-none mt-2">Ví điện tử <img
                            src="/icon/save.png" alt=""></button>
                    <button data-name="viewhistory" class="btn__menu--topup mt-lg-none mt-2">Lịch sử <img
                            src="/icon/history.png" alt=""></button>
                </div>
            </div>
            <div style="background-image: url(/icon/bgtopup.jpg);"
                class="col-9 row menu__topup__container d-flex justyfy-content-between ">
                <!-- Loading boorkmark -->
                <div class="topUp__loadding hidden">
                    <div class="loading__image">
                        <img class="loading__logo--style" src="/img/loading.png" alt="">
                    </div>
                </div>
                <!--End Loading boorkmark -->

                <!-- Contaient left -->
                <div class="topup__container col-lg-6  col-12 text-center">
                    <!-- pay win -->
                    <div class="paywin hidden">
                        <img class=" mb-4" src="/icon/paywin.png" alt="paywin">
                        <ul class="text-start" style="color: yellow;">
                            <li>Nạp tiền sử dụng tài khoản Internet Banking</li>
                            <li>Nạp thẻ thành công nhớ nhắn admin nhen</li>
                            <li>Admin check thẻ bằng cơm nên sẽ hơi lâu :(</li>
                            <li>An toàn bảo mật nha</li>
                        </ul>
                    </div>
                    <!-- end pay win -->

                    <!-- pay bank -->
                    <div class="paybank w-100 px-3">
                        <h2 class="fs-6 pb-lg-1 pb-2 text-warning text-start">
                      <span style="font-size:14px; ">  Khi chuyển khoản xong nhớ nhắn cho mình nha!</span> <a href="https://www.facebook.com/profile.php?id=100087004991368"   rel="noopener noreferrer" style="text-decoration: none;" class="py-2 px-1 text-white d-inline-block" target="_blank" ><img width="120" src="{{asset('avata/lienhe.png')}}" alt=""></a>
                        </h2>
                        <label class="label_fullwidth mb-3" for="paybank">
                            <h6 class="text-start "> Chuyển khoản qua ngân hàng:</h6>
                            <select class="input__style--topup text-start w-100" name="" id="paybank">
                                <option value="ARIBANK">ARIBANK</option>  
                            </select>
                        </label>
                        <br>
                        <label class="label_fullwidth" for="copycode">
                            <h6 class="text-start mb-3"> Số Tài Khoản:</h6>
                            <div class="box__copy">
                                <span class="copy myText text-warning fw-bold">5409205132543</span>
                                <button onclick="copyText(this)" id="copycode" class="copy_btn btn"><img
                                        src="/icon/copy.png" alt="nap tien vip"></button>
                            </div>
                        </label>
                        <br>
                        <label class="label_fullwidth" for="copyname my-2">
                            <h6 class="text-start mt-1"> Tên Tài Khoản:</h6>
                            <div class="box__copy">
                                <span class="copy text-warning fw-bold">Phạm Hoài Nam</span>
                                <button id="copyname" onclick="copyText(this)" class="copy_btn btn"><img
                                        src="/icon/copy.png" alt="nap tien vip"></button>
                            </div>
                        </label>
                    </div>
                    <!-- end pay bank -->
                    <!-- pay code -->
                    <div class="paycode d-flex flex-column text-start hidden">
                        <label for="selectBank_paycode" class="label_fullwidth mb-3">
                            <h6 class="text-start">Ngân hàng:</h6>
                            <select class="input__style--topup  text-start" required name=""
                                id="selectBank_paycode">
                                <option value="2">ARIBANK</option>
                            </select>
                        </label>
                        <label class="label_fullwidth" for="paycode_code">
                            <h6 class="text-start mt-1"> Số Tài Khoản:</h6>
                            <div class="box__copy">
                                <span class="copy myText text-warning fw-bold">5409205132543</span>
                                <button onclick="copyText(this)" id="paycode_code" class="copy_btn btn"><img
                                        src="/icon/copy.png" alt="nap tien vip"></button>
                            </div>
                        </label>
                        
                        <label class="label_fullwidth" for="paycode_copyname">
                            <h6 class="text-start "> Tên Tài Khoản:</h6>
                            <div class="box__copy">
                                <span class="copy text-warning fw-bold">Phạm Hoài Nam</span>
                                <button id="paycode_copyname" onclick="copyText(this)" class="copy_btn btn"><img
                                        src="/icon/copy.png" alt="nap tien vip"></button>
                            </div>
                        </label>
                        
                        <label class="label_fullwidth" for="paycode_copycode">
                            <h6 class="text-start "> Số Điện Thoại:</h6>
                            <div class="box__copy">
                                <span class="copy text-warning fw-bold">0325024277</span>
                                <button id="paycode_copycode" onclick="copyText(this)" class="copy_btn btn"><img
                                        src="/icon/copy.png" alt="nap tien vip"></button>
                            </div>
                        </label>
                        <div class="text-warning text-center">Lưu ý : Hệ thống xử lý trong vài phút !</div>
                    </div>
                    <!--end pay code -->
                    <div class="paywallet d-flex flex-column text-start w-100 px-3 hidden">
                        <label for="paywallet" class="label_fullwidth mb-3">
                            <h6 class="text-start">Ví Điện Tử:</h6>
                            <select class="input__style--topup  text-start ps-5" required name="" id="paywallet">
                                <option value="1">MOMO</option>
                                <option value="2">ZALO</option>
                            </select>
                        </label>
                
                        <label class="label_fullwidth" for="paywallet_copycode my-2">
                            <h6 class="text-start mt-2">Số Tài Khoản 1 :</h6>
                            <div class="box__copy">
                                <span class="copy text-warning fw-bold">0325024277</span>
                                <button id="paywallet_copycode" onclick="copyText(this)" class="copy_btn btn"><img
                                        src="/icon/copy.png" alt="nap tien vip"></button>
                            </div>
                        </label>
                   
                        <label class="label_fullwidth" for="paywallet_code">
                            <h6 class="text-start mt-2"> Số Tài Khoản 2:</h6>
                            <div class="box__copy">
                                <span class="copy myText text-warning fw-bold">0877669990</span>
                                <button onclick="copyText(this)" id="paywallet_code" class="copy_btn btn"><img
                                        src="/icon/copy.png" alt="nap tien vip"></button>
                            </div>
                        </label>
                        <br>
                        <label class="label_fullwidth" for="paywallet_copyname my-2">
                            <h6 class="text-start "> Tên Tài Khoản:</h6>
                            <div class="box__copy">
                                <span class="copy text-warning fw-bold">Phạm Hoài Nam</span>
                                <button id="paywallet_copyname" onclick="copyText(this)" class="copy_btn btn"><img
                                        src="/icon/copy.png" alt="nap tien vip"></button>
                            </div>
                        </label>

                        <div class="text-warning">Lưu ý: Địa chỉ của các ví là như nhau !</div>
                    </div>
                    <!-- viewhistory -->
                    <div class="paycard hidden">
                        <div class="paycard__kind mb-4">
                            <img class="paycard__provider" onclick="changeImgae(this,'0')"
                                src="/icon/viettel.png" alt="Nạp thẻ Viettel">
                            <img class="paycard__provider" onclick="changeImgae(this,'1')"
                                src="/icon/vinah.png" alt="Nạp thẻ Vinaphone">
                            <img class="paycard__provider" onclick="changeImgae(this,'2')"
                                src="/icon/mobih.png" alt="Nạp thẻ Mobifone">
                            <img class="paycard__provider" onclick="changeImgae(this,'3')"
                                src="/icon/vnmobileh.png" alt="Nạp thẻ Vietnammobile">
                        </div>
                        <div class="paycard__value">
                            <div class="paycard__value--list">
                                <div class="row paycard__container">
                                    <div class="col-12 paycard__value-title">
                                        <div class="paycard__heading">Mệnh giá</div>
                                        <div class="paycard__heading">Quy Đổi</div>
                                    </div>

                                    <div title="Lướt để xem nhiều hơn" class="paycard__value--list__item">
                                        <!-- <div class="paycard__value__item py-2">
                                            <div class="paycard__price">300, 000 VNĐ</div>
                                            <figure>
                                                <img src="/icon/coin.png" alt="" class="paycard_coin">
                                                <figcaption class="">7,7000</figcaption>
                                            </figure>
                                        </div> -->
                                    </div>
                                    <div class="modal_paycard-overlay">

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end paycard -->

                    <!-- viewhistory -->
                    <div class="viewhistory hidden" style="background-image: url(/icon/bg_history.png);">

                        <div class="viewhistory__container col-12">
                            <table class="viewhistory__container-table w-100">
                               <tbody class="viewhistory__content-list">
                                {{-- <tr>
                                    <td>22/21/2022 <div>19:12:30</div>
                                    </td>
                                    <td>Aribank</td>
                                    <td class="text-warning">12,156,120</td>
                                    <td>CodePay</td>
                                    <td>#2s5d41</td>
                                    <td class="text-warning">Đang xử lý</td> --}}
                                </tr>
                               
                               </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end viewhistory -->
                </div>
                <!-- end Contaient left -->

                <!-- ----------------------------------------------bên phải--------------------------------------------------- -->

                <!-- Contaient right -->
                <div class="menu__topup__chose  text-center d-flex col-lg-6  col-12">
                    <!-- paywin right -->
                    <div class="paywin hidden"  id="paywin_main">
                        <h2 class="fs-4 pb-lg-0 pb-2">Chọn ngân hàng muốn nạp</h2>
                        <label for="selectBank_paywin">
                            <h6 class="text-start"> Ngân hàng:</h6>
                            <select class="input__style--topup text-start" required name="" id="selectBank_paywin">
                                <option value="VIETCOMBANK">VIETCOMBANK</option>
                                <option value="ARIBANK">ARIBANK</option>
                                <option value="BIDV">BIDV</option>
                                <option value="ACB">ACB</option>
                                <option value="VIETINBANK">VIETINBANK</option>
                            </select>
                        </label>

                        <label for="id_topup" class="mt-4">
                            <h6 class="text-start">Số Tiền:</h6>
                            <input type="text" oninput="formatnumber(this)" placeholder="Số Tiền" required
                                class="input__style--topup number" id="id_topup" />
                            <div class="box__message--input hidden fs-6 fw-bold mt-1">Thực hiện giao dịch số tiền</div>
                        </label>

                        <div class="box__btn__topup">
                            <button class="btn_image--pecial" onclick="open_paysub()"><img
                                    src="/icon/btn_continue.png" alt=""></button>
                        </div>
                    </div>

                    <!-- paywin right -->
                    <form class="paywin_sub hidden" onsubmit="return false">
                        <button type="button" class="btn btn__pre"><img onclick="pre_paywin()"
                                src="/icon/btn__pree.png" alt=""></button>
                        <h2 class="fs-5 pb-lg-0 pb-2">Vui lòng nhập thông tin đăng nhập <code
                                class="paywin_sub--name_bank"> </code> của bạn</h2>

                        <label for="id_username_sub" class="mt-4">
                            <h6 class="text-start">Tên đăng nhập:</h6>
                            <input type="text" placeholder="Tên đăng nhập" required
                                class="input__style--topup number" id="id_username_sub" />
                            <div class="hidden box__message--input fs-6 fw-bold mt-1">Thực hiện giao dịch số tiền
                            </div>
                        </label>
                        <label for="id_password_sub" class="mt-4">
                            <h6 class="text-start">Mật khẩu:</h6>
                            <input type="password" placeholder="Mật khẩu" required class="input__style--topup"
                                id="id_password_sub" />
                            <div class="hidden box__message--input fs-6 fw-bold mt-1">Thực hiện giao dịch số tiền
                            </div>
                        </label>
                        <div class="box__btn__topup">
                            <button onclick="paywin_sub()" class="btn_image--pecial"><img
                                    src="/icon/btn_topup.png" alt=""></button>
                        </div>
                    </form>

                    <!-- paybank right -->
                    <form class="paybank" id="form_paybank" onsubmit="return false">
                        <label for="id_banking" class="mt-2">
                            <h6 class="text-start">Phương Thức:</h6>
                            <select class="input__style--topup text-start ps-5" name="" id="paybank">
                                <option value="Internet Banking">Internet Banking</option>  
                                <option value="ATM">ATM</option>  
                                <option value="Quầy giao dịch">Quầy giao dịch</option>  
                            </select>
                        </label>
                        <label for="id_coin" class="mt-2">
                            <h6 class="text-start">Số Tiền:</h6>
                            <input type="text" oninput="formatnumber(this)" placeholder="Số tiền" class="input__style--topup number"
                                id="id_coin" />
                        </label>
                        <label for="id_user" class="mt-2">
                            <h6 class="text-start">Người Gửi:</h6>
                            <input type="text" placeholder="Nguời gửi"  class="input__style--topup" id="id_user" />
                        </label>

                        <label for="id_code" class="mt-2">
                            <h6 class="text-start">Mã giao dịch:</h6>
                            <input type="text"  class="input__style--topup"
                                placeholder="Mã giao dịch" id="id_code" />
                        </label>
                        <div class="box__btn__topup">
                            <button class="btn_image--pecial" onclick="form_paybank()"><img src="/icon/btn_topup.png" alt=""></button>
                        </div>
                    </form>
                    <!-- end paybank right -->

                    <!-- paycode right -->
                    <div class="paycode text-lg-start text-center hidden">
                        <img class="w-100" src="/icon/banner_vietcom.png" alt="">
                        <label for="" class="mt-2 create__container" data-pt="Internet Banking">
                            <h6 class="">Phương Thức:</h6>
                            <h4 class="text-warning">Internet Banking</h4>
                            <p><strong><code class="fs-5">Chuyển tiền</code></strong> vào tài khoản bên cạnh với nội
                                dung ghi chú:</p>
                            <img onclick="create_code(this)" src="/icon/btn_creat.png"
                                style=" cursor: pointer;" alt="create code">
                            <div class="box__copy hidden">

                                <span style="cursor: auto;"
                                    class="copy  fs-bolder m-0 fs-3 text-danger">PT52452</span>
                                <button onclick="copyText(this)" class="shadow-none copy_btn btn"><img
                                        src="/icon/copy.png" alt="nap tien vip"></button>

                                <div class="fs-5 text-center">Mã Hết Hạn Sau: <time
                                        style="color: rgb(240, 100, 8);">20:12:11</time></div>
                                <div class="text-warning text-center">( Mã chỉ sử dụng được 1 lần)</div>
                            </div>

                        </label>
                    </div>
                    <!-- end paycode right -->
                    <div class="paywallet text-lg-start text-center hidden">
                        <img class="w-100" src="/icon/banner_momo.png" alt="">
                        <label for="" class="mt-2 create__container" data-pt="Ví MOMO">
                            <h6 class="">Phương Thức:</h6>
                            <h4 class="text-warning">Internet Banking</h4>
                            <p><strong><code class="fs-5">Chuyển tiền</code></strong> vào tài khoản bên cạnh với nội
                                dung ghi chú:</p>
                            <img onclick="create_code(this)" src="/icon/btn_creat.png"
                                style=" cursor: pointer;" alt="create code">
                            <div class="box__copy hidden">
                                <span style="cursor: auto;"
                                    class="copy  fs-bolder m-0 fs-3 text-danger">PT52452</span>
                                <button onclick="copyText(this)" class="shadow-none copy_btn btn"><img
                                        src="/icon/copy.png" alt="nap tien vip"></button>
                                <div class="fs-5 text-center">Mã Hết Hạn Sau:
                                    <time style="color: rgb(240, 100, 8);">20:12:11</time>
                                </div>
                                <div class="text-warning text-center">( Mã chỉ sử dụng được 1 lần)</div>
                            </div>
                        </label>
                    </div>
                    <!-- paycard -->
                    <form id="formpaycard" class="paycard hidden" action="{{route("topup.thecao")}}" method="POST" onsubmit="return submitPaycard()">
                        
                        @csrf
                        <label class="label_fullwidth" for="paycard">
                            <h6 class="text-start mb-3"> Loại thẻ cào:</h6>
                           
                            <select title="Mệnh giá thẻ cào " class="input__style--topup text-start paycard_value"
                                name="" id="paycard">
                                <option value="0">CHỌN MỆNH GIÁ</option>
                            </select>
                        </label>
                        <div class="text-warning">
                            * Lưu ý: Quá trình xử lý hơi lâu bạn nên liên hệ  <a class="text-danger fw-bold" href="https://www.facebook.com/profile.php?id=100087004991368"  target="_blank" rel="noopener noreferrer">Admin</a> để được hỗ trợ sớm!
                        </div>
                        <label for="id_paycard" class="mt-2">
                            <h6 class="text-start">Mã Seri:</h6>
                            <input type="text"  minlength="10" maxlength="22"  placeholder="Mã Seri ..." oninput="formatnumber(this)"
                                class="input__style--topup number" id="id_paycard" />
                               
                        </label>

                        <label for="id_code_value" class="mt-2">
                            <h6 class="text-start">Mã Thẻ:</h6>
                            <input type="text" minlength="10" maxlength="22"  oninput="formatnumber(this)" class="input__style--topup number"
                                placeholder="Mã thẻ ..." id="id_code_value" />
                              
                        </label>
                       <div class="my-2 lienhePayCard hidden" ><a href="https://www.facebook.com/profile.php?id=100087004991368"   rel="noopener noreferrer" style="text-decoration: none;" class="py-2 px-1 text-white d-inline-block" target="_blank" ><img width="180" src="{{asset('avata/lienhe.png')}}" alt=""></a></div>
                        <input type="text" hidden class="loaithe" name="loaithe">
                        <input type="text" hidden class="menhgia" name="menhgia">
                        <input type="text" hidden name="mathe" class="mathe">
                        <input type="text" hidden class="seri" name="seri">
                        <input type="text" hidden class="userid_napthe" name="userid">
                        <div class="box__btn__topup mt-2">
                            <button type="submit" class="btn_image--pecial" onclick="handpaycard()"><img
                                    src="/icon/btn_topup.png" alt=""></button>
                        </div>
                    </form>
                
                    <!-- end paycard -->

                    <!-- viewhistory 
                    <div class="viewhistory hidden">

                    </div>
                   -- end viewhistory -->
                </div>
                <!-- end Contaient right -->
            </div>

        </div>
        
    </div>
</main>
@endsection


@section('js')
<script src="{{asset('js/topup.js')}}" type="text/javascript"></script>
<script src="{{asset('js/ketnoinapthe.js')}}" type="text/javascript"></script>
@endsection