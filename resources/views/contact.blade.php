@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="fw-bold display-5 text-primary">Contact Us</h1>
            <p class="lead text-muted">Get in touch with KRK Kite Hub - We're here to help you!</p>
        </div>
    </div>

    <div class="row">
        <!-- Contact Information -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Our Location</h5>
                </div>
                <div class="card-body">
                    <div class="contact-info">
                        <div class="d-flex align-items-start mb-4">
                            <div class="flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-primary fa-lg mt-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-semibold mb-1">Address</h6>
                                <p class="text-muted mb-0">
                                    Timki Police Chowki<br>
                                    Nagpur, Maharashtra<br>
                                    India - 440001
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <div class="flex-shrink-0">
                                <i class="fas fa-phone text-primary fa-lg mt-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-semibold mb-1">Phone Numbers</h6>
                                <p class="text-muted mb-0">
                                    <a href="tel:+919975003226" class="text-decoration-none">+91 99750 03226</a><br>
                                    <a href="tel:+918308107842" class="text-decoration-none">+91 83081 07842</a>
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <div class="flex-shrink-0">
                                <i class="fas fa-envelope text-primary fa-lg mt-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-semibold mb-1">Email Address</h6>
                                <p class="text-muted mb-0">
                                    <a href="mailto:khapekar1krunal@gmail.com" class="text-decoration-none">
                                        khapekar1krunal@gmail.com
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-clock text-primary fa-lg mt-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-semibold mb-1">Business Hours</h6>
                                <p class="text-muted mb-0">
                                    Monday - Sunday: 9:00 AM - 8:00 PM<br>
                                    <small>We're available 7 days a week!</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enquiry Form -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-paper-plane me-2"></i>Send Enquiry</h5>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" 
                                       placeholder="Enter your full name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="Enter your email address" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone') }}" 
                                       placeholder="Enter your phone number" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="subject" class="form-label fw-semibold">Subject <span class="text-danger">*</span></label>
                                <select class="form-select @error('subject') is-invalid @enderror" 
                                        id="subject" name="subject" required>
                                    <option value="">Select enquiry type</option>
                                    <option value="Product Inquiry" {{ old('subject') == 'Product Inquiry' ? 'selected' : '' }}>Product Inquiry</option>
                                    <option value="Order Support" {{ old('subject') == 'Order Support' ? 'selected' : '' }}>Order Support</option>
                                    <option value="Bulk Order" {{ old('subject') == 'Bulk Order' ? 'selected' : '' }}>Bulk Order</option>
                                    <option value="Shipping Query" {{ old('subject') == 'Shipping Query' ? 'selected' : '' }}>Shipping Query</option>
                                    <option value="Complaint" {{ old('subject') == 'Complaint' ? 'selected' : '' }}>Complaint</option>
                                    <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label fw-semibold">Your Message <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      id="message" name="message" rows="5" 
                                      placeholder="Please describe your enquiry in detail..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('terms') is-invalid @enderror" 
                                       type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-decoration-none">terms and conditions</a> 
                                    and <a href="#" class="text-decoration-none">privacy policy</a>
                                </label>
                                @error('terms')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg py-3">
                                <i class="fas fa-paper-plane me-2"></i>Send Enquiry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-map me-2"></i>Find Us</h5>
                </div>
                <div class="card-body p-0">
                    <div class="map-container" style="height: 300px; background: #f8f9fa;">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="text-center text-muted">
                                <i class="fas fa-map-marker-alt fa-3x mb-3 text-primary"></i>
                                <h5>Timki Police Chowki, Nagpur</h5>
                                <p class="mb-0">Maharashtra, India - 440001</p>
                                <a href="https://maps.google.com/?q=Timki+Police+Chowki,Nagpur" 
                                   target="_blank" 
                                   class="btn btn-primary mt-3">
                                    <i class="fas fa-directions me-2"></i>Open in Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.contact-info .fas {
    width: 20px;
}

.card {
    border-radius: 15px;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.form-control, .form-select {
    border-radius: 8px;
    padding: 12px;
}

.btn {
    border-radius: 8px;
    font-weight: 600;
}

.map-container {
    border-radius: 0 0 15px 15px;
}
</style>
@endsection