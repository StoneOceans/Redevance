@extends('layouts.template')


@section('content')
    <p>Projet Redevance: Le logiciel Redevances est un outil pour la facturation des redevances des milliers d’avions traversant quotidiennement l’espace aérien français.</p>
    <a href="{{ route('product.index') }}" class="btn btn-secondary"> Commencer à ajouter d'autes vols <i class="mdi mdi-plus"></i></a>
@endsection
