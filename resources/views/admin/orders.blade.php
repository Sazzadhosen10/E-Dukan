@extends('admin.layouts.admin')

@section('title', 'Orders Management – E-Dukan')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orders Management</h1>
        <div class="text-muted">
            Total Orders: {{ $orders->total() }}
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Orders Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0">All Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>
                                <strong>{{ $order->order_number }}</strong>
                            </td>
                            <td>
                                <div>
                                    <strong>{{ $order->user->name }}</strong><br>
                                    <small class="text-muted">{{ $order->user->email }}</small><br>
                                    <small class="text-muted">{{ $order->shipping_phone }}</small>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $order->orderItems->count() }} items</span>
                                <div class="mt-1">
                                    @foreach($order->orderItems->take(2) as $item)
                                        <small class="d-block text-muted">{{ $item->product_name }} ({{ $item->quantity }})</small>
                                    @endforeach
                                    @if($order->orderItems->count() > 2)
                                        <small class="text-muted">... and {{ $order->orderItems->count() - 2 }} more</small>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <strong>@money($order->total_amount)</strong>
                            </td>
                            <td>
                                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" 
                                            onchange="this.form.submit()" 
                                            style="min-width: 120px;">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                                <span class="badge bg-{{ $order->status_badge }} mt-1">{{ ucfirst($order->status) }}</span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span>
                                <br>
                                <small class="text-muted">{{ ucfirst($order->payment_status) }}</small>
                            </td>
                            <td>
                                {{ $order->created_at->format('M d, Y') }}<br>
                                <small class="text-muted">{{ $order->created_at->format('h:i A') }}</small>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" 
                                        data-bs-target="#orderModal{{ $order->id }}">
                                    <i class="fas fa-eye"></i> View
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                                <h5>No orders found</h5>
                                <p class="text-muted">Orders will appear here when customers place them.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $orders->links('admin.components.pagination') }}
        </div>
    </div>
</div>

<!-- Order Detail Modals -->
@foreach($orders as $order)
<div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Details - {{ $order->order_number }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><i class="fas fa-user me-2"></i>Customer Information</h6>
                        <p class="mb-1"><strong>Name:</strong> {{ $order->shipping_name }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ $order->shipping_email }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $order->shipping_phone }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-shipping-fast me-2"></i>Shipping Address</h6>
                        <p class="mb-1">{{ $order->shipping_address }}</p>
                        <p class="mb-1">{{ $order->shipping_city }}, {{ $order->shipping_postal_code }}</p>
                        <p class="mb-1">{{ $order->shipping_country }}</p>
                    </div>
                </div>

                @if($order->notes)
                <div class="row mt-3">
                    <div class="col-12">
                        <h6><i class="fas fa-sticky-note me-2"></i>Order Notes</h6>
                        <p class="text-muted">{{ $order->notes }}</p>
                    </div>
                </div>
                @endif

                <div class="row mt-3">
                    <div class="col-12">
                        <h6><i class="fas fa-box me-2"></i>Order Items</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                    <tr>
                                        <td>{{ $item->product_name }}</td>
                                        <td>@money($item->product_price)</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>@money($item->total_price)</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total Amount</th>
                                        <th>@money($order->total_amount)</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y h:i A') }}</p>
                        <p class="mb-1"><strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                        <p class="mb-1"><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Status:</strong> <span class="badge bg-{{ $order->status_badge }}">{{ ucfirst($order->status) }}</span></p>
                        @if($order->delivered_at)
                            <p class="mb-1"><strong>Delivered At:</strong> {{ $order->delivered_at->format('M d, Y h:i A') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <a href="mailto:{{ $order->shipping_email }}" class="btn btn-primary">
                    <i class="fas fa-envelope me-1"></i>Email Customer
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection