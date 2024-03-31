@extends('layouts.master')

@section('content')
@if(Session::has('success'))
    <div class="alert alert-block alert-success">
        <i class=" fa fa-check cool-green "></i>
        {{ nl2br(Session::get('success')) }}
    </div>
@endif
    <div class="container mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1>User List</h1>
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Add User</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($users as $user)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('user.edit', $user) }}" class="btn-btn-sm btn-info">Edit</a>
                                    <form action="{{ route('user.destroy', $user) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">No Data Found!!</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
