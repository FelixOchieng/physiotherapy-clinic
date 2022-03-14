@extends('layouts.app')
@section('title', 'Add Role')
@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add Role</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Roles</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-cart-plus"></i> Add Role</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"><i class="fas fa-plus-circle"></i> Add Role</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('role.store') }}" method="post">
                        @csrf
                        @include('role.form')
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
