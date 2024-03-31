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
                <h1>Inventory List</h1>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>SN</th>
                            <th>Product</th>
                            <th>Remain Quantity</th>
                        </tr>
                        @forelse ($inventories as $inventory)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $inventory->product->name ?? '' }}</td>
                                <td>{{ $inventory->quantity }}</td>
                            </tr>
                        @empty
                            <td colspan="4" class="text-center">No Data Found!!</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
