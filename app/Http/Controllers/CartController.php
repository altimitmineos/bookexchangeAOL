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


    $user = auth()->user();
    $cart = $user->cart;  // Ensure the user has a cart

    if (!$cart || $cart->cartItems->isEmpty()) {
        return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
    }

    // Loop through cart items and process each
    foreach ($cart->cartItems as $cartItem) {
        $book = $cartItem->book;
        $quantityPurchased = $cartItem->quantity;

        if ($book->quantity < $quantityPurchased) {
            return redirect()->route('cart.show')->with('error', 'Not enough stock for some items.');
        }

        // Deduct stock for each item
        $book->update(['quantity' => $book->quantity - $quantityPurchased]);
    }

    // Clear cart items after successful checkout
    $cart->cartItems()->delete();

    // Redirect to the cart page with a success message
    return redirect()->route('cart.show')->with('success', 'Checkout successful! Thank you for your purchase.');
    }

}

