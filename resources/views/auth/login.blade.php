@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <div class="login-box">
        <div class="card card-outline card-secondary">
            <div class="card-header text-center">
                <h4>ABC Physiotherapy Clinic</h4>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                            name="username" value="{{ old('username') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('username')
                            <span class="invalid-feedback">
                                <strong> {{ $message }} </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback">
                                <strong> {{ $message }} </strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block">Sign In</button>
                </form>
            </div>

        </div>

    </div>
@endsection
