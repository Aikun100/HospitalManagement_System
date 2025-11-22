<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    
    protected $fillable = [
        'item_code',
        'item_name',
        'category',
        'description',
        'quantity',
        'minimum_quantity',
        'unit',
        'unit_price',
        'supplier',
        'expiry_date',
        'purchase_date',
        'location',
        'status'
    ];

    protected $casts = [
        'expiry_date' => 'date',
        'purchase_date' => 'date',
        'unit_price' => 'decimal:2',
    ];
}
