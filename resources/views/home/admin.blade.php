@extends('layouts.app')

@section('title', 'Home')


@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Therapists</span>
                    <span class="info-box-number">{{ $totalTherapists }}</span>
                    <span><a href="{{ route('user.therapist') }}">Show More<i class="fas fa-arrow-right ml-1"></i></a></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Appointments</span>
                    <span class="info-box-number">{{ $totalAppointments }}</span>
                    <span><a href="{{ route('appointment.index') }}">Show More<i class="fas fa-arrow-right ml-1"></i></a></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Therapy Rooms</span>
                    <span class="info-box-number">{{ $totalTherapyRooms }}</span>
                    <span><a href="{{ route('therapy-room.index') }}">Show More<i class="fas fa-arrow-right ml-1"></i></a></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Clients</span>
                    <span class="info-box-number">{{ $totalClients }}</span>
                    <span><a href="{{ route('client.index') }}">Show More<i class="fas fa-arrow-right ml-1"></i></a></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
