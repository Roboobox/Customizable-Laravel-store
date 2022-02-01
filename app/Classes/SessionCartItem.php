<?php

namespace App\Classes;

use App\Models\Product;

class SessionCartItem
{
    public $product = null;
    public $quantity = null;
    public $productId = null;

    public function __construct(int $productId, int $quantity)
    {
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function increaseQuantity(int $quantity): void
    {
        $this->quantity += $quantity;
    }

    public function changeQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }
}
