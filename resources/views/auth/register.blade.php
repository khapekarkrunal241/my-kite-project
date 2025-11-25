@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="mb-0"><i class="fas fa-user-plus me-2"></i>Create Your Account</h3>
                    <p class="mb-0 mt-2">Join KRK Kite Hub today!</p>
                </div>
                <div class="card-body p-5">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Please fix the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" 
                                   placeholder="Enter your full name" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" 
                                   placeholder="Enter your email address" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   id="password" name="password" 
                                   placeholder="Create a password (min. 8 characters)" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-lg" 
                                   id="password_confirmation" name="password_confirmation" 
                                   placeholder="Confirm your password" required>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg py-3">
                                <i class="fas fa-user-plus me-2"></i>Create Account
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="mb-0">Already have an account? 
                                <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">
                                    Sign In here
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