@extends('layouts.app')

@section('title', 'Home')


@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">User Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item active">User Dashboard</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clock"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Appointments</span>
                    <span class="info-box-number">{{ $totalAppointments }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clock"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Scheduled</span>
                    <span class="info-box-number">{{ $scheduledAppointments }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>


        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clock"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Ongoing Appointments</span>
                    <span class="info-box-number">{{ $ongoingAppointments }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-clock"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Complete Appointments</span>
                    <span class="info-box-number">{{ $completeAppointments }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
@endsection
