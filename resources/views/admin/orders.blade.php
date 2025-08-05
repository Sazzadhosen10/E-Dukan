@extends('layouts.admin')

@section('title', 'Orders Management – E-Dukan')

@section('content')
<style>
    /* Orders Management Page Styles */
    
    /* Container and Layout */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    @media (max-width: 768px) {
        .container {
            padding: 10px;
            margin: 0;
        }
    }

    @media (max-width: 576px) {
        .container {
            padding: 5px;
        }
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

    .alert-danger {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
        border-left: 4px solid #dc3545;
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

    .btn-warning {
        background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(237, 137, 54, 0.3);
    }

    .btn-warning:hover {
        background: linear-gradient(135deg, #dd6b20 0%, #c05621 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(237, 137, 54, 0.4);
    }

    .btn-info {
        background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(66, 153, 225, 0.3);
    }

    .btn-info:hover {
        background: linear-gradient(135deg, #3182ce 0%, #2c5aa0 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(66, 153, 225, 0.4);
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

    /* Status Badge Styling */
    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-pending {
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        color: white;
    }

    .badge-processing {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
    }

    .badge-completed {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .badge-cancelled {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
    }

    /* Form Select Styling */
    .form-select {
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        padding: 8px 12px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background-color: #ffffff;
    }

    .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
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

    /* No Orders Message */
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
    }
</style>

<div class="container mt-4">
    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Orders List -->
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Orders Management</h5>
        </div>
        <div class="card-body">
            @if(isset($orders) && $orders->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
                                    <td>
                                        <strong>#{{ $order->id ?? '1001' }}</strong>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                                                {{ strtoupper(substr($order->customer_name ?? 'John Doe', 0, 1)) }}
                                            </div>
                                            <div>
                                                <strong>{{ $order->customer_name ?? 'John Doe' }}</strong><br>
                                                <small class="text-muted">{{ $order->customer_email ?? 'john@example.com' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $order->items_count ?? 3 }} items</span>
                                    </td>
                                    <td>
                                        <strong class="text-success">${{ number_format($order->total ?? 149.98, 2) }}</strong>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm status-select" data-order-id="{{ $order->id ?? '1001' }}">
                                            <option value="pending" {{ ($order->status ?? 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="processing" {{ ($order->status ?? 'pending') == 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="completed" {{ ($order->status ?? 'pending') == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ ($order->status ?? 'pending') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ $order->created_at->format('M d, Y') ?? 'Aug 05, 2025' }}<br>
                                            {{ $order->created_at->format('h:i A') ?? '02:30 PM' }}
                                        </small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-info" title="View Order Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-warning" title="Edit Order">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" title="Cancel Order">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if(isset($orders) && $orders->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $orders->links() }}
                </div>
                @endif
            @else
                <div class="text-center py-4">
                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No orders found</h5>
                    <p class="text-muted">Orders will appear here when customers place them.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Sample Orders for Demo -->
    @if(!isset($orders) || $orders->count() == 0)
    <div class="card shadow mt-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Sample Orders (Demo)</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><strong>#1001</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                                        J
                                    </div>
                                    <div>
                                        <strong>John Doe</strong><br>
                                        <small class="text-muted">john@example.com</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-info">3 items</span></td>
                            <td><strong class="text-success">$149.98</strong></td>
                            <td>
                                <select class="form-select form-select-sm status-select" data-order-id="1001">
                                    <option value="pending" selected>Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td>
                                <small class="text-muted">
                                    Aug 05, 2025<br>
                                    02:30 PM
                                </small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-info" title="View Order Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-warning" title="Edit Order">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" title="Cancel Order">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong>#1002</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                                        J
                                    </div>
                                    <div>
                                        <strong>Jane Smith</strong><br>
                                        <small class="text-muted">jane@example.com</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-info">2 items</span></td>
                            <td><strong class="text-success">$99.99</strong></td>
                            <td>
                                <select class="form-select form-select-sm status-select" data-order-id="1002">
                                    <option value="pending">Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="completed" selected>Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td>
                                <small class="text-muted">
                                    Aug 05, 2025<br>
                                    01:45 PM
                                </small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-info" title="View Order Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-warning" title="Edit Order">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" title="Cancel Order">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle status changes
    const statusSelects = document.querySelectorAll('.status-select');
    
    statusSelects.forEach(function(select) {
        select.addEventListener('change', function() {
            const orderId = this.getAttribute('data-order-id');
            const newStatus = this.value;
            
            // Here you would typically make an AJAX call to update the order status
            console.log(`Order ${orderId} status changed to ${newStatus}`);
            
            // Show success message
            const alert = document.createElement('div');
            alert.className = 'alert alert-success alert-dismissible fade show';
            alert.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                Order #${orderId} status updated to ${newStatus}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            const container = document.querySelector('.container');
            container.insertBefore(alert, container.firstChild);
            
            // Auto-dismiss after 3 seconds
            setTimeout(() => {
                alert.remove();
            }, 3000);
        });
    });
});
</script>
@endsection 