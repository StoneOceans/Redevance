@extends('layouts.master')

@section('content')
<head>
  <title>Tableau de vols</title>
  <style>
    .indicator {
      display: inline-block;
      padding: 20px;
      border-radius: 5px;
      margin: 10px;
      color: white;
    }

    .tasks { background-color: #03045e; }
    .tickets { background-color: #0077b6; }
    .reviews { background-color: #00b4d8; }
    .users { background-color: #3066BE; }
    .sales { background-color: #0096C7; }
    .returns { background-color: #0077b6; }
    .profiles { background-color: #3066BE; }

    .icon { font-size: 24px; margin-right: 15px; }
    .text { display: inline-block; }
    .label { display: block; font-size: 14px; }
    .value { font-size: 28px; font-weight: bold; }
    .section { margin-bottom: 30px; }
    .section-title {
      font-size: 20px;
      font-weight: bold;
      margin-top: 20px;
      margin-bottom: 10px;
      color: #333;
    }

    /* Style for the chart canvas */
    #myChart {
      max-width: 1200px; /* Set the maximum width of the chart */
      max-height: 400px; /* Set the maximum height of the chart */
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

</head>
<body>
  <h1>Tableau de vols</h1>
  <div class="section">
    <h2 class="section-title">Indicateur de vols</h2>
    <div class="indicator tasks">
      <span class="label">Départs de France (LFPG)</span>
      <span class="value">{{ $total_departures }}</span>
    </div>
    <div class="indicator tickets">
      <span class="label">Arrivées en France (LFPG)</span>
      <span class="value">{{ $total_arrivals }}</span>
    </div>
    <div class="indicator reviews">
      <span class="label">Total Operations</span>
      <span class="value">{{ $total_operations }}</span>
    </div>
  </div>
  <div class="section">
    <h2 class="section-title">Type PLN</h2>
    <div class="indicator users">
      <div class="text">
        <span class="label">Type PLN ABI</span>
        <span class="value">{{ $total_ABI }}</span>
      </div>
    </div>
    <div class="indicator sales">
      <div class="text">
        <span class="label">Type PLN APL</span>
        <span class="value">{{ $total_APL }}</span>
      </div>
    </div>
    <div class="indicator returns">
      <div class="text">
        <span class="label">Type PLN RPL</span>
        <span class="value">{{ $total_RPL }}</span>
      </div>
    </div>
    <div class="indicator profiles">
      <div class="text">
        <span class="label">Type PLN finale</span>
        <span class="value">{{ $total_pln_finale }}</span>
      </div>
    </div>
  </div>
  <div class="section">
    <h2 class="section-title">Flight Statistics</h2>
    <canvas id="myChart"></canvas>
  </div>
  <a href="/download-pdf" id="downloadPdfBtn">Download Indicators PDF</a>

  <!-- Add a button for exporting the chart -->
<button id="exportBtn">Export Chart as Pdf</button>

<script>
document.getElementById('exportBtn').addEventListener('click', function() {
    var url_base64 = document.getElementById('myChart').toDataURL('image/png');
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();

    // The addImage method takes the base64 URL, format, x, y, width, height
    pdf.addImage(url_base64, 'PNG', 15, 40, 180, 70);
    pdf.save('chart.pdf');

    // Optionally, send the image to the server to embed in PDF
    document.getElementById('imageData').value = url_base64;
    document.getElementById('formSubmit').submit(); // Submit form with base64 image data
});

</script>

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
@endsection
