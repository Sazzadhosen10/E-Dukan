<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Order;
use App\Models\HomepageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ShopController extends Controller
{
    /**
     * Display the shop homepage with products
     */
    public function index()
    {
        // Get sliders (guarded if table doesn't exist yet)
        $sliders = collect();
        if (Schema::hasTable('sliders')) {
            $sliders = Slider::active()->ordered()->get();
        }

        // Get featured products
        $featuredProducts = Product::visible()
            ->inStock()
            ->with('category')
            ->take(8)
            ->get();

        // Get new arrivals (latest products)
        $newArrivals = Product::visible()
            ->inStock()
            ->with('category')
            ->latest()
            ->take(8)
            ->get();

        // Get best selling products (mock for now - you can implement based on order items later)
        $bestSellers = Product::visible()
            ->inStock()
            ->with('category')
            ->inRandomOrder()
            ->take(8)
            ->get();

        // Get main categories with images for featured categories section
        $featuredCategories = Category::visible()
            ->whereNull('parent_id')
            ->whereNotNull('image')
            ->take(8)
            ->get();

        // Get all categories for navigation
        $categories = Category::visible()->get();

        // Get homepage sections (value proposition, testimonials, etc.)
        $valuePropSections = HomepageSection::bySection('value_proposition')
            ->active()
            ->ordered()
            ->get();

        $testimonials = HomepageSection::bySection('testimonials')
            ->active()
            ->ordered()
            ->take(6)
            ->get();

        $brandPartners = HomepageSection::bySection('brand_partners')
            ->active()
            ->ordered()
            ->get();

        return view('shop.index', compact(
            'sliders',
            'featuredProducts',
            'newArrivals',
            'bestSellers',
            'featuredCategories',
            'categories',
            'valuePropSections',
            'testimonials',
            'brandPartners'
        ));
    }

    /**
     * Display products by category
     */
    public function category(Request $request, $categoryId = null)
    {
        $categories = Category::visible()->get();

        if ($categoryId) {
            $category = Category::visible()->findOrFail($categoryId);
            $products = Product::visible()
                ->inStock()
                ->where('category_id', $categoryId)
                ->with('category')
                ->paginate(12);
        } else {
            $category = null;
            $products = Product::visible()
                ->inStock()
                ->with('category')
                ->paginate(12);
        }

        return view('shop.category', compact('products', 'categories', 'category'));
    }

    /**
     * Display product details
     */
    public function product($id)
    {
        $product = Product::visible()
            ->with('category')
            ->findOrFail($id);

        // Get related products from same category
        $relatedProducts = Product::visible()
            ->inStock()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('shop.product', compact('product', 'relatedProducts'));
    }

    /**
     * Display shopping cart
     */
    public function cart()
    {
        return view('shop.cart');
    }

    /**
     * Display checkout page
     */
    public function checkout()
    {
        return view('shop.checkout');
    }

    /**
     * Display user profile with order history
     */
    public function profile()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)
            ->with('orderItems.product')
            ->latest()
            ->paginate(10);

        return view('shop.profile', compact('user', 'orders'));
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        $query = $request->get('q');

        $products = Product::visible()
            ->inStock()
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->with('category')
            ->paginate(12);

        return view('shop.search', compact('products', 'query'));
    }
}
