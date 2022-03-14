@extends('layouts.app')
@section('title', 'Edit System User')
@section('header-content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit System User</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ getUserHomeRoute() }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">System Users</a></li>
                <li class="breadcrumb-item active">Edit System User</li>
            </ol>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h2 class="card-title"><i class="fas fa-edit"></i> Edit System User</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" required
                                placeholder="Enter role name" value="{{ $user->name }}">
                            @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail Address:</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" required
                                placeholder="Enter role name" value="{{ $user->email }}">
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Roles:</label>
                            @foreach ($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                        @if ($user->hasRole($role->name)) checked @endif>
                                    <label> {{ $role->name }}</label>
                                </div>
                            @endforeach
                        </div>
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
