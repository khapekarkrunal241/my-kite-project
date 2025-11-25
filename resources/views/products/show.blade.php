@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-lg-6 mb-4">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="img-fluid rounded shadow-sm"
                     style="width: 100%; height: 400px; object-fit: contain; background: #f8f9fa;">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                     style="height: 400px;">
                    <div class="text-center text-muted">
                        <i class="fas fa-wind fa-5x mb-3"></i>
                        <p>No Image Available</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Product Details -->
        <div class="col-lg-6">
            <h1 class="h2 fw-bold text-dark mb-3">{{ $product->name }}</h1>
            
            <div class="d-flex align-items-center mb-3">
                <span class="h3 text-primary fw-bold me-3">₹{{ $product->price }}</span>
                <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }} fs-6">
                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                </span>
            </div>

            <!-- Product Description -->
            <div class="mb-4">
                <p class="text-muted lead">{{ $product->description ?? 'No description available.' }}</p>
            </div>

            <!-- Stock Info -->
            <div class="mb-4">
                <p class="mb-1">
                    <i class="fas fa-box me-2 text-primary"></i>
                    <strong>Available:</strong> {{ $product->stock }} units
                </p>
            </div>

            @if($product->stock > 0)
            <!-- Quantity Selector -->
            <div class="mb-4">
                <form method="POST" action="{{ route('products.addToCart', $product->id) }}">
                    @csrf
                    
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <label class="form-label fw-semibold">Quantity:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group" style="width: 140px;">
                                <button type="button" class="btn btn-outline-secondary" onclick="decreaseQty()">-</button>
                                <input type="number" name="quantity" id="quantityInput" 
                                       class="form-control text-center" 
                                       value="1" min="1" max="{{ $product->stock }}">
                                <button type="button" class="btn btn-outline-secondary" onclick="increaseQty()">+</button>
                            </div>
                        </div>
                        <div class="col-auto">
                            <small class="text-muted">Max: {{ $product->stock }}</small>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-success btn-lg flex-fill" name="action" value="buy_now">
                                    <i class="fas fa-bolt me-2"></i>Buy Now
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg flex-fill" name="action" value="add_to_cart">
                                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-circle me-2"></i>
                This product is currently out of stock.
            </div>
            @endif

            <!-- Back Button -->
            <div class="mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Products
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function increaseQty() {
    const input = document.getElementById('quantityInput');
    const max = parseInt(input.max);
    let current = parseInt(input.value);
    
    if (current < max) {
        input.value = current + 1;
    }
}

function decreaseQty() {
    const input = document.getElementById('quantityInput');
    let current = parseInt(input.value);
    
    if (current > 1) {
        input.value = current - 1;
    }
}

// Validate quantity
document.getElementById('quantityInput').addEventListener('change', function() {
    const max = parseInt(this.max);
    let current = parseInt(this.value);
    
    if (current > max) {
        this.value = max;
        alert(`Maximum available quantity is ${max}`);
    } else if (current < 1) {
        this.value = 1;
    }
});
</script>
@endsection