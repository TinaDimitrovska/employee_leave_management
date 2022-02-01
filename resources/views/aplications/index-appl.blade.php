@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Leave Type</th>
            <th scope="col">From Date</th>
            <th scope="col">To Date</th>
            <th scope="col">Status</th>
            <th scope="col">Updated At</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appls as $appl)
        <tr>
            <td>{{$appl->id}}</td>
            <td>{{$appl->user->name}}</td>
            <td>{{$appl->leaveType->name}}</td>
            <td>{{$appl->from_date}}</td>
            <td>{{$appl->to_date}}</td>
            <td><span class="badge rounded-pill bg-primary">{{$appl->status}}</span></td>
            <td>{{$appl->updated_at}}</td>
            <td>{{$appl->created_at}}</td>
            <td><a type="button" class="btn btn-primary" href="/applications/{{$appl->id}}/edit">
                    Edit type
                </a>
                <form class="d-inline" action="/applications/{{$appl->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" data-toggle="tooltip">Delete</button>
                </form>
                @if($appl->attachment)
                <form class="d-inline" action="/applications/{{$appl->id}}/download" method="post">
                    @csrf
                    <button type="submit" class="btn btn-light" style="border: solid 1px;">Attacment</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection