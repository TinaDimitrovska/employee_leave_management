@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Department</th>
            <th scope="col">Email</th>
            <th scope="col">Updated At</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td><span class="badge rounded-pill {{$user->role == 'admin' ? 'bg-primary' : 'bg-secondary'}}">{{ $user->role }}</span></td>
            <td>{{ $user->department }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
            <a type="button" class="btn btn-primary" href="/users/{{$user->id}}/edit">
                    Edit user
                </a>
                <form class="d-inline" action="/users/{{$user->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection