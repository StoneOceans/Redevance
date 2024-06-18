<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
    <h1>Flight Details</h1>
    <p>Call Sign: {{ $vol->call_sign }}</p>
    <p>Departure Airport: {{ $vol->a_dep }}</p>
    <p>Destination Airport: {{ $vol->a_des }}</p>
    <p>Entry Time: {{ $vol->heure_de_reference }}</p>
</body>
</html>
