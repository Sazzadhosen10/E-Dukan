<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – Orders</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
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
        <h2>Order Management</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1001</td>
                    <td>John Doe</td>
                    <td>$149.98</td>
                    <td>
                        <select class="status-select">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </td>
                    <td>
                        <button class="view-btn">View Details</button>
                    </td>
                </tr>
                <tr>
                    <td>#1002</td>
                    <td>Jane Smith</td>
                    <td>$99.99</td>
                    <td>
                        <select class="status-select">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="completed" selected>Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </td>
                    <td>
                        <button class="view-btn">View Details</button>
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