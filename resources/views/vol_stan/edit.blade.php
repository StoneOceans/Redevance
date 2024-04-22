@extends('layouts.template')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier un Vol</title>
</head>
<body>
    <h1>Modifier un Vol</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{ route('vol_stan.update', ['vol_stan' => $vol_stan]) }}">
        @csrf
        <div class="form-group">
            <label>Call Sign</label>
            <input type="text" class="form-control" name="Call_sign" placeholder="Call Sign" value="{{ $vol_stan->Call_sign }}"/>
        </div>
        <div class="form-group">
            <label>A_dep</label>
            <input type="text" class="form-control" name="A_dep" placeholder="A_dep" value="{{ $vol_stan->A_dep }}"/>
        </div>
        <div class="form-group">
            <label>A_des</label>
            <input type="text" class="form-control" name="A_des" placeholder="A_des" value="{{ $vol_stan->A_des }}"/>
        </div>
        <div class="form-group">
            <label>heure_entree</label>
            <input type="text" class="form-control" name="heure_entree" placeholder="heure_entree" value="{{ $vol_stan->heure_entree }}"/>
        </div>
        <div class="form-group">
            <label>Immatriculation</label>
            <input type="text" class="form-control" name="Immatriculation" placeholder="Immatriculation" value="{{ $vol_stan->Immatriculation }}"/>
        </div>
        <div class="form-group">
            <label>Date_file</label>
            <input type="text" class="form-control" name="Date_file" placeholder="Date_file" value="{{ $vol_stan->Date_file }}"/>
        </div>
        <div class="form-group">
            <label>Date_flight</label>
            <input type="text" class="form-control" name="Date_flight" placeholder="Date_flight" value="{{ $vol_stan->Date_flight }}"/>
        </div>
        <div class="form-group">
            <label>Pln Oaci</label>
            <input type="text" class="form-control" name="pln_oaci" placeholder="pln_oaci" value="{{ $vol_stan->pln_oaci }}"/>
        </div>
        <div class="form-group">
            <label>adresse_mac</label>
            <input type="text" class="form-control" name="adresse_mac" placeholder="adresse_mac" value="{{ $vol_stan->adresse_mac }}"/>
        </div>
        <div class="form-group">
            <label>ifpl_id</label>
            <input type="text" class="form-control" name="ifpl_id" placeholder="ifpl_id" value="{{ $vol_stan->ifpl_id }}"/>
        </div>
        <div class="form-group">
            <label>code_examption</label>
            <input type="text" class="form-control" name="code_examption" placeholder="code_examption" value="{{ $vol_stan->code_examption }}"/>
        </div>
        <div class="form-group">
            <label>code_operateur</label>
            <input type="text" class="form-control" name="code_operateur" placeholder="code_operateur" value="{{ $vol_stan->code_operateur }}"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Save a New Product" />
        </div>
    </form>

</body>
</html>
@endsection