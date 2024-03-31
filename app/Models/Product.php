<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable=[
        'name',
        'selling_price',
        'quantity',
        'manufacturing_price',
        'created_by',
        'manufacturing_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Inventory::class);
    }
}
