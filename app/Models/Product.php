<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';


    protected $fillable = [
        'name',
        'category',
        'color',
        'sizes',
        'price',
        'description',
        'image_path'
    ];


    protected $casts = [
        'sizes' => 'array',
        'price' => 'array',
    ];

    public function prices()
    {
        return $this->belongsToMany(Pricing::class, 'price', 'product_id', 'price_id');
    }
}
