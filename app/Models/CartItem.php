<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'book_id', 'quantity'];

    // Relationship to the Book model
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');  // Ensure 'book_id' is used
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Accessor for the total price of this cart item
    public function getTotalPriceAttribute()
    {
        return $this->book->Cost * $this->quantity;
    }
}
