@extends('layouts.admin')

@section('title', 'Add Product – E-Dukan')

@section('content')


<style>
    /* Product Management Page Styles */

/* Container and Layout */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Card Styling */
.card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card.shadow {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
}

.card-header {
    padding: 20px 25px;
    border-bottom: 2px solid rgba(255, 255, 255, 0.1);
    font-weight: 600;
}

.card-header.bg-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.card-header.bg-secondary {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
}

.card-header h5 {
    font-size: 1.25rem;
    font-weight: 600;
    margin: 0;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 25px;
    background: #ffffff;
}

/* Form Styling */
.form-label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
    font-size: 0.95rem;
}

.form-control, .form-select {
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    background-color: #ffffff;
}

.form-control:focus, .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    outline: none;
    background-color: #ffffff;
}

.form-control:hover, .form-select:hover {
    border-color: #d1d5db;
}

textarea.form-control {
    resize: vertical;
    min-height: 100px;
}

/* Required field indicator */
.text-danger {
    color: #ef4444 !important;
    font-weight: 600;
}

/* Alert Styling */
.alert {
    border: none;
    border-radius: 10px;
    padding: 16px 20px;
    margin-bottom: 25px;
    font-weight: 500;
}

.alert-success {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #155724;
    border-left: 4px solid #28a745;
}

/* Button Styling */
.btn {
    border-radius: 8px;
    padding: 12px 24px;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-success {
    background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(72, 187, 120, 0.3);
}

.btn-success:hover {
    background: linear-gradient(135deg, #38a169 0%, #2f855a 100%);
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(72, 187, 120, 0.4);
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
}

.btn-danger {
    background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(245, 101, 101, 0.3);
}

.btn-danger:hover {
    background: linear-gradient(135deg, #e53e3e 0%, #c53030 100%);
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(245, 101, 101, 0.4);
}

.btn-sm {
    padding: 8px 16px;
    font-size: 0.85rem;
}

/* Table Styling */
.table {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    margin-bottom: 0;
}

.table thead th {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    color: #374151;
    font-weight: 700;
    padding: 18px 15px;
    border: none;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.table tbody td {
    padding: 15px;
    vertical-align: middle;
    border-color: #f1f5f9;
    font-size: 0.95rem;
}

.table-hover tbody tr:hover {
    background-color: #f8fafc;
    transform: scale(1.01);
    transition: all 0.2s ease;
}

.table tbody tr {
    transition: all 0.2s ease;
}

/* Product Image Styling */
.table img {
    border-radius: 8px;
    object-fit: cover;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.table img:hover {
    transform: scale(1.1);
}

/* Text Alignment */
.text-end {
    text-align: right;
}

/* Margin and Spacing */
.mt-4 {
    margin-top: 2rem;
}

.mb-3 {
    margin-bottom: 1.5rem;
}

.mb-4 {
    margin-bottom: 2rem;
}

.mb-0 {
    margin-bottom: 0;
}

/* Pagination Styling */
.pagination {
    justify-content: center;
    margin-top: 25px;
}

.page-link {
    border: 2px solid #e5e7eb;
    color: #6b7280;
    padding: 10px 16px;
    border-radius: 8px;
    margin: 0 2px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.page-link:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-color: #667eea;
    color: white;
    transform: translateY(-1px);
}

.page-item.active .page-link {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-color: #667eea;
    color: white;
}

/* File Input Styling */
input[type="file"] {
    padding: 10px;
    border: 2px dashed #d1d5db;
    border-radius: 8px;
    background: #f9fafb;
    transition: all 0.3s ease;
}

input[type="file"]:hover {
    border-color: #667eea;
    background: #f0f4ff;
}

/* Form Inline Styling */
form[style*="display:inline-block"] {
    display: inline-block !important;
    margin-left: 5px;
}

/* No Products Message */
.card-body p {
    text-align: center;
    color: #6b7280;
    font-style: italic;
    margin: 40px 0;
    font-size: 1.1rem;
}

/* Icons */
.fas {
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }
    
    .card-body {
        padding: 20px;
    }
    
    .btn {
        padding: 10px 20px;
        font-size: 0.9rem;
    }
    
    .btn-sm {
        padding: 6px 12px;
        font-size: 0.8rem;
    }
    
    .table {
        font-size: 0.85rem;
    }
    
    .table thead th,
    .table tbody td {
        padding: 10px 8px;
    }
    
    .form-control, .form-select {
        padding: 10px 14px;
    }
}

@media (max-width: 576px) {
    .text-end {
        text-align: center;
    }
    
    .table-responsive {
        border-radius: 10px;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .btn-sm {
        width: auto;
        margin-bottom: 5px;
    }
}

/* Loading Animation for Buttons */
.btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

/* Custom Scrollbar */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
}</style>
<div class="container mt-4">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add New Product</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price <span class="text-danger">*</span></label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock <span class="text-danger">*</span></label>
                    <input type="number" name="stock" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Product List -->
    <div class="card shadow">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Product List</h5>
        </div>
        <div class="card-body">
            @if($products->count() > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Visible</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="50" height="50">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->is_visible ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $products->links() }}
            @else
                <p>No products found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
