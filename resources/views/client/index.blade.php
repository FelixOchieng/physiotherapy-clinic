@extends('layouts.app')
@section('title', 'Clients')
@section('css')
    @include('inc.datatable-css')
@endsection
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1> Clients</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item active">Clients</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"> Clients</h2>
                    <div class="card-tools">
                        @can('add client')
                            <a href="{{ route('client.create') }}" class="btn btn-sm btn-secondary"><i
                                    class="fas fa-plus mr-2"></i>Add New Client </a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <table id="clients-list" class="table table-sm table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Residence</th>
                                <th>Gender</th>
                                @canany(['view client', 'edit client', 'delete client'])
                                    <th>Actions</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->age }}</td>
                                    <td>{{ $client->residence }}</td>
                                    <td>{{ $client->gender }}</td>
                                    @canany(['edit client', 'delete client'])
                                        <td>
                                            <div class="d-flex">
                                                @can('edit client')
                                                    <a href="{{ route('client.edit', $client) }}"
                                                        class="btn btn-sm btn-info mr-2"><i class="far fa-edit mr-1"></i>Edit</a>
                                                @endcan

                                                @can('delete client')
                                                    <form action="{{ route('client.destroy', $client) }}" method="post">
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
            $('#clients-list').DataTable();
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
