@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Products Management</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New Product</a>
</div>

@if($products->count() > 0)
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="50" height="50" style="object-fit: cover;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>₹{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="alert alert-info text-center">
    <h4>No Products Found</h4>
    <p>Start by adding your first product!</p>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add First Product</a>
</div>
@endif
@endsection