@extends('layouts.app')
@section('title', 'Permissions')
@section('css')
    @include('inc.datatable-css')
@endsection
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1> Permissions</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item active"> Permissions</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="card-title">Permissions</h6>
                    <div class="card-tools">
                        @can('add permission')
                            <a href="{{ route('permission.create') }}" class="btn btn-sm btn-secondary text-white"><i
                                    class="fas fa-plus mr-2"></i>Add New Permission</a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <table id="permissions-list" class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                @canany(['edit permission', 'delete permission'])
                                    <th>Actions</th>
                                @endcanany

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    @canany(['edit permission', 'delete permission'])
                                        <td>
                                            <div class="d-flex">
                                                @can('edit permission')
                                                    <a href="{{ route('permission.edit', $permission) }}"
                                                        class="btn btn-sm btn-info mr-2"><i
                                                            class="far fa-edit mr-1"></i>Edit</a>
                                                @endcan


                                                @can('delete permission')
                                                    <form action="{{ route('permission.destroy', $permission) }}"
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
                                    @endcanany

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
            $('#permissions-list').DataTable();
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
