@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-4">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="card-title">Modifier un Enregistrement</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('jour123survol.update', $jour_123_survol->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach($jour_123_survol->getFillable() as $field)
                        <div class="form-group">
                            <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            <input type="text" id="{{ $field }}" name="{{ $field }}" class="form-control" value="{{ old($field, $jour_123_survol->$field) }}" required>
                        </div>
                    @endforeach

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
