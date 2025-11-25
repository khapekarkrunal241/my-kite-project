<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - KRK Kite Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .cart-item-image {
            height: 80px;
            width: 80px;
            object-fit: cover;
            border-radius: 8px;
        }
        .empty-cart {
            padding: 4rem 0;
        }
        .cart-summary {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">KRK Kite Hub</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/products">Products</a>
                <a class="nav-link" href="/cart">Cart</a>
                @auth
                    <a class="nav-link" href="/admin/products">Admin</a>
                    <form method="POST" action="/logout" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                @else
                    <a class="nav-link" href="/login">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <h1 class="mb-4">Shopping Cart</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(empty($cart))
            <div class="empty-cart text-center">
                <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                <h3>Your cart is empty</h3>
                <p class="text-muted mb-4">Add some amazing kites to your cart to continue shopping.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-shopping-bag"></i> Continue Shopping
                </a>
            </div>
        @else
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Cart Items ({{ count($cart) }})</h5>
                        </div>
                        <div class="card-body">
                            @foreach($cart as $id => $item)
                            <div class="row align-items-center mb-4 pb-3 border-bottom">
                                <div class="col-md-2">
                                    @if($item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}" 
                                             alt="{{ $item['name'] }}" 
                                             class="cart-item-image">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center cart-item-image">
                                            <span class="text-muted small">No Image</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <h6 class="mb-1 fw-bold">{{ $item['name'] }}</h6>
                                    <p class="text-muted mb-0">₹{{ number_format($item['price'], 2) }}</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <span class="me-2">Qty:</span>
                                        <span class="badge bg-primary fs-6">{{ $item['quantity'] }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <strong class="text-success">₹{{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
                                </div>
                                <div class="col-md-1">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h5 class="mb-3">Order Summary</h5>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>₹{{ number_format($total, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping:</span>
                            <span class="text-success">FREE</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Tax:</span>
                            <span>₹0.00</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <strong class="fs-5">Total:</strong>
                            <strong class="fs-5 text-primary">₹{{ number_format($total, 2) }}</strong>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-lg">
                                <i class="fas fa-credit-card"></i> Proceed to Checkout
                            </button>
                            
                            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i> Add More Items
                            </a>
                            
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100 mt-2">
                                    <i class="fas fa-trash"></i> Clear Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 KRK Kite Hub. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>