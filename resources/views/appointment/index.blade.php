@extends('layouts.app')
@section('title', 'Appointments')
@section('css')
    @include('inc.datatable-css')
@endsection
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1> Appointments</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item active">Appointments</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"> Appointments</h2>
                    <div class="card-tools">
                        @can('add appointment')
                            <a href="{{ route('appointment.create') }}" class="btn btn-sm btn-secondary"><i
                                    class="fas fa-plus mr-2"></i>Book Appointment</a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <table id="appointments-list" class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Therapy Room</th>
                                <th>Therapist</th>
                                <th>Date and Time</th>
                                <th>Status</th>
                                @canany(['view appointment', 'edit appointment', 'delete appointment'])
                                    <th>Actions</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $appointment->client->name }}</td>
                                    <td>{{ $appointment->therapyRoom->name }}</td>
                                    <td>{{ $appointment->therapist->name }}</td>
                                    <td>{{ $appointment->timestamp }}</td>
                                    <td>{{ $appointment->status }}</td>
                                    @canany(['change appointment status', 'edit appointment', 'delete appointment'])
                                        <td>
                                            <div class="d-flex">
                                                @can('change appointment status')
                                                    @if ($appointment->status === 'scheduled')
                                                        <form action="{{ route('appointment.mark-ongoing', $appointment) }}"
                                                            method="post" class="mr-2">
                                                            @csrf
                                                            <button class="shadow btn btn-sm btn-secondary" type="submit">
                                                                <i class="fas fa-check mr-1"></i>Mark Ongoing
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if ($appointment->status === 'ongoing')
                                                        <form action="{{ route('appointment.mark-complete', $appointment) }}"
                                                            method="post" class="mr-2">
                                                            @csrf
                                                            <button class="shadow btn btn-sm btn-secondary" type="submit">
                                                                <i class="fas fa-check mr-1"></i>Mark Complete
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endcan

                                                @can('edit appointment')
                                                    <a href="{{ route('appointment.edit', $appointment) }}"
                                                        class="btn btn-sm btn-info mr-2"><i class="far fa-edit mr-1"></i>Edit</a>
                                                @endcan

                                                @can('delete appointment')
                                                    <form action="{{ route('appointment.destroy', $appointment) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="shadow btn btn-sm btn-danger" type="submit">
                                                            <i class="fas fa-trash-alt mr-1"></i>Delete
                                                        </button>
                                                    </form>
                                                @endcan

                                            </div>
                                        </td>
                                    @endcanany()
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('inc.datatable-js')
    <script>
        $(document).ready(function() {
            $('#appointments-list').DataTable();
        });

        @if (Session::has('success'))
            toastr.options =
            {
            "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        @endif
    </script>
@endsection
