@extends('layouts.template')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a Vol</title>
</head>
<body>
    <h1>Create a Vol</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{ route('product.store') }}">
        @csrf 
        @method('post')
        <div class="form-group">
            <label>FLPL Call Sign</label>
            <input type="text" class="form-control" name="flpl_call_sign" placeholder="FLPL Call Sign" />
        </div>
        <div class="form-group">
            <label>FLPL Departure Airport</label>
            <input type="text" class="form-control" name="flpl_depr_airp" placeholder="FLPL Departure Airport" />
        </div>
        <div class="form-group">
            <label>FLPL Arrival Airport</label>
            <input type="text" class="form-control" name="flpl_arrv_airp" placeholder="FLPL Arrival Airport" />
        </div>
        <div class="form-group">
            <label>Aircraft Type</label>
            <input type="text" class="form-control" name="airc_type" placeholder="Aircraft Type" />
        </div>
        <div class="form-group">
            <label>AOBT</label>
            <input type="text" class="form-control" name="aobt" placeholder="AOBT" />
        </div>
        <div class="form-group">
            <label>EOBT</label>
            <input type="text" class="form-control" name="eobt" placeholder="EOBT" />
        </div>
        <div class="form-group">
            <label>File Date</label>
            <input type="text" class="form-control" name="file_date" placeholder="File Date" />
        </div>
        <div class="form-group">
            <label>Flight State</label>
            <input type="text" class="form-control" name="flight_state" placeholder="Flight State" />
        </div>
        <div class="form-group">
            <label>Flight Type</label>
            <input type="text" class="form-control" name="flight_type" placeholder="Flight Type" />
        </div>
        <div class="form-group">
            <label>IFPS Registration Mark</label>
            <input type="text" class="form-control" name="ifps_registration_mark" placeholder="IFPS Registration Mark" />
        </div>
        <div class="form-group">
            <label>Initial Flight Rule</label>
            <input type="text" class="form-control" name="initial_flight_rule" placeholder="Initial Flight Rule" />
        </div>
        <div class="form-group">
            <label>NM IFPS ID</label>
            <input type="text" class="form-control" name="nm_ifps_id" placeholder="NM IFPS ID" />
        </div>
        <div class="form-group">
            <label>NM Tactical ID</label>
            <input type="text" class="form-control" name="nm_tactical_id" placeholder="NM Tactical ID" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Save a New Product" />
        </div>
    </form>
</body>
</html>
@endsection