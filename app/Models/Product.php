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

    public function scopeFilter($query, array $filters)
    {
        if (($filters['search'] ?? false) && !empty($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }
    }

    public function scopeSort($query, string $sort) {
        if ($sort === 'alpha-asc') {
            $query->orderBy('name');
        } else if ($sort === 'alpha-dsc') {
            $query->orderByDesc('name');
        } else if ($sort === 'price-low') {
            $query->orderBy('price');
        } else if ($sort === 'price-high') {
            $query->orderByDesc('price');
        } else if ($sort === 'date') {
            $query->orderBy('created_at');
        }
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
