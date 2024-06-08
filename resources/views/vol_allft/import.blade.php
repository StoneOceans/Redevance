@extends('layouts.template')

@section('content')
<html>
<head>
    <title>Import CSV</title>
</head>
<body>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vol_allft.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file_csv" id="file_csv" required>
        <button type="submit">Import CSV</button>
    </form>
</body>
</html>
@endsection
