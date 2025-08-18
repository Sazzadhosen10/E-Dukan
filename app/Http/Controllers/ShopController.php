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
        // Get cart items from session
        $cartItems = session()->get('cart', []);
        $products = [];
        $total = 0;

        foreach ($cartItems as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'subtotal' => $product->price * $item['quantity']
                ];
                $total += $product->price * $item['quantity'];
            }
        }

        return view('shop.cart', compact('products', 'total'));
    }

    /**
     * Add item to cart
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        
        if ($product->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Not enough stock available'
            ]);
        }

        $cart = session()->get('cart', []);
        
        // Always replace the quantity (don't add to existing)
        $cart[$request->product_id] = [
            'quantity' => $request->quantity,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image
        ];

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully',
            'cart_count' => count($cart)
        ]);
    }

    /**
     * Buy now - redirect to checkout with single item
     */
    public function buyNow(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        
        if ($product->stock < $request->quantity) {
            return back()->with('error', 'Not enough stock available');
        }

        // Clear cart and add only this item
        $cart = [
            $request->product_id => [
                'quantity' => $request->quantity,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image
            ]
        ];

        session()->put('cart', $cart);

        return redirect()->route('shop.checkout');
    }

    /**
     * Display checkout page
     */
    public function checkout()
    {
        $cartItems = session()->get('cart', []);
        
        if (empty($cartItems)) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty');
        }

        $products = [];
        $total = 0;

        foreach ($cartItems as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'subtotal' => $product->price * $item['quantity']
                ];
                $total += $product->price * $item['quantity'];
            }
        }

        return view('shop.checkout', compact('products', 'total'));
    }

    /**
     * Update cart item quantity
     */
    public function updateCartQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        
        if ($product->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Not enough stock available'
            ]);
        }

        $cart = session()->get('cart', []);
        
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            
            return response()->json([
                'success' => true,
                'message' => 'Quantity updated successfully',
                'cart_count' => count($cart)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product not found in cart'
        ]);
    }

    /**
     * Remove item from cart
     */
    public function removeFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $cart = session()->get('cart', []);
        
        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
            
            return response()->json([
                'success' => true,
                'message' => 'Product removed from cart successfully',
                'cart_count' => count($cart)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Product not found in cart'
        ]);
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
