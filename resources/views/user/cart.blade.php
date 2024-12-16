@extends('layouts.user')

@section('content')
<style>
    /* General Styling */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .child-container {
        max-width: 1100px;
        margin: 30px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .child-title {
        font-size: 1.8rem;
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
    }

    /* Cart Layout */
    .child-cart-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }

    .child-cart-items {
        flex: 2;
    }

    .child-cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding: 20px 0;
    }

    .child-book-info {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .child-book-image {
        width: 80px;
        height: 120px;
        object-fit: cover;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .child-details {
        display: flex;
        flex-direction: column;
    }

    .child-book-title {
        font-weight: bold;
        font-size: 1rem;
        margin: 0;
    }

    .child-book-price {
        color: #28a745;
        font-size: 1rem;
        margin-top: 5px;
    }

    /* Quantity Controls */
    .child-quantity-controls input {
        width: 60px;
        text-align: center;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 10px;
    }

    .child-quantity-form .child-button {
        background-color: #6c757d;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }

    .child-quantity-form .child-button:hover {
        background-color: #5a6268;
    }

    /* Remove Button */
    .child-btn-primary {
        background: #dc3545;
        border: none;
        padding: 5px 10px;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }

    .child-btn-primary:hover {
        background: #bd2130;
    }

    /* Order Summary */
    .child-order-summary {
        flex: 1;
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .child-order-summary h2 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .child-order-summary p {
        font-size: 1rem;
        margin-bottom: 20px;
        color: #333;
    }

    .child-order-summary button {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    .child-order-summary button:hover {
        background-color: #218838;
    }
</style>

<div class="child-container">
    <h1 class="child-title">Your Cart</h1>

    @if ($cart && $cart->cartItems->count())
    <div class="child-cart-container">
        <!-- Cart Items -->
        <div class="child-cart-items">
            @foreach ($cart->cartItems as $item)
            <div class="child-cart-item">
                <div class="child-book-info">
                    <img src="{{ $item->book->Image ?? 'default-image.jpg' }}" alt="{{ $item->book->Title }}" class="child-book-image">
                    <div class="child-details">
                        <p class="child-book-title">{{ $item->book->Title }}</p>
                        <p class="child-book-price">Rp{{ number_format($item->book->Cost, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="child-quantity-controls">
                    <form method="POST" action="{{ route('cart.update', $item->id) }}" class="child-quantity-form">
                        @csrf
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="child-qtyInput">
                        <button type="submit" name="action" class="child-button">Update</button>
                    </form>
                </div>
                <div class="child-remove-item">
                    <form method="POST" action="{{ route('cart.remove', $item) }}">
                        @csrf @method('DELETE')
                        <button type="submit" class="child-btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Order Summary -->
        <div class="child-order-summary">
            <h2>Order Summary</h2>
            <p><strong>Total: Rp{{ number_format($cart->total_price, 0, ',', '.') }}</strong></p>
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit">Checkout</button>
            </form>
        </div>
    </div>
    @else
    <p>Your cart is empty.</p>
    @endif
</div>
@endsection
