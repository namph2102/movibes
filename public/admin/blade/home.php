<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/chart.css">
    <title>DashBoard</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>

    <div id="header_chart">
        <div class="header_chart-head">
            <h2>Mywebstie Active</h2>
        </div>
        <div class="chart_head-list">
            <div class="chart_head-list-box">
                <div class="chart_head-list-box_view">
                    <h5>Balance <span class="chart_head-pernumber"><i
                                class="fa-solid fa-arrow-up-right-dots"></i>12%</span></h5>
                    <h2>$75.2657,00</h2>
                </div>
                <div class="chart_head-list-box_view">
                    <h5>Balance <span class="chart_head-pernumber"><i
                                class="fa-solid fa-arrow-up-right-dots"></i>12%</span></h5>
                    <h2>$75.2657,00</h2>
                </div>
                <div class="chart_head-list-box_view">
                    <h5>Balance <span class="chart_head-pernumber"><i
                                class="fa-solid fa-arrow-down-short-wide"></i>12%</span></h5>
                    <h2>$75.2657,00</h2>
                </div>
                <div class="chart_head-list-box_view">
                    <h5>Balance <span class="chart_head-pernumber"><i
                                class="fa-solid fa-arrow-up-right-dots"></i>12%</span></h5>
                    <h2>$75.2657,00</h2>
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

</body>
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
    const labels = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',   
    ];
  
    const chartdata = {
      labels: labels,
      datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 30, 45],
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
   



</html>