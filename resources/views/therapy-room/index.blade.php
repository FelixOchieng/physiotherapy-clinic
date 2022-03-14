@extends('layouts.app')
@section('title', 'Therapy Rooms')
@section('css')
    @include('inc.datatable-css')
@endsection
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1> Therapy Rooms</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item active">Therapy Rooms</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"> Therapy Rooms</h2>
                    <div class="card-tools">
                        @can('add role')
                            <a href="{{ route('therapy-room.create') }}" class="btn btn-sm btn-secondary"><i
                                    class="fas fa-plus mr-2"></i>Add New Therapy Room</a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <table id="therapy-rooms-list" class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                @canany(['edit therapy room', 'delete therapy room'])
                                    <th>Actions</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($therapyRooms as $therapyRoom)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $therapyRoom->name }}</td>
                                    <td>
                                        @if ($therapyRoom->is_occupied)
                                            <span class="badge badge-danger">Busy</span>
                                        @else
                                            <span class="badge badge-success">Available</span>
                                        @endif
                                    </td>
                                    @canany(['view therapy room', 'edit therapy room', 'delete therapy room'])
                                        <td>
                                            <div class="d-flex">
                                                @can('edit therapy room')
                                                    <a href="{{ route('therapy-room.edit', $therapyRoom) }}"
                                                        class="btn btn-sm btn-info mr-2"><i class="far fa-edit mr-1"></i>Edit</a>
                                                @endcan

                                                @can('delete therapy room')
                                                    <form action="{{ route('therapy-room.destroy', $therapyRoom) }}"
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
            $('#therapy-rooms-list').DataTable();
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
