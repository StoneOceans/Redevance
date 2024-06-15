<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flight Statistics</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; }
        .section { margin-bottom: 30px; }
        .indicator {
            background-color: #0077b6;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        .title { font-size: 24px; font-weight: bold; margin-top: 20px; }
        .data { font-size: 20px; margin-top: 5px; }
    </style>
</head>
<body>
    <h1>Flight Statistics</h1>

    <div class="section">
        <div class="title">Indicateur de vols</div>
        <div class="indicator">
            <span class="data">Départs de France (LFPG): {{ $total_departures }}</span><br>
            <span class="data">Arrivées en France (LFPG): {{ $total_arrivals }}</span><br>
            <span class="data">Total Operations: {{ $total_operations }}</span>
        </div>
    </div>

    <div class="section">
        <div class="title">Type PLN</div>
        <div class="indicator">
            <span class="data">Type PLN ABI: {{ $total_ABI }}</span><br>
            <span class="data">Type PLN APL: {{ $total_APL }}</span><br>
            <span class="data">Type PLN RPL: {{ $total_RPL }}</span><br>
            <span class="data">Type PLN finale: {{ $total_pln_finale }}</span>
        </div>
    </div>
    <div class="section">
        <h2 class="section-title">Flight Statistics</h2>
        <canvas id="myChart"></canvas>
        <img src="/var/www/web/public/assets/images/chart.png" alt="Chart Image">
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
      const labels = [
        'LFPG', 'LFPO', 'LFMN', 'LEBL', 'LEPA', 'LEMD', 'EGKK', 'LEMG', 'LFML', 'EHAM'
      ];
      const dataValues = [
        670, 354, 314, 311, 277, 255, 228, 191, 182, 174
        // Include all other values as needed
      ];
      const data = {
        labels: labels,
        datasets: [{
          label: 'Nombre de vols (en centaines)',
          data: dataValues,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
          ],
          borderWidth: 1
        }]
      };

      const config = {
        type: 'bar',
        data: data,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          },
          responsive: true,
          maintainAspectRatio: false
        },
      };

      new Chart(document.getElementById('myChart'), config);
    });
  </script>
</body>
</html>
