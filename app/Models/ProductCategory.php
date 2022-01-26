<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($category) {
            $category->slug = Str::of($category->name)->slug('-');
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
