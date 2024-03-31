<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories=Inventory::with('product')->get();
        return view('inventory.index', compact('inventories'));
    }
}
