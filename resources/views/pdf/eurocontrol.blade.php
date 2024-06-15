@extends('layouts.master')

@section('content')
<head>
    <title>Eurocontrol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
    <h1>Eurocontrol Flight Data</h1>

    <div>
        <input type="text" id="datePicker" placeholder="Select Date">
        <button onclick="downloadData()">Download TXT</button>
    </div>

    <script>
        flatpickr("#datePicker", {
            enableTime: false,
            dateFormat: "Y-m-d",
        });

        function downloadData() {
            const date = document.getElementById('datePicker').value;
            if (date) {
                window.location.href = `/download-txt/${date}`;
            } else {
                alert('Please select a date.');
            }
        }
    </script>
</body>
@endsection
