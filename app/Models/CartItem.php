<?php
// app/Models/CartItem.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model {
    protected $fillable = ['cart_id','product_id','quantity','uploaded_image'];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function subtotal() {
        return $this->quantity * $this->product->price;
    }
}
