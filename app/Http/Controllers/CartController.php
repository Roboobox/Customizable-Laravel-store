<?php

namespace App\Http\Controllers;

use App\Classes\SessionCart;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\ComponentAttributeBag;
use \Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    public function index() {
        return view('cart');
    }

    public function indexSummary(): JsonResponse
    {
        $cart = $this->getCart();
        $view = view('components.header.cart-summary', [
            'cartItems' => $cart->cartItems,
            'attributes' => new ComponentAttributeBag([]),
        ])->render();

        // Return JSON response
        return response()->json([
            'status' => 'success',
            'content' => $view,
            'count' => count($cart->cartItems),
        ]);
    }

    public function indexCartContainer(): JsonResponse
    {
        $cart = $this->getCart();
        $view = view('components.cart.cart-body', [
           'cartItems' => $cart->cartItems,
        ])->render();

        $total = 0.00;
        foreach ($cart->cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        // Return JSON response
        return response()->json([
            'status' => 'success',
            'content' => $view,
            'total' => number_format($total, 2, '.', ''),
            'count' => count($cart->cartItems),
        ]);
    }

    protected function getCart() {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::user()->id)->with(['cartItems', 'cartItems.product', 'cartItems.product.thumbnail'])->first();
            if (!$cart) {
                return new SessionCart();
            }
        } else if (session()->has('cart')) {
            $cart = session('cart');
            $cart->getCartProducts();
        } else {
            $cart = new SessionCart();
        }
        return $cart;
    }
}
