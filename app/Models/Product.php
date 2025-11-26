<?php
// app/Models/Product.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = ['name','description','image','price','stock','category'];

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    // helper to get formatted price
    public function priceFormatted() {
        return number_format($this->price, 0, ',', '.');
    }
}
