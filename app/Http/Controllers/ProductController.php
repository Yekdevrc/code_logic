<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::with('user')->get();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $product=Product::create($request->validated() + [
                'created_by'=> auth()->user()->id
            ]);

            Inventory::updateOrCreate([
                'product_id'=> $product->id,
                'quantity'=> $request->quantity
            ]);
            DB::commit();

            return back()->with('success', 'Product Added Successfully');
        } catch (\Throwable $th)
        {
            DB::rollback();
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        DB::beginTransaction();
        try
        {
            $product->update($request->validated());

            Inventory::updateOrCreate([
                'product_id'=> $product->id,
                'quantity'=> $request->quantity
            ]);
            DB::commit();

            return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
        } catch (\Throwable $th)
        {
            DB::rollback();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product Deleted Successfully');
    }
}
