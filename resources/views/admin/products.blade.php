<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – Products</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Product Management</h2>
        <form class="admin-form">
            <div class="form-group">
                <label for="product-name">Product Name</label>
                <input type="text" id="product-name" name="name" required>
            </div>
            <div class="form-group">
                <label for="product-category">Category</label>
                <select id="product-category" name="category" required>
                    <option value="">Select Category</option>
                    <option value="1">Electronics</option>
                    <option value="2">Clothing</option>
                </select>
            </div>
            <div class="form-group">
                <label for="product-price">Price</label>
                <input type="number" id="product-price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="product-stock">Stock</label>
                <input type="number" id="product-stock" name="stock" required>
            </div>
            <div class="form-group">
                <label for="product-description">Description</label>
                <textarea id="product-description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="product-image">Product Image</label>
                <input type="file" id="product-image" name="image" accept="image/*" required>
                <small>Upload product image (JPG, PNG, GIF)</small>
            </div>
            <button type="submit">Add Product</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product 1</td>
                    <td>Electronics</td>
                    <td>$99.99</td>
                    <td>10</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>Clothing</td>
                    <td>$49.99</td>
                    <td>20</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Shop Admin Panel. All rights reserved.</p>
    </footer>
</body>
</html> 