@extends('layouts.app')
@section('title', 'Add New Client')
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add New Client</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Clients</a></li>
                <li class="breadcrumb-item active"> Add New Client</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"><i class="fas fa-plus-circle"></i> Add New Client</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('client.store') }}" method="post">
                        @csrf
                        @include('client.form')
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
