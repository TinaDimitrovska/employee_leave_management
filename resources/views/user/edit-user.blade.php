@extends('layouts.app')
@section('content')
<div class="container bg-light m-3 border-primary">
    <h1>Create new User</h1>
    <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="role" class="col-md-4 col-form-label text-md-right">Choose user role:</label>

        <div class="col-md-6">
        <select id="role" name="role" class="form-control col-md-6">
            @foreach ($roles as $role)
            <option {{$user->role == $role ? 'selected' : ''}}  value="{{$role}}">{{ucfirst($role)}}</option>
            @endforeach
        </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="depratment" class="col-md-4 col-form-label text-md-right">Choose user department:</label>

        <div class="col-md-6">
        <select id="department" name="department" class="form-control col-md-6">
            @foreach ($departments as $department)
            <option {{$user->department == $department ? 'selected' : ''}}  value="{{$department}}">{{ucfirst($department)}}</option>
            @endforeach
        </select>
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