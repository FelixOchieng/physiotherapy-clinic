@extends('layouts.app')
@section('title', 'Roles')
@section('css')
    @include('inc.datatable-css')
@endsection
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1> Roles</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item active">Roles</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"> Roles</h2>
                    <div class="card-tools">
                        @can('add role')
                            <a href="{{ route('role.create') }}" class="btn btn-sm btn-secondary"><i
                                    class="fas fa-plus mr-2"></i>Add New Role</a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <table id="roles-list" class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                @canany(['view role', 'edit role', 'delete role'])
                                    <th>Actions</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    @canany(['view role', 'edit role', 'delete role'])
                                        <td>
                                            <div class="d-flex">
                                                @can('view role')
                                                    <a href="{{ route('role.show', $role) }}"
                                                        class="btn btn-sm btn-secondary mr-2"><i
                                                            class="far fa-eye mr-1"></i>Details</a>
                                                @endcan

                                                @can('edit role')
                                                    <a href="{{ route('role.edit', $role) }}"
                                                        class="btn btn-sm btn-info mr-2"><i
                                                            class="far fa-edit mr-1"></i>Edit</a>
                                                @endcan

                                                @can('delete role')
                                                    <form action="{{ route('role.destroy', $role) }}" method="post">
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
            $('#roles-list').DataTable();
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
