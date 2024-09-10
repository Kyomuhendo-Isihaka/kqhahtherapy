<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    protected $table = 'pricings';
    protected $fillable = [
        'milliliters',
        'price'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'price', 'price_id', 'product_id');
    }
}
