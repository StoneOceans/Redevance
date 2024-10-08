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
  @can('view-indicators')
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
  @endcan

</body>
@endsection
