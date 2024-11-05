<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => ($cart[$product->id]['quantity'] ?? 0) + 1,
        ];

        session(['cart' => $cart]);

        return redirect()->route('cart')->with('success', 'Product added to cart.');
    }

    public function viewCart()
    {
        $cart = session('cart', []);
        
        return view('cart', compact('cart'));
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if ($request->quantity <= 0) {
            unset($cart[$id]);
        } else {
            $cart[$id]['quantity'] = $request->quantity;
        }

        session(['cart' => $cart]);

        return redirect()->route('cart')->with('success', 'Cart updated.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session(['cart' => $cart]);

        return redirect()->route('cart')->with('success', 'Product removed from cart.');
    }
}
