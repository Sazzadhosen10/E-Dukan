<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop – Product Detail</title>
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
        <div class="product-detail">
            <div class="product-image">
                <img src="{{ asset('images/product1.jpg') }}" alt="Product 1">
            </div>
            <div class="product-info">
                <h2>Product 1</h2>
                <p class="price">$99.99</p>
                <p class="description">This is a detailed description of the product. It includes all the important features and specifications that customers need to know. The product is made with high-quality materials and comes with a warranty.</p>
                <div class="product-meta">
                    <p><strong>Availability:</strong> In Stock</p>
                    <p><strong>Category:</strong> Electronics</p>
                </div>
                <div class="product-actions">
                    <input type="number" value="1" min="1" class="quantity-input">
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Shop. All rights reserved.</p>
    </footer>
</body>
</html> 