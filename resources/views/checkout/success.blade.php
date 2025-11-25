@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="card border-0 shadow">
                <div class="card-body py-5">
                    <div class="text-success mb-4">
                        <i class="fas fa-check-circle fa-5x"></i>
                    </div>
                    <h2 class="text-success mb-3">Order Placed Successfully!</h2>
                    <p class="lead mb-4">Thank you for your purchase. Your order has been placed successfully.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a href="{{ route('products.index') }}" class="btn btn-primary me-md-2">
                            <i class="fas fa-shopping-bag"></i> Continue Shopping
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-home"></i> Go to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection