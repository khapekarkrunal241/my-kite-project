@extends('layouts.app')

@section('content')
<h1 class="mb-4">Our Kites Collection</h1>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">
            @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                    <span class="text-muted">No Image</span>
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                <p class="card-text">
                    <strong>Price: ₹{{ $product->price }}</strong><br>
                    <small class="text-muted">Stock: {{ $product->stock }}</small>
                </p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@if($products->isEmpty())
<div class="text-center py-5">
    <h3>No products available</h3>
    <p>Please add products from admin panel.</p>
</div>
@endif
@endsection