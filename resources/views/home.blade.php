@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Experience the Sky with Premium Kites</h1>
                <p class="lead mb-4">Discover our exclusive collection of high-quality, colorful kites that bring joy to every flight.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('products.index') }}" class="btn btn-light btn-lg px-4 py-2">
                        <i class="fas fa-shopping-bag me-2"></i>Shop Now
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg px-4 py-2">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fas fa-wind fa-10x text-white-50"></i>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col">
                <h2 class="fw-bold">Why Choose KRK Kite Hub?</h2>
                <p class="text-muted">We're passionate about delivering the best flying experience</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-star fa-2x text-white"></i>
                    </div>
                    <h5>Premium Quality</h5>
                    <p class="text-muted">Crafted with high-quality materials for durability and excellent flight performance.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-shipping-fast fa-2x text-white"></i>
                    </div>
                    <h5>Fast Delivery</h5>
                    <p class="text-muted">Quick and reliable shipping across India. Get your kites delivered to your doorstep.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-headset fa-2x text-white"></i>
                    </div>
                    <h5>Expert Support</h5>
                    <p class="text-muted">Our kite experts are here to help you choose the perfect kite for your needs.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <h2 class="fw-bold text-center">Featured Kites</h2>
                <p class="text-muted text-center">Check out our most popular kite collections</p>
            </div>
        </div>
        
        @php
            $featuredProducts = App\Models\Product::take(3)->get();
        @endphp
        
        @if($featuredProducts->count() > 0)
        <div class="row g-4">
            @foreach($featuredProducts as $product)
            <div class="col-lg-4 col-md-6">
                <div class="card product-card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 250px;">
                            <i class="fas fa-wind fa-3x text-white-50"></i>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($product->description, 100) }}</p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="h5 text-primary mb-0">₹{{ $product->price }}</span>
                                <span class="badge bg-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </div>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary w-100">
                                <i class="fas fa-eye me-2"></i>View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-lg">
                View All Products <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-wind fa-4x text-muted mb-3"></i>
            <h4 class="text-muted">No Products Available</h4>
            <p class="text-muted">Products will be added soon. Stay tuned!</p>
        </div>
        @endif
    </div>
</section>
@endsection