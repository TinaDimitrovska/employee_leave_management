@extends('layouts.app')
@section('content')
<div class="container bg-light m-3 border-primary">
    <h1>Create new Leave Types</h1>
    <form action="/types" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripton') }}</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control @error('name') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="name" autofocus>

                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="days_allowed" class="col-md-4 col-form-label text-md-right">{{ __('Days allowed') }}</label>

            <div class="col-md-6">
                <input id="days_allowed" type="number" class="form-control @error('name') is-invalid @enderror" name="days_allowed" value="{{ old('days_allowed') }}" required autocomplete="name" autofocus>

                @error('days_allowed')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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