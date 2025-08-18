<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shopping Cart – E-Dukan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Header Top -->
    <div class="header-top bg-dark text-white py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Welcome to E-Dukan!</span>
                </div>
                <div class="col-md-6 text-end">
                    @auth
                    <span>Hello, {{ Auth::user()->name }}!</span>
                    <a href="{{ route('logout') }}" class="text-white ms-2"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="text-white">Login</a>
                    <a href="{{ route('register') }}" class="text-white ms-2">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="header bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('shop.index') }}">
                    <img src="{{ asset('images/E_Dokan.jpg') }}" alt="E-Dukan Logo" height="40">
                </a>

                <div class="search-container flex-grow-1 mx-4">
                    <form action="{{ route('shop.search') }}" method="GET" class="d-flex">
                        <input type="text" name="q" class="form-control" placeholder="Search in E-Dukan" value="{{ request('q') }}">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>

                <div class="navbar-nav">
                    @auth
                    <a href="{{ route('shop.cart') }}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-primary">{{ count(session('cart', [])) }}</span>
                    </a>
                    <a href="{{ route('shop.profile') }}" class="nav-link">
                        <i class="fas fa-user"></i>
                    </a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="py-4">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </nav>

            <!-- Cart Content -->
            @if(count($products) > 0)
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Shopping Cart ({{ count($products) }} items)</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($item['product']->image)
                                                    <img src="{{ asset($item['product']->image) }}" alt="{{ $item['product']->name }}" 
                                                         style="width: 60px; height: 60px; object-fit: cover;" class="rounded me-3">
                                                @else
                                                    <div class="bg-light rounded d-flex align-items-center justify-content-center me-3" 
                                                         style="width: 60px; height: 60px;">
                                                        <i class="fas fa-image text-muted"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <h6 class="mb-1">{{ $item['product']->name }}</h6>
                                                    <small class="text-muted">{{ $item['product']->category->name }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="h6 text-primary">${{ number_format($item['product']->price, 2) }}</span>
                                        </td>
                                        <td>
                                            <div class="input-group" style="max-width: 120px;">
                                                <input type="number" class="form-control quantity-input" 
                                                       value="{{ $item['quantity'] }}" min="1" max="{{ $item['product']->stock }}"
                                                       data-product-id="{{ $item['product']->id }}">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="h6 text-success">${{ number_format($item['subtotal'], 2) }}</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-danger btn-sm remove-cart-btn" data-product-id="{{ $item['product']->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="table-active">
                                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                        <td><strong class="h5 text-primary">${{ number_format($total, 2) }}</strong></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('shop.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                            </a>
                            <a href="{{ route('shop.checkout') }}" class="btn btn-success btn-lg">
                                <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-shopping-cart fa-5x text-muted mb-4"></i>
                    <h3 class="text-muted">Your cart is empty</h3>
                    <p class="text-muted mb-4">Looks like you haven't added any products to your cart yet.</p>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-shopping-bag me-2"></i>Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2024 E-Dukan. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#" class="text-white me-3">Privacy Policy</a>
                    <a href="#" class="text-white">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Update quantity and recalculate
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                const quantity = parseInt(this.value);
                const row = this.closest('tr');
                
                // Validate quantity
                if (quantity < 1) {
                    this.value = 1;
                    return;
                }
                
                // Get the price from the row
                const priceText = row.querySelector('td:nth-child(2) .h6').textContent;
                const price = parseFloat(priceText.replace('$', '').replace(',', ''));
                
                // Calculate new subtotal
                const subtotal = price * quantity;
                
                // Update subtotal display
                row.querySelector('td:nth-child(4) .h6').textContent = '$' + subtotal.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                
                // Update total
                updateCartTotal();
                
                // Show success feedback
                showSuccessMessage('Quantity updated!');
                
                // Update cart in background (optional - for persistence)
                updateCartInBackground(this.dataset.productId, quantity);
            });
        });

        // Remove from cart buttons
        document.querySelectorAll('.remove-cart-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                removeFromCart(productId);
            });
        });

        // Update cart total
        function updateCartTotal() {
            let total = 0;
            document.querySelectorAll('tbody tr').forEach(row => {
                const subtotalText = row.querySelector('td:nth-child(4) .h6').textContent;
                const subtotal = parseFloat(subtotalText.replace('$', '').replace(',', ''));
                total += subtotal;
            });
            
            const totalElement = document.querySelector('tfoot .h5');
            if (totalElement) {
                totalElement.textContent = '$' + total.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }
        }

        // Update cart in background (for persistence)
        function updateCartInBackground(productId, quantity) {
            fetch('{{ route("shop.cart.update") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart count in header silently
                    const cartCount = document.getElementById('cart-count');
                    if (cartCount) {
                        cartCount.textContent = data.cart_count;
                    }
                }
            })
            .catch(error => {
                console.error('Background cart update error:', error);
            });
        }

        // Show success message
        function showSuccessMessage(message) {
            // Create success message element
            const successDiv = document.createElement('div');
            successDiv.className = 'alert alert-success alert-dismissible fade show position-fixed';
            successDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            successDiv.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(successDiv);
            
            // Auto-remove after 3 seconds
            setTimeout(() => {
                if (successDiv.parentNode) {
                    successDiv.parentNode.removeChild(successDiv);
                }
            }, 3000);
        }

        // Remove from cart
        function removeFromCart(productId) {
            if (confirm('Are you sure you want to remove this item from your cart?')) {
                const row = document.querySelector(`[data-product-id="${productId}"]`).closest('tr');
                
                fetch('{{ route("shop.cart.remove") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the row from the table
                        row.remove();
                        
                        // Update cart count in header
                        const cartCount = document.getElementById('cart-count');
                        if (cartCount) {
                            cartCount.textContent = data.cart_count;
                        }
                        
                        // Update total
                        updateCartTotal();
                        
                        // Check if cart is empty
                        const tbody = document.querySelector('tbody');
                        if (tbody.children.length === 0) {
                            location.reload(); // Reload to show empty cart message
                        }
                        
                        showSuccessMessage('Item removed from cart successfully!');
                    } else {
                        alert(data.message);
                    }
                });
            }
        }
    </script>
</body>

</html> 