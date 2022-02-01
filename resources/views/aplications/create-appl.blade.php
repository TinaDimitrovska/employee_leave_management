@extends('layouts.app')
@section('content')
<div class="container bg-light m-3 border-primary">
    <h1>Create Leave Application</h1>
    <form action="/applications" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="leave_type_id" class="col-md-4 col-form-label text-md-right">Choose leave type:</label>

            <div class="col-md-6">
                <select id="leave_type_id" name="leave_type_id" class="form-control col-md-6">
                    @foreach ($types as $type)
                    <option value="{{$type->id}}">{{ucfirst($type->name)}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="date" class="col-md-4 col-form-label text-md-right">From Date:</label>
            <div class="col-md-6">
                <input type="date" id="date" name="from_date" class="form-control col-md-6">
            </div>
        </div>
        <div class="row mb-3">
            <label for="date" class="col-md-4 col-form-label text-md-right">To Date:</label>
            <div class="col-md-6">
                <input type="date" id="date" name="to_date" class="form-control ">
            </div>
        </div>
        <div class="row mb-3">
            <label for="note" class="col-md-4 col-form-label text-md-right">Note:</label>

            <div class="col-md-6">
                <input id="note" type="text" class="form-control @error('name') is-invalid @enderror" name="note" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                    {{ __('Create') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection