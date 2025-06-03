<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop – Electronics</title>
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
                    <span class="cart-count">0</span>
                </a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Electronics</h2>
        <ul class="product-grid">
            <li class="product-card">
                <a href="{{ url('/shop/product') }}">
                    <img src="{{ asset('images/product1.jpg') }}" alt="Product 1">
                    <div class="product-info">
                        <h3>Product 1</h3>
                        <p class="price">$99.99</p>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </a>
            </li>
            <li class="product-card">
                <a href="{{ url('/shop/product') }}">
                    <img src="{{ asset('images/product2.jpg') }}" alt="Product 2">
                    <div class="product-info">
                        <h3>Product 2</h3>
                        <p class="price">$149.99</p>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </a>
            </li>
            <li class="product-card">
                <a href="{{ url('/shop/product') }}">
                    <img src="{{ asset('images/product3.jpg') }}" alt="Product 3">
                    <div class="product-info">
                        <h3>Product 3</h3>
                        <p class="price">$199.99</p>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </a>
            </li>
        </ul>
    </main>

    <footer>
        <p>&copy; 2024 Shop. All rights reserved.</p>
    </footer>
</body>
</html> 