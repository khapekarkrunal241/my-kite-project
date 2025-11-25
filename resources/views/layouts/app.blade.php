<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRK Kite Hub - Premium Kites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c5aa0;
            --secondary-color: #f8f9fa;
            --accent-color: #ff6b35;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }

        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #1e4a8a;
            border-color: #1e4a8a;
        }

        .search-form {
            min-width: 300px;
        }

        .logo-img {
            transition: transform 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .logo-img:hover {
            transform: scale(1.08);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .logo-icon {
            box-shadow: 0 4px 15px rgba(44, 90, 160, 0.3);
            transition: all 0.3s ease;
        }

        .logo-icon:hover {
            transform: scale(1.08);
            box-shadow: 0 6px 20px rgba(44, 90, 160, 0.4);
        }

        @media (max-width: 768px) {
            .search-form {
                min-width: 200px;
                margin: 10px 0;
            }

            .navbar-brand img {
                width: 50px !important;
                height: 50px !important;
            }

            .logo-icon {
                width: 50px !important;
                height: 50px !important;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand img {
                width: 45px !important;
                height: 45px !important;
            }

            .logo-icon {
                width: 45px !important;
                height: 45px !important;
            }
        }
    </style>
</head>

<body>
    <!-- Enhanced Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <!-- Logo Section - Large Size -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <!-- Logo Image - Large -->
                <img src="{{ asset('images/logo.png') }}" alt="KRK Kite Hub" width="75" height="75"
                    class="me-3 logo-img" style="object-fit: contain; border-radius: 12px;"
                    onerror="this.style.display='none'; document.getElementById('logo-fallback').style.display='flex';">

                <!-- Fallback Logo -->
                <div id="logo-fallback" class="d-none align-items-center">
                    <div class="logo-icon bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width: 75px; height: 75px;">
                        <i class="fas fa-wind text-white fa-2x"></i>
                    </div>
                    <div>
                        <span class="fw-bold text-dark fs-3">KRK Kite Hub</span>
                        <small class="text-muted d-block" style="font-size: 0.8rem; margin-top: -2px;">Premium Kites
                            Collection</small>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

                <!-- Search Form -->
                <form action="{{ route('products.search') }}" method="GET" class="d-flex search-form me-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search kites..."
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <ul class="navbar-nav">
                   <li class="nav-item">
    <a class="nav-link position-relative" href="{{ route('cart') }}">
        <i class="fas fa-shopping-cart fa-lg"></i>
        @php
            $cartCount = 0;
            $cart = session('cart', []);
            foreach($cart as $item) {
                $cartCount += $item['quantity'];
            }
        @endphp
        @if($cartCount > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $cartCount }}
                <span class="visually-hidden">items in cart</span>
            </span>
        @endif
    </a>
</li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i>
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.products.index') }}">
                                        <i class="fas fa-cog me-2"></i>Admin Panel
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary ms-2" href="{{ route('register') }}">Sign Up</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>



    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Enhanced Footer -->
    <footer class="bg-dark text-light pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">
                        <img src="{{ asset('images/logo.png') }}" alt="KRK Kite Hub" width="40" height="40"
                            class="me-2 rounded" style="object-fit: contain;" onerror="this.style.display='none'">
                        <i class="fas fa-wind me-2"></i>KRK Kite Hub
                    </h5>
                    <p class="text-light">Your premier destination for high-quality, colorful kites. Experience the joy
                        of flying with our premium collection.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3" title="Facebook">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a href="#" class="text-light me-3" title="Instagram">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="#" class="text-light me-3" title="Twitter">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="#" class="text-light me-3" title="YouTube">
                            <i class="fab fa-youtube fa-lg"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 mb-4">
                    <h6 class="fw-bold mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="{{ route('home') }}" class="text-light text-decoration-none">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('products.index') }}" class="text-light text-decoration-none">
                                <i class="fas fa-wind me-1"></i> Products
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('about') }}" class="text-light text-decoration-none">
                                <i class="fas fa-info-circle me-1"></i> About Us
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('contact') }}" class="text-light text-decoration-none">
                                <i class="fas fa-envelope me-1"></i> Contact
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 mb-4">
                    <h6 class="fw-bold mb-3">Customer Service</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="#" class="text-light text-decoration-none">
                                <i class="fas fa-shipping-fast me-1"></i> Shipping Info
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-light text-decoration-none">
                                <i class="fas fa-exchange-alt me-1"></i> Returns & Exchange
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-light text-decoration-none">
                                <i class="fas fa-question-circle me-1"></i> FAQs
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-light text-decoration-none">
                                <i class="fas fa-shield-alt me-1"></i> Privacy Policy
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 mb-4">
                    <h6 class="fw-bold mb-3">Contact Info</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2 text-primary"></i>
                            <a href="mailto:info@krkkitehub.com" class="text-light text-decoration-none">
                                khapekar1krunal@gmail.com
                            </a>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone me-2 text-primary"></i>
                            <a href="tel:+911234567890" class="text-light text-decoration-none">
                                +91-9975003226 , 8308107842
                            </a>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                            <span>Nagpur,Maharashtra,India</span>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-clock me-2 text-primary"></i>
                            <span>Mon-Sun: 9AM - 8PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-4 bg-light">

            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-light">
                        &copy; 2025 <strong>KRK Kite Hub</strong>. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="payment-methods">
                        <small class="text-light me-2">We Accept:</small>
                        <span class="badge bg-success me-1">UPI</span>
                        <span class="badge bg-primary me-1">Cards</span>
                        <span class="badge bg-warning me-1">Net Banking</span>
                        <span class="badge bg-info">Wallet</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Simple search enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="search"]');
            const searchForm = document.querySelector('form[action*="search"]');

            // Clear search when clicking on products link
            document.querySelectorAll('a[href*="products"]').forEach(link => {
                if (!link.href.includes('search')) {
                    link.addEventListener('click', function() {
                        if (searchInput) searchInput.value = '';
                    });
                }
            });

            // Search form validation
            if (searchForm) {
                searchForm.addEventListener('submit', function(e) {
                    if (searchInput.value.trim() === '') {
                        e.preventDefault();
                        searchInput.focus();
                    }
                });
            }

            // Logo fallback handling
            const logoImg = document.querySelector('.navbar-brand img');
            const logoFallback = document.getElementById('logo-fallback');

            if (logoImg) {
                logoImg.addEventListener('error', function() {
                    this.style.display = 'none';
                    if (logoFallback) {
                        logoFallback.style.display = 'flex';
                    }
                });

                // Check if image loaded successfully
                if (logoImg.complete && logoImg.naturalHeight === 0) {
                    logoImg.style.display = 'none';
                    if (logoFallback) {
                        logoFallback.style.display = 'flex';
                    }
                }
            }
        });
    </script>
</body>

</html>
