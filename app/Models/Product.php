<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;


    public static function boot()
    {
        parent::boot();
        self::creating(function ($product) {
            $product->slug = Str::of($product->name)->slug('-');
        });
    }

    public function getFinalPrice($activeDiscounts) {
        $discount = $activeDiscounts->first();
        if ($discount)
        {
            return number_format(($this->price * $discount->value('discount_percent')) / 100, 2, '.', '');
        }
        return $this->price;
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function inventory()
    {
        return $this->hasOne(ProductInventory::class);
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function discounts()
    {
        return $this->hasMany(ProductDiscount::class);
    }

    public function activeDiscounts()
    {
        return $this->hasMany(ProductDiscount::class)
            ->where('is_active', true)
            ->where('starting_at', '<=', now())
            ->where('ending_at', '>=', now());
    }

    // Possibly not needed
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
