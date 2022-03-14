@extends('layouts.app')
@section('title', 'System Users')
@section('css')
    @include('inc.datatable-css')
@endsection
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>System Users</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item active">System Users</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"><i class="fas fa-users"></i> System Users</h2>
                    <div class="card-tools">
                        @can('add user')
                            <a href="{{ route('register') }}" class="btn btn-sm btn-secondary"><i
                                    class="fas fa-plus mr-2"></i>Register User</a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <table id="users-list" class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                @canany(['view user', 'edit user', 'delete user'])
                                    <th>Actions</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @canany(['view user', 'edit user', 'delete user'])
                                        <td>
                                            <div class="d-flex">
                                                @can('view user')
                                                    <a href="{{ route('user.show', $user) }}"
                                                        class="btn btn-sm btn-secondary mr-2"><i
                                                            class="far fa-eye mr-1"></i>Details</a>
                                                @endcan

                                                @can('edit user')
                                                    <a href="{{ route('user.edit', $user) }}"
                                                        class="btn btn-sm btn-info mr-2"><i
                                                            class="far fa-edit mr-1"></i>Edit</a>
                                                @endcan


                                                @can('delete user')
                                                    <form action="{{ route('user.destroy', $user) }}" method="post">
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
            $('#users-list').DataTable();
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
