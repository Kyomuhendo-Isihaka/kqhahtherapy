<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "cart";
    protected $fillable = [
        'user_id',
        'cart_status',
        'products',
        'no_of_items',
        'unit_price',
        'total_cost',
    ];
}
