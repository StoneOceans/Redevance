@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crée un vol</title>
</head>
<body>
    <h1>Crée un vol</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
        <form method="POST" action="{{ route('vol_allft.store') }}">
        @csrf
        <div class="form-group">
            <label>Call Sign</label>
            <input type="text" class="form-control" name="call_sign" placeholder="call Sign" />
        </div>
        <div class="form-group">
            <label>A_dep</label>
            <input type="text" class="form-control" name="a_dep" placeholder="a_dep" />
        </div>
        <div class="form-group">
            <label>A_des</label>
            <input type="text" class="form-control" name="a_des" placeholder="a_des" />
        </div>
        <div class="form-group">
            <label>heure_entree</label>
            <input type="text" class="form-control" name="heure_de_reference" placeholder="heure_de_reference" />
        </div>
        <div class="form-group">
            <label>Immatriculation</label>
            <input type="text" class="form-control" name="immatriculation" placeholder="immatriculation" />
        </div>
        <div class="form-group">
            <label>Date_file</label>
            <input type="text" class="form-control" name="date_de_reference" placeholder="date_de_reference" />
        </div>
        <div class="form-group">
            <label>adresse_mac</label>
            <input type="text" class="form-control" name="adresse_mac" placeholder="adresse_mac" />
        </div>
        <div class="form-group">
            <label>ifpl_id</label>
            <input type="text" class="form-control" name="ifpl_id" placeholder="ifpl_id" />
        </div>
        <div class="form-group">
            <label>code_examption</label>
            <input type="text" class="form-control" name="code_examption" placeholder="code_examption" />
        </div>
        <div class="form-group">
            <label>code_operateur</label>
            <input type="text" class="form-control" name="code_operateur" placeholder="code_operateur" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Save a New Product" />
        </div>
    </form>

</body>
</html>
@endsection