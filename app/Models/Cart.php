<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id'];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Accessor for total price of all cart items
    public function getTotalPriceAttribute()
    {
        return $this->cartItems->sum(fn($item) => $item->total_price);
    }
}
