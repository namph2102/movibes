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
<title>Thông báo của {{$account->name}} - Movibes</title>
@endsection

@section('section')
<main>
    <div class="wrapper__change--avata hidden">
        <form action="{{route('profile.avata')}}" id="formUpload" class="wrapper__container py-1" method="POST"  enctype="multipart/form-data">
            @csrf
            <input type="text" hidden class="useridupload" value="{{$account->avata}}"  name="userid">
            <div class="change__avata--title">
                <h4 class="fs-5">Thay ảnh đại diện</h4>
                <button type="button" class="px-3 py-2 btn-danger btn__closeAvata">X</button>
            </div>

            <label for="upLoadAvata" title="Click để chọn ảnh">
                <!-- Loading upLoadSuccess -->
                <div class="upLoadfile__loading hidden">
                    <div class="loading__image">
                        <img class="loading__logo--style" src="/img/loading.png" alt="">
                    </div>
                </div>
                <!--End Loading upLoadSuccess -->
                <img width="80" height="80" src="/img/upload.png" alt="">
                <h5 class="text-warning">Tải ảnh từ Destop</h5>
                <span class="btn btn-success">Chọn ảnh</span>
                <img src="" class="avataOverLay hidden" alt="Avata">
            </label>
            <input type="file" hidden class="upLoadAvata" name="upLoadAvata" id="upLoadAvata">
            <div class="wrapper__change--notice">
                <div class="text-center">
                    <button type="button" class="btn btn-primary px-3 btn_upLoadAvata_reset hidden">Reset</button>
                    <button type="submit" class="btn btn-success px-3 btn_upLoadAvata_submit hidden">Submit</button>
                </div>
                <h6 class="text-danger fs-5">Lưu ý:</h6>
                <div class="text-center uploadSuccess hidden">
                    <h6>Ảnh hồ sơ sẽ sớm được cập nhật</h6>
                    <p class="text-center">Có thể mất vài ngày để thay đổi ảnh đại diện</p>
                </div>


                <ul class="text-white ruleUpload">
                    <li>Ảnh sẽ rõ nét hơn với kích thước <code>60 x 60</code></li>
                    <li>Ảnh sẽ được kiểm duyệt sau ít phút</li>
                    <li>Không up ảnh <Code>khiêu dâm</Code></li>
                    <li>Dung lượng ảnh không lớn hơn <code>200 KB</code></li>
                </ul>
            </div>
        </form>

    </div>
    <div class="container p-0">
      
        <div class="profile__user px-4 row" id="saveAvata">
            <figure class="profile__avata col-12">
                <div class="profile__infomation">
                    <img class="profile__avata--image" src="{{$account->avata}}" title="Ảnh đại diện">
                    @if(!empty($account->vip_icon->name_icon))
                        <img src="{{$account->vip_icon->link}}" class="profile__avata--vip" title="Danh Hiệu {{$account->vip_icon->name_icon}}"
                        alt="Danh Hiệu {{$account->vip_icon->name_icon}}">
                    
                   @endif
                    <h3 class="profile__trophy-des_avata text-warning fs-5">LV {{$account->ifm->id_exp}} </h3>
                    <div class="profile__avata-exp" title="Exp vip" data-content="{{$account->exps}}/{{$account->maxExp->max_lv}}" data-min="{{$account->exps}}"
                        data-max="{{$account->maxExp->max_lv}}">
                        <span class="progress-bar">{{$account->exps}}/{{$account->maxExp->max_lv}}</span>
                    </div>
                    <div class="my-1"><img width="25" src="/icon/coin.png" alt=""><span class="ms-2 fs-6 fw-bold">{{number_format($account->coin)}}</span></div>
                </div>
                <figcaption class="text-center">
                    <div class="mt-2">
                        <button type="button" title="Thay Đổi Avata" class="btn btn-danger me-1"
                            onclick="changeAvata()" id="changeAvata">Đổi Avata</button>
                        <button class="btn btn-primary" title="Nhận Icon Hấp dẫn"><a href="{{route('topup.topup')}}" class="m-0">Nạp
                                thẻ</a></button>
                    </div>
                </figcaption>

            </figure>
        
   
            <form class="form_profile" id="form_profile" onsubmit="return false">
                <div class="form-group">
                    <label for="user_name">
                        Tên:
                    </label>
                    <input type="text" class="user_name" id="user_name" value="{{$account->name}}">
                </div>
                <div class="form-group">
                    <label for="user_story">
                        Tiểu sử:
                    </label>
                    <input required type="text" class="user_story" maxlength="80" placeholder="Mô tả đôi nét về đạo hữu" id="user_story" value="{{$account->desp}}">
                </div>
                <div class="form-group">
                    <label for="user_spoil">
                        Chiến tích:
                    </label>
                    <ul class="profile__trophy ps-2" style="min-height: 20px;">
                 
                        @if (!empty($account->listicon[0]->name_icon))
                         @foreach ($account->listicon as $icon)
                            <li><img src="{{$icon->link}}" alt="{{$icon->name_icon}}">
                              <span class="profile__trophy-des">{{$icon->name_icon}}</span>
                             </li>
                          @endforeach
                        @else 
                             <li><span class="fs-6">Bạn chưa sở hữu chiến tích nào :(</span></li>
                        @endif
                      
                    </ul>
                </div>
                <div class="form-group">
                    <label for="user_level">
                        Cảnh Giới:
                    </label>
                    <input type="text" style="color:#ff9800;" class="user_level fs-5 fw-bold text-capitalize" id="user_level"
                        readonly value="{{$account->ifm->name_exp}}">
                </div>

                <div class="form-group">
                    <label for="user_email">
                        Email:
                    </label>
                    <input type="email" class="user_email active" id="user_email" readonly
                        value="{{$account->email}}">
                </div>


                <div class="form-group">
                    <label for="user_phone">
                        Phone:
                    </label>
                    <input type="number" class="user_phone active" id="user_phone" readonly value="0{{$account->phone}}">
                </div>

                <div class="form-group">
                    <label for="user_date">
                        Ngày tham gia:
                    </label>
                    <input type="text" class="user_date active" id="user_date" readonly value="{{ date("d/m/Y H:i:s",strtotime($account->created_at)) }}">
                </div>
                <div  class="text-center btn_save hidden"> <button onclick="uploaddata()" 
                        class="btn btn-success px-md-4 px-5 my-2"><a style="text-decoration: none" class="text-white" href="#saveAvata"><img width="20" src="/icon/filesave.png"
                            alt=""> Lưu</a> </button></div>
            </form>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="{{asset('js/api.js')}}" type="text/javascript"></script>
<script src="{{asset('js/style.js')}}" type="text/javascript"></script>
<script type="text/javascript">
        function changeAvata() {
        let modal__chagneAvata = $$('.wrapper__change--avata');
        modal__chagneAvata.classList.toggle('hidden');
        let btn__closeAvata = $$('.btn__closeAvata');

        btn__closeAvata.onclick = () => {
            modal__chagneAvata.classList.toggle('hidden');
        }
        let upLoadAvata = $$('.upLoadAvata');
        let avataOverLay = $$('.avataOverLay');
        let btn_reset = $$('.btn_upLoadAvata_reset');
        let btn_submit = $$('.btn_upLoadAvata_submit')
        upLoadAvata.onchange = function () {
            let url = URL.createObjectURL(this.files[0]);
            console.log(this.files);
            let type = this.files[0].type;
            let size = this.files[0].size;
            let name = this.files[0].name;
            if (name.includes('.')); {
                name = String(name).slice(0, name.indexOf('.'));
            }

            if (Number(size) > 1024 * 200) {
                creat_toast('danger', 'Thông báo', `Tên file "<code>${name}</code>" có dung lượng lớn hơn "<code>${200} KB</code>" !`);
                return 0;
            }
            if (!type.includes('image')) {
                creat_toast('danger', 'Thông báo', `Tên file "<code>${name}</code>" không phải dạng ảnh !`);
                return 0;
            }
            modal__notice('Tải ảnh thành công', 2000);
            avataOverLay.classList.remove('hidden');
            loadding__logo('.upLoadfile__loading', 1500);
            setTimeout(() => {
                modal__notice('Tải ảnh thành công', 2000);
                $$('.ruleUpload').classList.add('hidden');
                $$('.uploadSuccess').classList.remove('hidden');
            }, 1000);

            avataOverLay.setAttribute('src', url);
            if (url) {
                btn_reset.classList.remove('hidden');
                btn_submit.classList.remove('hidden');
                btn_submit.onclick = () => {
                    $$('#formUpload').submit = true;
                }
                btn_reset.onclick = function () {
                    this.classList.add('hidden');
                    loadding__logo('.upLoadfile__loading', 1500);
                    avataOverLay.classList.add('hidden');
                    btn_submit.classList.add('hidden');
                    $$('.ruleUpload').classList.remove('hidden');
                    $$('.uploadSuccess').classList.add('hidden');
                }
            }
        }
    };
    ranPrecess();
    function ranPrecess() {
        let exp = $$('.profile__avata-exp');
        let min = exp.getAttribute('data-min');
        let max = exp.getAttribute('data-max');
        let progress_bar = $$('.progress-bar');
        let longProcess = (Number(min) / Number(max) * 100).toFixed(2);

        progress_bar.innerHTML = `${min}/${max}`;
        progress_bar.style.width = `${longProcess}%`;

    }

    // submit form
    let user_name = $$('.user_name');
    let user_story = $$('.user_story');
    let box_btn_save = $$('.btn_save');
    user_name.addEventListener('input', (e) => {
        box_btn_save.classList.remove('hidden')
    })
    user_story.addEventListener('input', (e) => {
        box_btn_save.classList.remove('hidden')
        if(user_story.value.length>60) {
            modal__notice('Mô tả ngắn gọn thui đạo hữu !', 2000);
            return false;
        }
    })
    $$(".useridupload").value=$$("#UserID").value;
    function uploaddata(){
        if(user_story.value.length>80) {
            modal__notice('Mô tả ngắn gọn thui đạo hữu !', 2000);
            return false;
        }
        UserID=$$("#UserID").value;
        if(!UserID) return false;
        user_story=user_story.value;
        user_name=user_name.value;
        $.get("/update-profile.html",{id:UserID,fullname:user_name,desp:user_story},function(res){
            if(res){
                modal__notice('Thay đổi thông tin thành công', 2000);
            }
        })
        box_btn_save.classList.add("hidden");
      
    }
</script>
@endsection