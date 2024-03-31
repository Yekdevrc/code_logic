@extends('layouts.master')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1>Edit User</h1>
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">User List</a>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', $user) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name')
                                is-invalid
                            @enderror" value="{{ $user->name }}" placeholder="Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email')
                                is-invalid
                            @enderror" value="{{ $user->email }}" placeholder="email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Passowrd</label>
                            <input type="password" name="password" class="form-control @error('password')
                                is-invalid
                            @enderror" placeholder="password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Passowrd</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation')
                                is-invalid
                            @enderror" placeholder="password_confirmation">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-select">
                                <option value="admin" {{ $user->type=="admin"? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->type=="user"? 'selected':'' }}>User</option>
                            </select>
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
