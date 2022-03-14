@extends('layouts.app')
@section('title', 'Edit Client')
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Client</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Clients</a></li>
                <li class="breadcrumb-item active">Edit Client</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"><i class="fas fa-edit"></i> Edit Client</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('client.update', $client) }}" method="post">
                        @csrf
                        @method('PATCH')
                        @include('client.form')
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
