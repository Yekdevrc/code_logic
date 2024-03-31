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
                <h1>Sales List</h1>
                <a href="{{ route('sale.create') }}" class="btn btn-sm btn-primary">Add sale</a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered border-2">
                    <tbody>
                        <tr>
                            <th>SN</th>
                            <th>Product</th>
                            <th>User</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($sales as $sale)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $sale->product->name ?? '' }}</td>
                                <td>{{ $sale->user->name ?? '' }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('sale.edit', $sale) }}" class="btn-btn-sm btn-info">Edit</a>
                                    <form action="{{ route('sale.destroy', $sale) }}" method="post">
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
                <div class="row">
                    <a href="{{ route('generate') }}" class="btn btn-sm btn-info">Generate PDF</a>
                </div>
            </div>
        </div>
    </div>
@endsection
