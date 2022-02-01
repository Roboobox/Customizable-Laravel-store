<?php

namespace App\Http\Controllers;

use App\Classes\SessionCart;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;

class CartItemController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $rules = array(
            'product' => ['required', Rule::exists('products', 'id')],
            'quantity' => ['required', 'integer', 'between:1,10000000'],
        );
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error'
            ]);
        }

        $productId = $request->input('product');
        $quantity = $request->input('quantity');

        if (Auth::check()) {
            $cart = Cart::firstOrCreate(
                ['user_id' => Auth::user()->id]
            );

            $cartItem = CartItem::firstOrNew([
                'cart_id' => $cart->id,
                'product_id' => $productId
            ]);
            $cartItem->quantity += $quantity;
            $cartItem->save();


            return response()->json([
                'status' => 'success',
                'count' => count($cart->cartItems),
            ]);
        }

        // Guest user
        if (!session()->has('cart')) {
            session()->put('cart', new SessionCart());
        }
        $cart = session('cart');
        $cart->addItem($productId, $quantity);
        session()->put('cart', $cart);

        return response()->json([
            'status' => 'success',
            'count' => count($cart->cartItems),
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $request->merge(['product' => $request->route('product')]);
        $rules = array(
            'product' => ['required'],
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'error' ]);
        }

        $productId = $request->input('product');

        if (Auth::check()) {
            $deleteStmt = CartItem::where('cart_id', function ($query) {
                $query->select('id')->from('carts')->where('user_id', Auth::user()->id);
            })->where('product_id', $productId)->first()->delete();

            if ($deleteStmt)
            {
                return response()->json( [ 'status' => 'success' ] );
            }
        } else {
            if (session()->has('cart')) {
                $cart = session('cart');
                if ($cart->deleteCartItem($productId)) {
                    session()->put('cart', $cart);
                    return response()->json( [ 'status' => 'success' ] );
                }
            }
        }

        return response()->json(['status' => 'error']);
    }

    public function update(Request $request): JsonResponse
    {
        $request->merge(['product' => $request->route('product')]);
        $rules = array(
            'product' => ['required'],
            'quantity' => ['required', 'integer', 'between:1,10000000'],
        );

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'error' ]);
        }

        $productId = $request->input('product');
        $quantity = $request->input('quantity');

        if (Auth::check()) {
            $updateStmt = CartItem::where('cart_id', function ($query) {
                $query->select('id')->from('carts')->where('user_id', Auth::user()->id);
            })->where('product_id', $productId)->first()->update(['quantity' => $quantity]);
            if ($updateStmt)
            {
                return response()->json( [ 'status' => 'success' ] );
            }
        } else {
            if (session()->has('cart')) {
                $cart = session('cart');
                if ($cart->changeCartItemQuantity($productId, $quantity)) {
                    session()->put('cart', $cart);
                    return response()->json( [ 'status' => 'success' ] );
                }
            }
        }

        return response()->json(['status' => 'error']);
    }

}
