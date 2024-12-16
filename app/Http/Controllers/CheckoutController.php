<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user = auth()->user(); // Get the authenticated user
        $cart = $user->cart; // Retrieve the user's cart

        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }

        $cartItems = $cart->cartItems; // Get all items in the cart
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->book->price; // Calculate total price
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function processCheckout(Request $request)
{
    $user = auth()->user(); // Get the authenticated user
    $cart = $user->cart; // Get the cart associated with the user

    if (!$cart || $cart->cartItems->isEmpty()) {
        return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
    }

    // Process the checkout - update stock and clear cart
    foreach ($cart->cartItems as $cartItem) {
        $book = $cartItem->book;
        $quantityPurchased = $cartItem->quantity;

        // Ensure there is enough stock before proceeding
        if ($book->quantity < $quantityPurchased) {
            return redirect()->route('cart.show')->with('error', 'Not enough stock for some items.');
        }

        // Deduct the stock from the books table
        $book->update(['quantity' => $book->quantity - $quantityPurchased]);
    }

    // Clear the cart items after checkout
    $cart->cartItems()->delete(); // Delete all items from the cart

    return redirect()->route('cart.show')->with('success', 'Checkout successful! Thank you for your purchase.');
    }

}
