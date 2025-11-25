@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="mb-0"><i class="fas fa-sign-in-alt me-2"></i>Welcome Back</h3>
                    <p class="mb-0 mt-2">Sign in to your KRK Kite Hub account</p>
                </div>
                <div class="card-body p-5">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Invalid credentials!</strong> Please check your email and password.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control form-control-lg" 
                                   id="email" name="email" value="{{ old('email') }}" 
                                   placeholder="Enter your email" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control form-control-lg" 
                                   id="password" name="password" 
                                   placeholder="Enter your password" required>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg py-3">
                                <i class="fas fa-sign-in-alt me-2"></i>Sign In
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="mb-0">Don't have an account? 
                                <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">
                                    Create one here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection