@extends('layouts.app')
@section('title', 'Role Details')
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Role Details</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Role Details</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"><i class="fas fa-eye"></i> {{ $role->name }} Role Details</h2>
                    <div class="card-tools">
                        @can('edit role')
                            <a href="{{ route('role.edit', $role) }}" class="btn btn-sm btn-secondary"><i
                                    class="fas fa-edit mr-2"></i>Edit Role</a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <h6>Name: <strong>{{ $role->name }}</strong></h6>
                    <h6>Permissions:</h6>
                    <div class="row">
                        @forelse ($role->permissions as $permission)
                            <div class="col-md-3">
                                <i class="fas fa-check-circle text-success mr-1"></i><span
                                    class="d-inline-block">{{ $permission->name }}</span>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <span class="d-inline-block">This role has no associated permissions at the
                                    moment.</span>

                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
