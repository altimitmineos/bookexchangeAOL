<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function show()
    {
    $cart = Cart::where('user_id', auth()->id())->first();

    // If the cart exists, return the view with the cart data
    return view('user.cart', compact('cart'));
    }

    public function add(Request $request, Book $book)
    {
        // Get the currently authenticated user


        $user = auth()->user();

        // Check if the user already has a cart or create one if not
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Check if the book is already in the cart
        $cartItem = CartItem::where('cart_id', $cart->id)->where('book_id', $book->id)->first();

        if ($cartItem) {
            // If the book is already in the cart, increase the quantity
            $cartItem->increment('quantity');
        } else {
            // If the book is not in the cart, add it with quantity 1
            CartItem::create([
                'cart_id' => $cart->id,  // Make sure Cart_Id is set
                'book_id' => $book->id,
                'quantity' => 1,  // Default quantity
            ]);
        }

        // Redirect to the cart page with a success message
        return redirect()->route('cart.show')->with('success', 'Book added to cart!');
    }

    public function update(Request $request, CartItem $item)
    {
    // Validate the quantity input
    $request->validate([
        'quantity' => 'required|integer|min:1',  // Ensure quantity is an integer and >= 1
    ]);

    // Get the new quantity from the request
    $newQuantity = $request->input('quantity');

    // Check if the quantity doesn't exceed available stock (optional)
    $availableStock = $item->book->Stock; // assuming 'book' relationship exists in CartItem model
    if ($newQuantity > $availableStock) {
        return redirect()->route('cart.show')->with('error', 'Not enough stock available.');
    }

    // Update the cart item quantity
    $item->update(['quantity' => $newQuantity]);

    // Redirect back with a success message
    return redirect()->route('cart.show')->with('success', 'Cart updated successfully.');
    }


    public function remove(CartItem $cartItem)
    {
    $cartItem->delete();

    return redirect()->route('cart.show')->with('success', 'Item removed from cart.');
    }


    // Process the checkout: Clear cart and adjust stock quantities

    // app/Http/Controllers/CartController.php
    public function processCheckout(Request $request)
{
    // Get authenticated user
    $user = auth()->user();
    if (!$user) {
        return redirect()->route('cart.show')->with('error', 'You need to log in.');
    }

    // Get user's cart
    $cart = Cart::where('user_id', $user->id)->first();

    if (!$cart || $cart->cartItems->isEmpty()) {
        return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
    }

    // Validate cart items and stock
    $cartItems = $cart->cartItems; // Retrieve cart items

    foreach ($cartItems as $cartItem) {
        $book = $cartItem->book;

        if (!$book) {
            return redirect()->route('cart.show')->with('error', 'A book in your cart is missing.');
        }

        $quantityPurchased = $cartItem->quantity;
        $stock = $book->Stock;

        // Debugging
        if (is_null($stock)) {
            dd([
                'cartItem' => $cartItem,
                'book' => $book,
                'stock' => $stock,
                'quantity_purchased' => $quantityPurchased,
            ]);
        }

        // Check stock availability
        if ($quantityPurchased > $stock) {
            return redirect()->route('cart.show')->with('error', "Not enough stock for {$book->title}.");
        }
    }

    // Deduct stock and clear cart
    foreach ($cartItems as $cartItem) {
        $book = $cartItem->book;
        $quantityPurchased = $cartItem->quantity;

        // Deduct stock
        $book->update(['Stock' => $book->Stock - $quantityPurchased]);
    }

    // Clear cart items
    $cart->cartItems()->delete();

    return redirect()->route('cart.show')->with('success', 'Checkout successful!');
}

}
