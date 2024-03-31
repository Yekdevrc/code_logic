<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales=Sale::with('product','user')->get();

        return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=Product::where('quantity', '>', 1)->get();
        $users=User::where('type', 'user')->get();

        return view('sale.create', compact('products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $validated=$request->validate([
                'product_id'=> ['required', Rule::exists('products', 'id')->withoutTrashed()],
                'user_id'=> ['required', Rule::exists('users', 'id')->withoutTrashed()],
                'quantity'=> ['required']
            ]);

            Sale::create($validated);

            $quantity=Inventory::where('product_id', $request->product_id)->first('quantity');

            Inventory::updateOrCreate([
                'product_id'=> $request->product_id
            ],[
                'quantity'=> $quantity->quantity - $request->quantity
            ]);
            DB::commit();

            return back()->with('success', 'Sale Added Successfully');
        } catch (\Throwable $th)
        {
            DB::rollback();
            return back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $products=Product::where('quantity', '>', 1)->get();
        $users=User::where('type', 'user')->get();

        return view('sale.edit', compact('sale','products', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        DB::beginTransaction();
        try
        {
            $validated=$request->validate([
                'product_id'=> ['required', Rule::exists('products', 'id')->withoutTrashed()],
                'user_id'=> ['required', Rule::exists('users', 'id')->withoutTrashed()],
                'quantity'=> ['required']
            ]);

            $sale->update($validated);

            $quantity=Inventory::where('product_id', $request->product_id)->first('quantity');

            Inventory::updateOrCreate([
                'product_id'=> $request->product_id
            ],[
                'quantity'=> $quantity->quantity - $request->quantity
            ]);
            DB::commit();

            return back()->with('success', 'Sale Added Successfully');
        } catch (\Throwable $th)
        {
            DB::rollback();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();

        return back()->with('success', 'Sale Deleted Successfully');
    }
}
