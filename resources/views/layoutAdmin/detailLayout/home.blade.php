@extends('layoutAdmin.masterlayouts.admin')
@section('head')
<link rel="stylesheet" href="{{asset("admin/css/chart.css")}}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Trang Quản lý</title>
@endsection

@section('direction')
    <a href="">Admin</a>
@endsection
@section('container')
<div id="header_chart">
    <div class="header_chart-head">
        <h2>Mywebstie Active</h2>
    </div>
    <div class="chart_head-list">
        <div class="chart_head-list-box">
            <div class="chart_head-list-box_view">
                <h5>Tổng tài khoản <span class="chart_head-pernumber"><i
                            class="fa-solid fa-arrow-up-right-dots"></i></span></h5>
                <h2><i class="fa-solid fa-user"></i> {{number_format($dbfiml['users'])}}</h2>
            </div>
            <div class="chart_head-list-box_view">
                <h5>Tổng số phim <span class="chart_head-pernumber"><i
                            class="fa-solid fa-arrow-up-right-dots"></i></span></h5>
                <h2><i class="fa-solid fa-film"></i> {{number_format($dbfiml['films'])}}</h2>
            </div>
            <div class="chart_head-list-box_view">
                <h5>Tổng lượt truy cập <span class="chart_head-pernumber"><i
                            class="fa-solid fa-arrow-down-short-wide"></i></span></h5>
                <h2><i class="fa-solid fa-eye"></i> {{number_format($dbfiml['views'])}}</h2>
            </div>
            <div class="chart_head-list-box_view">
                <h5>Tổng Doanh Thu <span class="chart_head-pernumber"><i
                            class="fa-solid fa-arrow-up-right-dots"></i></span></h5>
                <h2><img src="{{asset("icon/coin.png")}}" width="30" alt=""> {{number_format($dbfiml['coins'])}}</h2>
            </div>
        </div>
    </div>
    <div class="chart_content">
        <div class="chart_content-box">
            <h2 class="weather_title">Weather</h2>
            <div class="header_chart-head_body">
                <div class="header_chart-head_body-template">
                    70%
                    <h5>Tempalate</h5>
                </div>
            </div>
            <div class="header_chart-head_footer">
                <div class="head_footer-box">
                    <h4>76 K/M</h4>
                    <div>
                        <h5>Tốc độ gió</h5>
                    </div>
                </div>
                <div class="head_footer-box">
                    <h4 class="tem_humidity">12%</h4>
                    <div>
                        <h5>Độ ẩm</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="chart_content-box-right">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<?php
    $listanme=[];
    $listviews=[];
    foreach ($dbfiml['topfilm'] as $film) {
        $listanme[]=$film->id_film;
        $listviews[]=$film->views;
    }
?>
  
@endsection
@section('js')
<script>
   
    async function getWeather(input) {
        const url = `https://api.openweathermap.org/data/2.5/weather?q=${input}&units=metric&appid=d78fd1588e1b7c0c2813576ba183a667`
        let data = await fetch(url).then(res => res.json());
        
        $('.header_chart-head_body-template').innerHTML = `
        ${data.main.temp} <sup>o</sup>C
        <h5>Tempalate</h5>
        `;
        $('.head_footer-box h4').innerHTML = `${(data.wind.speed * 3.6).toFixed(2)} K/M`;
        $('.tem_humidity').innerHTML = `${data.main.humidity} %`;
    }

    getWeather('ho chi minh');
</script>
<script>
    const labels =JSON.parse("<?php echo json_encode($listanme);?>");

    const chartdata = {
      labels: labels,
      datasets: [{
        label: 'Top Views',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: JSON.parse("<?php echo json_encode($listviews);?>"),
      }]
    };
  
    const config = {
        type: 'line',
        data: chartdata,
        options: {}
      };
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  </script>
   


@endsection
