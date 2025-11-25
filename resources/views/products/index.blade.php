{{-- @extends('layouts.app')

@section('content')
<div class="kite-collection">
    <div class="container">
        <div class="collection-header">
            <h1>Our Kites Collection</h1>
            <p>Discover beautifully crafted kites for all ages and skill levels</p>
        </div>

        <!-- Display Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($products->isEmpty())
        <div class="empty-state">
            <h3>No products available</h3>
            <p>Please add products from admin panel.</p>
        </div>
        @else
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="kite-card">
                    @if($product->image)
                        <div class="kite-image-container">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 class="kite-image" 
                                 alt="{{ $product->name }}"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="no-image-placeholder" style="display: none;">
                                <span>Image not available</span>
                            </div>
                        </div>
                    @else
                        <div class="no-image-placeholder">
                            <span>No Image Available</span>
                        </div>
                    @endif
                    
                    <div class="kite-card-body">
                        <h5 class="kite-title">{{ $product->name }}</h5>
                        <p class="kite-description">{{ Str::limit($product->description, 100) }}</p>
                        
                        <div class="mt-auto">
                            <p class="kite-price">₹{{ number_format($product->price, 2) }}</p>
                            <p class="kite-stock">
                                @if($product->stock > 0)
                                    <span class="text-success">In Stock: {{ $product->stock }}</span>
                                @else
                                    <span class="text-danger">Out of Stock</span>
                                @endif
                            </p>
                            
                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                @if($product->stock > 0)
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline w-100">
                                        @csrf
                                        <div class="quantity-selector mb-2">
                                            <label for="quantity-{{ $product->id }}">Qty:</label>
                                            <select name="quantity" id="quantity-{{ $product->id }}" class="quantity-select">
                                                @for($i = 1; $i <= min(5, $product->stock); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <button type="submit" class="btn buy-now-btn w-100">
                                            <i class="fas fa-shopping-cart"></i> Buy Now
                                        </button>
                                    </form>
                                @else
                                    <button class="btn out-of-stock-btn w-100" disabled>
                                        <i class="fas fa-times-circle"></i> Out of Stock
                                    </button>
                                @endif
                                
                                <a href="{{ route('products.show', $product->id) }}" class="btn view-details-btn w-100 mt-2">
                                    <i class="fas fa-info-circle"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

<style>
/* Custom Styles for Kite Collection */
.kite-collection {
    padding: 2rem 0;
    background-color: #f8f9fa;
}

.collection-header {
    text-align: center;
    margin-bottom: 3rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #e9ecef;
}

.collection-header h1 {
    color: #2c3e50;
    font-weight: 700;
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.collection-header p {
    color: #6c757d;
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
}

/* Product Card Styles */
.kite-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    height: 100%;
    background: white;
}

.kite-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.kite-image-container {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.kite-image {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.kite-card:hover .kite-image {
    transform: scale(1.05);
}

.no-image-placeholder {
    width: 100%;
    height: 280px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
}

.kite-card-body {
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    height: calc(100% - 280px);
}

.kite-title {
    color: #2c3e50;
    font-weight: 700;
    font-size: 1.3rem;
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

.kite-description {
    color: #6c757d;
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 1rem;
    flex-grow: 1;
}

.kite-price {
    color: #e74c3c;
    font-weight: 700;
    font-size: 1.4rem;
    margin-bottom: 0.5rem;
}

.kite-stock {
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
}

/* Action Buttons */
.action-buttons {
    margin-top: 1rem;
}

.quantity-selector {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
    justify-content: center;
}

.quantity-selector label {
    font-weight: 600;
    color: #2c3e50;
    font-size: 0.9rem;
    margin-bottom: 0;
}

.quantity-select {
    padding: 4px 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: white;
    width: 70px;
}

.buy-now-btn {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
    border: none;
    padding: 10px;
    border-radius: 6px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: block;
}

.buy-now-btn:hover {
    background: linear-gradient(135deg, #c0392b, #e74c3c);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
    color: white;
}

.view-details-btn {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
    border: none;
    padding: 10px;
    border-radius: 6px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: block;
}

.view-details-btn:hover {
    background: linear-gradient(135deg, #2980b9, #3498db);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
    color: white;
}

.out-of-stock-btn {
    background: linear-gradient(135deg, #95a5a6, #7f8c8d);
    color: white;
    cursor: not-allowed;
    opacity: 0.7;
    border: none;
    padding: 10px;
    border-radius: 6px;
    font-weight: 600;
}

/* Empty State */
.empty-state {
    padding: 4rem 2rem;
    text-align: center;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.empty-state h3 {
    color: #2c3e50;
    margin-bottom: 1rem;
    font-weight: 600;
}

.empty-state p {
    color: #6c757d;
    font-size: 1.1rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .collection-header h1 {
        font-size: 2rem;
    }
    
    .kite-image,
    .no-image-placeholder {
        height: 220px;
    }
    
    .kite-card-body {
        height: calc(100% - 220px);
        padding: 1rem;
    }
}

@media (max-width: 576px) {
    .kite-collection {
        padding: 1rem 0;
    }
    
    .collection-header {
        margin-bottom: 2rem;
    }
    
    .kite-image,
    .no-image-placeholder {
        height: 200px;
    }
    
    .action-buttons {
        margin-top: 0.5rem;
    }
    
    .quantity-selector {
        margin-bottom: 8px;
    }
}
</style>
@endsection --}}



@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-12">
            @if(isset($search) && $search)
                <h1 class="fw-bold">Search Results for "{{ $search }}"</h1>
                <p class="text-muted lead">{{ $products->count() }} products found</p>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to All Products
                </a>
            @else
                <h1 class="fw-bold display-5">Our Premium Kites Collection</h1>
                <p class="text-muted lead">Discover the perfect kite for your next adventure</p>
            @endif
        </div>
    </div>

    <!-- Products Grid -->
    @if($products->count() > 0)
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card product-card h-100 border-0 shadow-sm">
                <!-- Product Image -->
                <div class="product-image-wrapper position-relative">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top" 
                             alt="{{ $product->name }}"
                             style="height: 250px; object-fit: contain; background: #f8f9fa; padding: 15px;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                             style="height: 250px;">
                            <i class="fas fa-wind fa-4x text-muted"></i>
                        </div>
                    @endif
                    
                    <!-- Stock Badge -->
                    <div class="position-absolute top-0 end-0 m-2">
                        <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                        </span>
                    </div>
                </div>

                <div class="card-body d-flex flex-column">
                    <!-- Product Info -->
                    <h5 class="card-title fw-semibold">{{ $product->name }}</h5>
                    <p class="card-text text-muted small flex-grow-1">
                        {{ Str::limit($product->description, 80) }}
                    </p>
                    
                    <!-- Price & Actions -->
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="h5 text-primary fw-bold mb-0">₹{{ $product->price }}</span>
                            <small class="text-muted">Stock: {{ $product->stock }}</small>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            @if($product->stock > 0)
                                <form method="POST" action="{{ route('products.addToCart', $product->id) }}" class="d-grid">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-success btn-sm" name="action" value="buy_now">
                                        <i class="fas fa-bolt me-1"></i>Buy Now
                                    </button>
                                </form>
                            @endif
                            
                            <div class="d-flex gap-2">
                                <a href="{{ route('products.show', $product->id) }}" 
                                   class="btn btn-outline-primary btn-sm flex-fill">
                                    <i class="fas fa-eye me-1"></i>Details
                                </a>
                                
                                @if($product->stock > 0)
                                <form method="POST" action="{{ route('products.addToCart', $product->id) }}" class="flex-fill">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-primary btn-sm w-100" name="action" value="add_to_cart">
                                        <i class="fas fa-cart-plus me-1"></i>Cart
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <!-- No Products Message -->
    <div class="text-center py-5">
        <i class="fas fa-search fa-4x text-muted mb-3"></i>
        <h4 class="text-muted">
            @if(isset($search) && $search)
                No products found for "{{ $search }}"
            @else
                No Products Available
            @endif
        </h4>
        <p class="text-muted">
            @if(isset($search) && $search)
                Try different keywords or browse all products.
            @else
                Products will be added soon. Stay tuned!
            @endif
        </p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Browse All Products</a>
    </div>
    @endif
</div>

<style>
.product-card {
    transition: all 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}

.product-image-wrapper img {
    transition: transform 0.3s ease;
}

.product-card:hover .product-image-wrapper img {
    transform: scale(1.05);
}

.btn-success {
    background: linear-gradient(135deg, #28a745, #20c997);
    border: none;
}

.btn-success:hover {
    background: linear-gradient(135deg, #218838, #1e9e8a);
    transform: translateY(-1px);
}
</style>
@endsection