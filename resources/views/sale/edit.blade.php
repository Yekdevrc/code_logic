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
                <h1>Edit Sale</h1>
                <a href="{{ route('sale.index') }}" class="btn btn-sm btn-primary">Sales List</a>
            </div>
            <div class="card-body">
                <form action="{{ route('sale.update', $sale) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="product_id" class="form-label">Product</label>
                            <select name="product_id" id="product_id" class="form-select">
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $sale->product_id == old('product_id', $product->id)? 'selected': '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user_id" class="form-label">User</label>
                            <select name="user_id" id="user_id" class="form-select">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $sale->user_id == old('user_id', $user->id)? 'selected': '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" name="quantity" value="{{ $sale->quantity }}" class="form-control @error('quantity')
                                is-invalid
                            @enderror" placeholder="Quantity">
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
