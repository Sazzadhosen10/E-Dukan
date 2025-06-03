<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop – Cart</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <nav>
            <a href="{{ url('/shop') }}" class="logo">Shop</a>
            <ul>
                <li><a href="{{ url('/shop') }}">Home</a></li>
                <li><a href="{{ url('/shop/category') }}">Electronics</a></li>
                <li><a href="{{ url('/shop/cart') }}" class="cart-icon">
                    Cart
                    <span class="cart-count">1</span>
                </a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Shopping Cart</h2>
        <div class="cart-container">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="cart-product">
                                <img src="{{ asset('images/product1.jpg') }}" alt="Product 1">
                                <div class="cart-product-info">
                                    <h3>Product 1</h3>
                                    <p class="cart-product-category">Electronics</p>
                                </div>
                            </div>
                        </td>
                        <td>$99.99</td>
                        <td>
                            <input type="number" value="1" min="1" class="quantity-input">
                        </td>
                        <td>$99.99</td>
                        <td>
                            <button class="remove-btn">Remove</button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="cart-total-label">Total:</td>
                        <td class="cart-total">$99.99</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="cart-actions">
                <a href="{{ url('/shop/category') }}" class="continue-shopping">Continue Shopping</a>
                <a href="{{ url('/shop/checkout') }}" class="checkout-btn">Proceed to Checkout</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Shop. All rights reserved.</p>
    </footer>
</body>
</html> 