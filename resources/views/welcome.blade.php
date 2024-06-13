@extends('layouts.master')

@section('content')
<head>
  <title>Tableau de vols</title>
  <style>
    .indicator {
      display: inline-block; /* Places indicators side by side */
      padding: 20px;
      border-radius: 5px;
      margin: 10px; /* Space between indicators */
      color: white;
    }

    .tasks {
      background-color: #03045e; /* Deep Blue */
    }

    .tickets {
      background-color: #0077b6; /* Sky Blue */
    }

    .reviews {
      background-color: #00b4d8; /* Light Blue */
    }
    .indicator {
      display: inline-block; /* Places indicators side by side */
      padding: 20px;
      border-radius: 5px;
      margin: 10px; /* Space between indicators */
      color: white;
    }

    .tasks {
      background-color: #03045e; /* Deep Blue */
    }

    .tickets {
      background-color: #0077b6; /* Sky Blue */
    }

    .reviews {
      background-color: #00b4d8; /* Light Blue */
    }

    .users {
      background-color: #3066BE; /* Pale Blue */
    }

    .sales {
      background-color: #0096C7; /* Very Pale Blue */
    }

    .returns {
      background-color: #0077b6; /* Sky Blue */
    }


    .profiles {
      background-color: #3066BE; /* Pale Blue */
    }

    .icon {
      font-size: 24px;
      margin-right: 15px; /* Space between the icon and text */
    }

    .text {
      display: inline-block; /* Aligns text vertically with the icon */
    }

    .label {
      display: block; /* Places the label above the value */
      font-size: 14px;
    }

    .value {
      font-size: 28px;
      font-weight: bold;
    }

    .section {
      margin-bottom: 30px;
    }

    .section-title {
      font-size: 20px;
      font-weight: bold;
      margin-top: 20px;
      margin-bottom: 10px;
      color: #333;
    }
  </style>
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
        <span class="value">340</span>
      </div>
    </div>
    <div class="indicator sales">
      <div class="text">
        <span class="label">Type PLN ABI</span>
        <span class="value">150</span>
      </div>
    </div>
    <div class="indicator returns">
      <div class="text">
        <span class="label">Type PLN ABI</span>
        <span class="value">150</span>
      </div>
    </div>
    <div class="indicator profiles">
      <div class="text">
        <span class="label">Type PLN finale</span>
        <span class="value">89</span>
      </div>
    </div>
  </div>
</body>
@endsection
