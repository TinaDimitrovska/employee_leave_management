@extends('layouts.app')
@section('content')
<div class="container bg-light m-3 border-primary">
    <h1>Edit Leave Application for user: {{$appl->user->name}}</h1>
    <form action="/applications/{{$appl->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="leave_type_id" class="col-md-4 col-form-label text-md-right">Choose leave type:</label>

            <div class="col-md-6">
                <select id="leave_type_id" name="leave_type_id" class="form-control col-md-6">
                    <option></option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}" {{$appl->leave_type_id == $type->id ? 'selected' : ''}}>{{ucfirst($type->name)}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if (auth()->user()->role == "admin")
        <div class="row mb-3">
            <label for="status" class="col-md-4 col-form-label text-md-right">Status:</label>

            <div class="col-md-6">
                <select id="status" name="status" class="form-control col-md-6">
                    <option></option>
                    @foreach ($statuses as $status)
                    <option {{$appl->status == $status ? 'selected' : ''}} value="{{$status}}">{{ucfirst($status)}}</option>
                    @endforeach
                </select>
            </div>
        </div>    
        @endif
        <div class="row mb-3">
            <label for="date" class="col-md-4 col-form-label text-md-right">From Date:</label>
            <div class="col-md-6">
                <input type="date" id="date" value="{{$appl->from_date}}" name="from_date" class="form-control col-md-6">
            </div>
        </div>
        <div class="row mb-3">
            <label for="date" class="col-md-4 col-form-label text-md-right">To Date:</label>
            <div class="col-md-6">
                <input type="date" id="date" value="{{$appl->to_date}}" name="to_date" class="form-control ">
            </div>
        </div>
        <div class="row mb-3">
            <label for="note" value="{{$appl->note}}" class="col-md-4 col-form-label text-md-right">Note:</label>

            <div class="col-md-6">
                <input id="note" type="text" class="form-control @error('name') is-invalid @enderror" name="note" value="{{ old('name') }}"  autocomplete="name" autofocus>
            </div>
        </div>
        <div class="row mb-3">
            <label for="formFile" class="col-md-4 col-form-label text-md-right">Upload File</label>
            <div class="col-md-6">
                <input class="form-control" name="file" type="file" id="formFile">
            </div>
        </div>

        <div class="row mb-0 mt-3">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection