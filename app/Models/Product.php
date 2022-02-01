<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($product) {
            //$product->slug = Str::of($product->name)->slug('-');
            $product->slug = Str::of(Str::uuid())->slug('-');
        });
    }

//    public function setSlugAttribute($value) {
//
//        if (static::whereSlug($slug = $value)->exists()) {
//
//            $slug = $this->incrementSlug($slug);
//        }
//
//        $this->attributes['slug'] = $slug;
//    }

    public function scopeFilter($query, array $filters)
    {
        if (($filters['search'] ?? false) && !empty($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }
        if (($filters['category'] ?? false) && !empty($filters['category'])) {
            $query->whereHas('category', function($query) use ($filters) {
                $query->where('slug', $filters['category']);
            });
        }
        if (($filters['specifications'] ?? false) && !empty($filters['specifications']) && ($filters['specGroups'] ?? false)) {
            $specFilters = explode("-", $filters['specifications']);
            $query->whereIn('id', ProductSpecification::whereIn('specification_id', $specFilters)->groupBy('product_id')
                ->havingRaw("COUNT(DISTINCT specification_id) = ?", [$filters['specGroups']])->select('product_id')->get());
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

    public function getFinalPrice($discount) {
        if ($discount)
        {
            return number_format(($this->price * $discount->discount_percent) / 100, 2, '.', '');
        }
        return $this->price;
    }

    public function getSubtotal($quantity) {
        return number_format(($this->price * $quantity), 2, '.', '');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }

    public function thumbnail()
    {
        return $this->hasOne(ProductPhoto::first());
    }

    public function specifications()
    {
        return $this->belongsToMany(Specification::class, 'product_specifications');
    }

    public function discounts()
    {
        return $this->hasMany(ProductDiscount::class);
    }

    public function discount()
    {
        // Uses EloquentEagerLimit\HasEagerLimit
        return $this->hasOne(ProductDiscount::class)
            ->latest()
            ->where('is_active', true)
            ->where('starting_at', '<=', now())
            ->where('ending_at', '>=', now())
            ->limit(1);
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
