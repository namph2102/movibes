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

<title>Thông báo - Movibes</title>
@endsection


@section('section')
<main>
    <div class="container">
        <div class="content__notice" style="position: relative">

                 <!-- Loading notice -->
                 <div class="notice_loadding">
                    <div class="loading__image">
                        <img class="loading__logo--style" src="{{asset('img/loading.png')}}" alt="">
                    </div>
                </div>
                <!--End Loading notice -->

            <h1 class="text-center mt-0 mb-4"><img width="25" src="img/affection.png" alt=""> <span class=" direction-title"> @if (count($dbnotice)>0) Thông báo ngày hôm nay @else Bạn chưa có thông báo nào  @endif</span> </h1>
            <ul class="content__notice--list ps-0 data-container" id="index_panation" style="list-style-type: none;">
             
            </ul>
            <div id="pagination-demo1" style="display: flex;
            justify-content: space-around;">
            </div>
            
            
        </div> 
        <!-- Phân trang  -->

    </div>
</main>
@endsection

@section('js')
<script src="{{asset("css/paginationjs/src/pagination.js")}}"></script>
<script>
  
 $.get("/thong-bao.html",{action:"panation"},function(data){
        rendernotice(data)
         return data;
    })
   
function rendernotice(data) {
  (function(name) {
    var container = $('#pagination-' + name);
    var sources = function () {
      var result = [];
        data.forEach(notice =>{
        result.push(`<li>
                   <figure class="content__notice-item">
                       <img class="content__notice_image" src="${notice.image}">
                       <figcaption>
                           <p class="content__notice-head">${notice.name}</h2>
                           <p class="ntocie">${notice.message}</p>
                           <time>${notice.creatat}</time>
                       </figcaption>
                   </figure>
             </li>`);
      })

      return result;
    }();

    var options = {
      dataSource: sources,
      pageSize: 5,
      callback: function (response, pagination) {
        dataHtml="";
        $.each(response, function (index, item) {
          dataHtml +=  item ;
        });
        container.prev().html(dataHtml);
      }
    };
    container.pagination(options);

    
  })('demo1');
};

setTimeout(() => {
    $$(".notice_loadding").classList.add("hidden");
}, 1500);
</script>

@endsection