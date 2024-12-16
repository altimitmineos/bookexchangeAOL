<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

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
    $item->load('book');


    $request->validate([
        'action' => 'required|string|in:increase,decrease',
    ]);

    $currentQuantity = $item->quantity;
    $availableStock = $item->book->stock;

    if ($request->action === 'increase') {
        $newQuantity = $currentQuantity + 1;
    } elseif ($request->action === 'decrease') {
        $newQuantity = $currentQuantity - 1;
    }

    if ($newQuantity < 1) {
        return redirect()->route('cart.show')->with('error', 'Quantity cannot be less than 1.');
    }

    if ($newQuantity > $availableStock) {
        return redirect()->route('cart.show')->with('error', 'Not enough stock available.');
    }

    $item->quantity = $newQuantity;
    $item->save();

    return redirect()->route('cart.show')->with('success', 'Cart updated successfully.');
}


    public function remove(CartItem $cartItem)
    {
    $cartItem->delete();

    return redirect()->route('cart.show')->with('success', 'Item removed from cart.');
    }

    public function checkout()
    {
        $user = auth()->user(); // Get the authenticated user
        $cart = Cart::where('user_id', $user->id)->first(); // Fetch the user's cart

        // Check if the cart exists and is not empty
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty!');
        }

        // Calculate total price for the cart
        $total = $cart->items->sum(function ($item) {
            return $item->book->price * $item->quantity;
        });

        return view('checkout', compact('cart', 'total')); // Show the checkout page
    }

    // Process the checkout: Clear cart and adjust stock quantities
    public function processCheckout(Request $request)
    {
        $user = auth()->user(); // Get the authenticated user
        $cart = Cart::where('user_id', $user->id)->first(); // Fetch the user's cart

        // If the cart is empty, redirect
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty!');
        }

        // Loop through cart items and update stock for each book
        foreach ($cart->items as $cartItem) {
            $book = $cartItem->book; // Get the associated book

            // Ensure there is a valid quantity and stock before updating
            if ($cartItem->quantity && $cartItem->quantity > 0) {
                // Check if there is enough stock
                if ($book->stock >= $cartItem->quantity) {
                    // Subtract the quantity from the book stock
                    $book->stock -= $cartItem->quantity;
                    $book->save();
                } else {
                    // If not enough stock, return an error
                    return redirect()->route('cart.show')->with('error', 'Not enough stock for "' . $book->title . '"!');
                }
            } else {
                // If quantity is invalid or null, return an error
                return redirect()->route('cart.show')->with('error', 'Invalid quantity for item "' . $book->title . '"!');
            }
        }

        // Clear the cart after checkout
        $cart->items()->delete();

        // Redirect with success message
        return redirect()->route('cart.show')->with('success', 'Your order has been placed and your cart is cleared!');
    }
}
