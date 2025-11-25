@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="fw-bold">Shopping Cart</h1>
                @if(!empty($cart))
                    <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger btn-sm" 
                       onclick="return confirm('Are you sure you want to clear your entire cart?')">
                        <i class="fas fa-trash me-1"></i>Clear Cart
                    </a>
                @endif
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @php
                $cart = session('cart', []);
                $total = 0;
                $itemCount = 0;
                
                if(!empty($cart)) {
                    foreach($cart as $item) {
                        $total += $item['price'] * $item['quantity'];
                        $itemCount += $item['quantity'];
                    }
                }
            @endphp

            @if(empty($cart))
            <!-- Empty Cart -->
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-shopping-cart fa-4x text-muted mb-4"></i>
                    <h3 class="text-muted mb-3">Your cart is empty</h3>
                    <p class="text-muted mb-4">Start shopping to add items to your cart!</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-shopping-bag me-2"></i>Browse Products
                    </a>
                </div>
            </div>
            @else
            <!-- Cart Items -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">
                                <i class="fas fa-shopping-cart me-2"></i>
                                Your Cart Items ({{ count($cart) }})
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @foreach($cart as $id => $item)
                            <div class="cart-item border-bottom p-4">
                                <div class="row align-items-center">
                                    <!-- Product Image -->
                                    <div class="col-md-2 col-4">
                                        @if($item['image'])
                                            <img src="{{ asset('storage/' . $item['image']) }}" 
                                                 alt="{{ $item['name'] }}" 
                                                 class="img-fluid rounded shadow-sm"
                                                 style="height: 80px; object-fit: contain; background: #f8f9fa;">
                                        @else
                                            <div class="bg-light rounded shadow-sm d-flex align-items-center justify-content-center" 
                                                 style="height: 80px;">
                                                <i class="fas fa-wind text-muted fa-2x"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Product Details -->
                                    <div class="col-md-4 col-8">
                                        <h6 class="fw-semibold mb-1 text-dark">{{ $item['name'] }}</h6>
                                        <p class="text-primary fw-bold mb-1">₹{{ $item['price'] }}</p>
                                        <p class="text-muted small mb-0">
                                            <i class="fas fa-layer-group me-1"></i>Quantity: {{ $item['quantity'] }}
                                        </p>
                                    </div>

                                    <!-- Item Total -->
                                    <div class="col-md-3 col-6">
                                        <p class="fw-semibold text-dark mb-0">
                                            Item Total: ₹{{ $item['price'] * $item['quantity'] }}
                                        </p>
                                    </div>

                                    <!-- Remove Button -->
                                    <div class="col-md-3 col-6 text-end">
                                        <a href="{{ route('cart.remove', $id) }}" 
                                           class="btn btn-outline-danger btn-sm"
                                           onclick="return confirm('Are you sure you want to remove this item from cart?')">
                                            <i class="fas fa-trash me-1"></i>Remove
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-receipt me-2"></i>Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <!-- Cart Totals -->
                            <div class="mb-4">
                                @php
                                    $shipping = $total > 0 ? 40 : 0;
                                    $grandTotal = $total + $shipping;
                                @endphp

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Items ({{ $itemCount }}):</span>
                                    <span class="fw-semibold">₹{{ $total }}</span>
                                </div>
                                
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Shipping:</span>
                                    <span class="fw-semibold">₹{{ $shipping }}</span>
                                </div>
                                
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Tax (GST):</span>
                                    <span class="fw-semibold">₹0</span>
                                </div>
                                
                                <hr>
                                
                                <div class="d-flex justify-content-between mb-3">
                                    <strong class="fs-5">Grand Total:</strong>
                                    <strong class="fs-5 text-primary">₹{{ $grandTotal }}</strong>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-grid gap-3">
                                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                                </a>
                                
                                @if($total > 0)
                                <button class="btn btn-success btn-lg py-3" onclick="proceedToCheckout()">
                                    <i class="fas fa-lock me-2"></i>Proceed to Checkout
                                </button>
                                @endif
                            </div>

                            <!-- Trust Badges -->
                            <div class="mt-4 text-center">
                                <div class="row g-2">
                                    <div class="col-4">
                                        <div class="border rounded p-2">
                                            <i class="fas fa-shield-alt text-success d-block mb-1"></i>
                                            <small class="d-block">Secure</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border rounded p-2">
                                            <i class="fas fa-truck text-success d-block mb-1"></i>
                                            <small class="d-block">Free Shipping</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border rounded p-2">
                                            <i class="fas fa-undo text-success d-block mb-1"></i>
                                            <small class="d-block">Easy Return</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.cart-item {
    transition: background-color 0.2s ease;
}

.cart-item:hover {
    background-color: #f8f9fa;
}

.card {
    border-radius: 15px;
}

.btn {
    border-radius: 8px;
}
</style>

<script>
function proceedToCheckout() {
    // For now, show success message
    alert('🎉 Order placed successfully! Thank you for shopping with KRK Kite Hub.\n\nWe will contact you shortly for payment and delivery details.');
    
    // In future, integrate with payment gateway
    // window.location.href = "{{-- route('checkout') --}}";
}
</script>
@endsection