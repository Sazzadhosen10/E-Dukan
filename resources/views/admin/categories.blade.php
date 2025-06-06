<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – Categories</title>
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
        <h2>Category Management</h2>
        <form class="admin-form">
            <div class="form-group">
                <label for="category-name">Category Name</label>
                <input type="text" id="category-name" name="name" required>
            </div>
            <button type="submit">Add Category</button>
        </form>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Electronics</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>Clothing</td>
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