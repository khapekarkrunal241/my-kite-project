@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">About KRK Kite Hub</h1>
                    <p class="lead mb-4">Your Trusted Partner in Premium Kite Manufacturing and Distribution</p>
                    <p class="mb-4">Founded with a passion for flying and a commitment to quality, KRK Kite Hub brings you
                        the finest collection of kites that soar high and dreams that fly higher.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-shopping-bag me-2"></i>Shop Now
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-envelope me-2"></i>Contact Us
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-wind fa-10x text-white-50"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <img src="{{ asset('images/about/kite-flying.jpg') }}" alt="Kite Flying"
                        class="img-fluid rounded shadow-lg"
                    style="height: 400px; object-fit: cover; width: 100%;">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Our Story</h2>
                    <p class="text-muted lead mb-4">
                        KRK Kite Hub was born from a simple childhood passion for kite flying that evolved into a
                        professional venture dedicated to bringing joy to kite enthusiasts across India.
                    </p>
                    <div class="story-points">
                        <div class="d-flex align-items-start mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-rocket text-primary fa-lg mt-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-semibold">From Passion to Profession</h5>
                                <p class="text-muted mb-0">What started as a hobby transformed into a mission to provide
                                    high-quality kites to everyone.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-bullseye text-primary fa-lg mt-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-semibold">Quality First Approach</h5>
                                <p class="text-muted mb-0">We never compromise on quality, ensuring every kite delivers
                                    exceptional flying experience.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-heart text-primary fa-lg mt-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fw-semibold">Customer Satisfaction</h5>
                                <p class="text-muted mb-0">Your happiness is our success. We're committed to making every
                                    customer smile.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="fw-bold display-5 mb-3">Why Choose KRK Kite Hub?</h2>
                    <p class="lead text-muted">We stand out from the crowd with our exceptional quality and service</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-icon bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-star fa-2x text-white"></i>
                        </div>
                        <h5 class="fw-semibold">Premium Quality</h5>
                        <p class="text-muted">Crafted with high-quality materials for durability and excellent flight
                            performance. Every kite is tested before shipping.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-icon bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-truck fa-2x text-white"></i>
                        </div>
                        <h5 class="fw-semibold">Fast Delivery</h5>
                        <p class="text-muted">Quick and reliable shipping across India. We ensure your kites reach you in
                            perfect condition and on time.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-icon bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-rupee-sign fa-2x text-white"></i>
                        </div>
                        <h5 class="fw-semibold">Best Prices</h5>
                        <p class="text-muted">Competitive pricing without compromising on quality. We offer the best value
                            for your money in the market.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-icon bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-headset fa-2x text-white"></i>
                        </div>
                        <h5 class="fw-semibold">Expert Support</h5>
                        <p class="text-muted">Our kite experts are here to help you choose the perfect kite and provide
                            after-sales support.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-icon bg-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt fa-2x text-white"></i>
                        </div>
                        <h5 class="fw-semibold">Quality Assurance</h5>
                        <p class="text-muted">Every kite undergoes rigorous quality checks to ensure it meets our high
                            standards of excellence.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-icon bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="fas fa-award fa-2x text-white"></i>
                        </div>
                        <h5 class="fw-semibold">Trusted Brand</h5>
                        <p class="text-muted">Join thousands of satisfied customers who trust KRK Kite Hub for their kite
                            flying adventures.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h2 class="fw-bold mb-4">Our Values</h2>
                    <div class="values-list">
                        <div class="value-item d-flex align-items-start mb-4">
                            <div class="value-icon bg-primary rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                                style="width: 60px; height: 60px;">
                                <i class="fas fa-handshake fa-lg text-white"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold">Integrity & Trust</h5>
                                <p class="text-muted mb-0">We believe in building long-term relationships based on trust
                                    and transparency with our customers.</p>
                            </div>
                        </div>
                        <div class="value-item d-flex align-items-start mb-4">
                            <div class="value-icon bg-success rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                                style="width: 60px; height: 60px;">
                                <i class="fas fa-lightbulb fa-lg text-white"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold">Innovation</h5>
                                <p class="text-muted mb-0">Constantly innovating to bring you new and exciting kite designs
                                    that enhance your flying experience.</p>
                            </div>
                        </div>
                        <div class="value-item d-flex align-items-start">
                            <div class="value-icon bg-warning rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                                style="width: 60px; height: 60px;">
                                <i class="fas fa-users fa-lg text-white"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold">Community</h5>
                                <p class="text-muted mb-0">We're proud to be part of the vibrant kite-flying community and
                                    support local kite festivals.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <h4 class="mb-0"><i class="fas fa-chart-line me-2"></i>Our Growth Journey</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="growth-stats">
                                <div class="row text-center">
                                    <div class="col-6 mb-4">
                                        <div class="stat-number display-6 fw-bold text-primary">500+</div>
                                        <div class="stat-label text-muted">Happy Customers</div>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="stat-number display-6 fw-bold text-success">50+</div>
                                        <div class="stat-label text-muted">Kite Varieties</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="stat-number display-6 fw-bold text-warning">25+</div>
                                        <div class="stat-label text-muted">Cities Served</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="stat-number display-6 fw-bold text-info">98%</div>
                                        <div class="stat-label text-muted">Satisfaction Rate</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <p class="text-muted mb-0">
                                    <i class="fas fa-quote-left text-primary me-2"></i>
                                    Making skies colorful one kite at a time
                                    <i class="fas fa-quote-right text-primary ms-2"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold mb-3">Ready to Fly High?</h2>
                    <p class="lead mb-4">Join thousands of satisfied customers and experience the joy of flying with KRK
                        Kite Hub</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-wind me-2"></i>Explore Collection
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-comments me-2"></i>Get In Touch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 15px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .value-icon,
        .card-icon {
            transition: transform 0.3s ease;
        }

        .value-item:hover .value-icon,
        .card:hover .card-icon {
            transform: scale(1.1);
        }

        .stat-number {
            font-weight: 700;
        }

        .growth-stats {
            padding: 20px 0;
        }

        .values-list .value-item {
            padding: 15px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .values-list .value-item:hover {
            background-color: #f8f9fa;
        }
    </style>
@endsection
