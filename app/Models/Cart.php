<?php
// app/Models/Cart.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    protected $fillable = ['session_key','user_id'];

    public function items() {
        return $this->hasMany(CartItem::class);
    }

    // total via Collection
    public function total() {
        return $this->items->sum(function($item) {
            return $item->quantity * $item->product->price;
        });
    }
}

