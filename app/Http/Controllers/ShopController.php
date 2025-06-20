<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display the shop homepage with products
     */
    public function index()
    {
        $products = Product::visible()
            ->inStock()
            ->with('category')
            ->latest()
            ->take(12)
            ->get();

        $categories = Category::visible()->get();

        return view('shop.index', compact('products', 'categories'));
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
     * Display user profile
     */
    public function profile()
    {
        return view('shop.profile');
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
