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
                <h1>Product List</h1>
                <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Add Product</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>quantity</th>
                            <th>Manufacturing Price</th>
                            <th>Selling Price</th>
                            <th>Manifacturing Date</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($products as $product)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->manufacturing_price }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->manufacturing_date }}</td>
                                <td>{{ $product->user->name ?? '' }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('product.edit', $product) }}" class="btn-btn-sm btn-info">Edit</a>
                                    <form action="{{ route('product.destroy', $product) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="8" class="text-center">No Data Found!!</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
