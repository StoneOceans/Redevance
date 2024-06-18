@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success">
  <p>{{ session('success') }}</p>
</div>
@endif

<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Last Login</th> <!-- Changed Lastlogin to Last Login for clarity -->
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $index => $user)
  <tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        @if ($user->last_login_at)
            {{ $user->last_login_at }} <!-- Adjust date format as needed -->
        @else
            Ne s'est pas encore connecté
        @endif
    </td>
    <td>
      @foreach ($user->roles as $role)
        <span>{{ $role->name }}</span>{{ $loop->last ? '' : ', ' }}
      @endforeach
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
        <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
  </tr>
 @endforeach
</table>

{{ $data->links() }} {{-- Assuming 'links' method is used for pagination in Laravel 7+ --}}

@endsection
