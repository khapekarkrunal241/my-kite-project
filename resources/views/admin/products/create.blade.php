@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>Add New Product</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name *</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price (₹) *</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock Quantity *</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
                                @error('stock')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Supported formats: JPEG, PNG, JPG, GIF. Max size: 2MB</div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Add Product</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection