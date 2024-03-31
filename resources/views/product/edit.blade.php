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
                <h1>Create New Product</h1>
                <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">Product List</a>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $product) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control @error('name')
                                is-invalid
                            @enderror" placeholder="Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="manufacturing_date" class="form-label">Manufacturing Date</label>
                            <input type="date" name="manufacturing_date" value="{{ $product->manufacturing_date }}"  class="form-control @error('manufacturing_date')
                                is-invalid
                            @enderror" placeholder="manufacturing_date">
                            @error('manufacturing_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="manufacturing_price" class="form-label">Manufacturing Price</label>
                            <input type="text" name="manufacturing_price" value="{{ $product->manufacturing_price }}" class="form-control @error('manufacturing_price')
                                is-invalid
                            @enderror" placeholder="manufacturing_price">
                            @error('manufacturing_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="selling_price" class="form-label">Selling Price</label>
                            <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control @error('selling_price')
                                is-invalid
                            @enderror" placeholder="selling_price">
                            @error('selling_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control @error('quantity')
                                is-invalid
                            @enderror" placeholder="quantity">
                            @error('quantity')
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
