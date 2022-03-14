@extends('layouts.app')
@section('title', 'Book Appointment')
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Book Appointment</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('appointment.index') }}">Appointments</a></li>
                <li class="breadcrumb-item active"> Book Appointment</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"><i class="fas fa-plus-circle"></i> Book Appointment</h2>
                    <div class="card-tools">
                        <a href="{{ route('client.create') }}" class="btn btn-sm btn-secondary"><i
                                class="fas fa-plus mr-2"></i>New Client</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('appointment.store') }}" method="post">
                        @csrf
                        @include('appointment.form')
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fas fa-save"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
