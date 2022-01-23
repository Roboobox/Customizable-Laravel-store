<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products', [
            'products' => Product::with('photos', 'specifications', 'category',  'activeDiscounts')->paginate(12),
        ]);
    }

    public function show(Product $product)
    {
        return view('product', [
            'product' => $product->load(['photos', 'specifications', 'category',  'activeDiscounts'] ),
            'moreProducts' => Product::whereNotIn('id', [$product->id])->inRandomOrder()->limit(6)
                ->with(['photos:product_id,photo_path', 'activeDiscounts'])->get(),
        ]);
    }
}
