@extends('layouts.user')

@section('content')
<div class="container">
    <h1>Your Cart</h1>

    @if ($cart && $cart->cartItems->count())
    <div class="cart-container">
        <div class="cart-items">
            <div class="select-all">
                <input type="checkbox" id="select-all"> Pilih Semua
            </div>
            @foreach ($cart->cartItems as $item)
            <div class="cart-item">
                <div class="checkbox">
                    <input type="checkbox" name="selected_items[]" value="{{ $item->id }}">
                </div>
                <div class="book-info">
                    <img src="{{ $item->book->Image ?? 'default-image.jpg' }}" alt="{{ $item->book->Title }}" class="book-image">
                    <div class="details">
                        <p class="book-title">{{ $item->book->Title }}</p>
                        <p class="book-price">Rp{{ number_format($item->book->Cost, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="quantity-controls">
                    <form method="POST" action="{{ route('cart.update', $item) }}" class="quantity-form">
                        @csrf
                        @method('PATCH')
                        <!-- Decrease Button -->
                        <button type="submit" name="action" value="decrease" class="btn-decrease">-</button>
                        <!-- Current Quantity -->
                        <span class="quantity">{{ $item->quantity }}</span>
                        <!-- Increase Button -->
                        <button type="submit" name="action" value="increase" class="btn-increase">+</button>
                    </form>
                </div>
                <div class="remove-item">
                    <form method="POST" action="{{ route('cart.remove', $item) }}">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-primary">
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

        <div class="order-summary">
            <h2>Order Summary</h2>
            <p><strong>Total: Rp{{ number_format($cart->total_price, 0, ',', '.') }}</strong></p>
            <form method="POST" action="{{ route('cart.processCheckout') }}">
                @csrf
                <button type="submit" class="btn-checkout">Check Out</button>
            </form>
        </div>
    </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
