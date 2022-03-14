@extends('layouts.app')
@section('title', 'Error 403 Page')
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Error 403 Page</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item active">Error 403 Page</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="error-page">
        <h2 class="headline text-warning">403</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Insufficient Privileges .</h3>

            <p>
                You do not have sufficient privileges to perform requested action(s).
                Meanwhile,<a href="{{ getUserHomeRoute() }}">return to dashboard</a> or contact your administrator.
            </p>
        </div>
    </div>
@endsection
