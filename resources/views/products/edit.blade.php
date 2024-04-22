@extends('layouts.template')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit a Vol</title>
</head>
<body>
    <h1>Edit a Vol</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
        @csrf 
        @method('put')
        <div class="form-group">
            <label>FLPL Call Sign</label>
            <input type="text" class="form-control" name="flpl_call_sign" placeholder="FLPL Call Sign" value="{{ $product->flpl_call_sign }}" />
        </div>
        <div class="form-group">
            <label>FLPL Departure Airport</label>
            <input type="text" class="form-control" name="flpl_depr_airp" placeholder="FLPL Departure Airport" value="{{ $product->flpl_depr_airp }}" />
        </div>
        <div class="form-group">
            <label>FLPL Arrival Airport</label>
            <input type="text" class="form-control" name="flpl_arrv_airp" placeholder="FLPL Arrival Airport" value="{{ $product->flpl_arrv_airp }}" />
        </div>
        <div class="form-group">
            <label>Aircraft Type</label>
            <input type="text" class="form-control" name="airc_type" placeholder="Aircraft Type" value="{{ $product->airc_type }}" />
        </div>
        <div class="form-group">
            <label>AOBT</label>
            <input type="text" class="form-control" name="aobt" placeholder="AOBT" value="{{ $product->aobt }}" />
        </div>
        <div class="form-group">
            <label>EOBT</label>
            <input type="text" class="form-control" name="eobt" placeholder="EOBT" value="{{ $product->eobt }}" />
        </div>
        <div class="form-group">
            <label>File Date</label>
            <input type="text" class="form-control" name="file_date" placeholder="File Date" value="{{ $product->file_date }}" />
        </div>
        <div class="form-group">
            <label>Flight State</label>
            <input type="text" class="form-control" name="flight_state" placeholder="Flight State" value="{{ $product->flight_state }}" />
        </div>
        <div class="form-group">
            <label>Flight Type</label>
            <input type="text" class="form-control" name="flight_type" placeholder="Flight Type" value="{{ $product->flight_type }}" />
        </div>
        <div class="form-group">
            <label>IFPS Registration Mark</label>
            <input type="text" class="form-control" name="ifps_registration_mark" placeholder="IFPS Registration Mark" value="{{ $product->ifps_registration_mark }}" />
        </div>
        <div class="form-group">
            <label>Initial Flight Rule</label>
            <input type="text" class="form-control" name="initial_flight_rule" placeholder="Initial Flight Rule" value="{{ $product->initial_flight_rule }}" />
        </div>
        <div class="form-group">
            <label>NM IFPS ID</label>
            <input type="text" class="form-control" name="nm_ifps_id" placeholder="NM IFPS ID" value="{{ $product->nm_ifps_id }}" />
        </div>
        <div class="form-group">
            <label>NM Tactical ID</label>
            <input type="text" class="form-control" name="nm_tactical_id" placeholder="NM Tactical ID" value="{{ $product->nm_tactical_id }}" />
        </div>
        <!-- Add more fields as needed -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>
    </form>
</body>
</html>
@endsection