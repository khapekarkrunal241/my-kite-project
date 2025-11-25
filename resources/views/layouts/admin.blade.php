<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - KRK Kite Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.products.index') }}">
            <img src="{{ asset('images/logo.png') }}" alt="KRK Kite Hub" width="35" height="35" class="me-2">
            <span>Admin Panel</span>
        </a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="{{ route('home') }}">← Back to Site</a>
        </div>
    </div>
</nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>




    <!-- Footer -->
<footer class="bg-dark text-light mt-5 py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('images/logo.png') }}" alt="KRK Kite Hub" width="50" height="50" class="mb-2">
                <h5>KRK Kite Hub</h5>
                <p class="mb-0">Your trusted kite supplier</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-light">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-light">Products</a></li>
                    <li><a href="{{ route('about') }}" class="text-light">About Us</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact Info</h5>
                <p class="mb-0">Email: info@krkkitehub.com</p>
                <p class="mb-0">Phone: +91-XXXXXXXXXX</p>
            </div>
        </div>
        <hr class="my-3">
        <div class="text-center">
            <p class="mb-0">&copy; 2024 KRK Kite Hub. All rights reserved.</p>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>