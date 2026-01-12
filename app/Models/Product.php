<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Policies\ProductPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;

#[UsePolicy(ProductPolicy::class)]
class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'stock',
        'category'
    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // helper to get formatted price
    public function priceFormatted()
    {
        return number_format($this->price, 0, ',', '.');
    }
}
