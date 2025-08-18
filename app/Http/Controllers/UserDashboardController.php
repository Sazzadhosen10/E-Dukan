<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Display the user dashboard
     */
    public function index()
    {
        $user = Auth::user();

        // Get user's order statistics
        $totalOrders = Order::where('user_id', $user->id)->count();
        $pendingOrders = Order::where('user_id', $user->id)->where('status', 'pending')->count();
        $completedOrders = Order::where('user_id', $user->id)->where('status', 'delivered')->count();
        $totalSpent = Order::where('user_id', $user->id)->sum('total_amount');

        // Get recent orders
        $recentOrders = Order::where('user_id', $user->id)
            ->with('orderItems.product')
            ->latest()
            ->take(5)
            ->get();

        // Get recommended products (based on user's order history)
        $recommendedProducts = Product::whereHas('orderItems.order', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->distinct()->take(8)->get();

        // If no order history, show featured products
        if ($recommendedProducts->isEmpty()) {
            $recommendedProducts = Product::where('stock', '>', 0)->take(8)->get();
        }

        // Get cart count
        $cartCount = Cart::where('user_id', $user->id)->sum('quantity');

        return view('user.dashboard', compact(
            'user',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'totalSpent',
            'recentOrders',
            'recommendedProducts',
            'cartCount'
        ));
    }

    /**
     * Display user's order history
     */
    public function orders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
            ->with('orderItems.product')
            ->latest()
            ->paginate(10);

        return view('user.orders', compact('orders'));
    }

    /**
     * Display user's profile
     */
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }
}
