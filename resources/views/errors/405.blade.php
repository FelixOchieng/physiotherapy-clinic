@extends('layouts.auth')
@section('title', 'Error 405 Page')
@section('content')
    <div class="login-box">
        <div class="error-page">
            <h2 class="headline text-warning">405</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! The server returned a "405 Method Not Allowed".</h3>

                <p>
                    Something is broken. Please let us know what you were doing when this error occurred. We will fix it as soon as possible. Sorry for any inconvenience caused.
                </p>
            </div>
        </div>
    </div>
@endsection
