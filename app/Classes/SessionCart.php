<?php

namespace App\Classes;

use App\Models\Product;

class SessionCart
{
    public $cartItems = [];

    public function addItem(int $productId, int $quantity): void
    {
        if (array_key_exists($productId, $this->cartItems)) {
            $cartItem = $this->cartItems[$productId];
            $cartItem->increaseQuantity($quantity);
        } else {
            $cartItem = new SessionCartItem($productId, $quantity);
            $this->cartItems[$productId] = $cartItem;
        }
    }

    public function getCartProducts(): void
    {
        $itemProductIds = array_keys($this->cartItems);
        $products = Product::whereIn('id', $itemProductIds)->with('thumbnail')->get();
        foreach ($products as $product) {
            $this->cartItems[$product->id]->setProduct($product);
        }
    }

    public function deleteCartItem(int $productId): bool
    {
        if (array_key_exists($productId, $this->cartItems)) {
            try {
                unset($this->cartItems[$productId]);
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
        return false;
    }

    public function changeCartItemQuantity(int $productId, int $newQuantity): bool {
        if (array_key_exists($productId, $this->cartItems)) {
            $this->cartItems[$productId]->changeQuantity($newQuantity);
            return true;
        }
        return false;
    }
}
