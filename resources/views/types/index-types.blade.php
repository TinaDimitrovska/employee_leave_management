
@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Days allowed</th>
            <th scope="col">Updated At</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
        <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
            <td>{{ $type->description }}</td>
            <td>{{ $type->days_allowed }}</td>
            <td>{{ $type->updated_at }}</td>
            <td>{{ $type->created_at }}</td>
            <td>
                <a type="button" class="btn btn-primary" href="/types/{{$type->id}}/edit">
                    Edit type
                </a>
                <form class="d-inline" action="/types/{{$type->id}}" method="post">
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