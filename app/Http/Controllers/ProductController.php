<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display all products
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        
        $products = Product::where('name', 'like', "%$search%")
                          ->orWhere('description', 'like', "%$search%")
                          ->get();
        
        return view('products.index', compact('products', 'search'));
    }

    /**
     * Display single product
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Add product to cart
     */
    public function addToCart(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $cart = Session::get('cart', []);

            $quantity = $request->quantity ?? 1;

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += $quantity;
            } else {
                $cart[$id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'image' => $product->image
                ];
            }

            Session::put('cart', $cart);

            if ($request->action === 'buy_now') {
                return redirect()->route('cart')->with('success', 'Product added! Proceed to checkout.');
            }

            return redirect()->back()->with('success', 'Product added to cart!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error adding product to cart.');
        }
    }

    /**
     * Update cart quantity
     */
    public function updateCart(Request $request, $id)
    {
        try {
            $cart = Session::get('cart', []);
            
            if (isset($cart[$id])) {
                $quantity = $request->quantity;
                
                if ($quantity > 0) {
                    $cart[$id]['quantity'] = $quantity;
                } else {
                    unset($cart[$id]);
                }
                
                Session::put('cart', $cart);
                
                return redirect()->route('cart')->with('success', 'Cart updated successfully!');
            }
            
            return redirect()->route('cart')->with('error', 'Product not found in cart!');
            
        } catch (\Exception $e) {
            return redirect()->route('cart')->with('error', 'Error updating cart.');
        }
    }

    /**
     * Remove item from cart
     */
    public function removeFromCart($id)
    {
        try {
            $cart = Session::get('cart', []);
            
            if (isset($cart[$id])) {
                unset($cart[$id]);
                Session::put('cart', $cart);
                return redirect()->route('cart')->with('success', 'Product removed from cart!');
            }
            
            return redirect()->route('cart')->with('error', 'Product not found in cart!');
            
        } catch (\Exception $e) {
            return redirect()->route('cart')->with('error', 'Error removing product from cart.');
        }
    }

    /**
     * Clear entire cart
     */
    public function clearCart()
    {
        try {
            Session::forget('cart');
            return redirect()->route('cart')->with('success', 'Cart cleared successfully!');
        } catch (\Exception $e) {
            return redirect()->route('cart')->with('error', 'Error clearing cart.');
        }
    }

    /**
     * Show cart page
     */
    public function cart()
    {
        $cart = Session::get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart', compact('cart', 'total'));
    }
}