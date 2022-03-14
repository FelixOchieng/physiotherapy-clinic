@extends('layouts.auth')
@section('title', 'Error 500 Page')
@section('content')
    <div class="login-box">
        <div class="error-page">
            <h2 class="headline text-warning">500</h2>

             <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Something went wrong.</h3>

            <p>
                We will work on fixing that right away.
                Meanwhile,<a href="{{ getUserHomeRoute() }}">return to dashboard</a> or contact your administrator.
            </p>
        </div>
        </div>
    </div>
@endsection
