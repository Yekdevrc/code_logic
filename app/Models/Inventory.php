<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable=[
        'product_id',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // public function getRemainQuantityAttribute()
    // {
    //     //
    //     return $this->product()->quantity - $this->attributes['quantity'];
    // }
}
