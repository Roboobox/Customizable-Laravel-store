<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\ComponentAttributeBag;

class ProductController extends Controller
{
    public function index()
    {
        return view('products', [
            //'products' => Product::with('photos', 'specifications', 'category',  'activeDiscounts')->paginate(12),
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

    public function search(Request $request)
    {
        $search = $request->input('search') ?? "";
        $itemsPerPage = $request->input('itemsPerPage') ?? 12;
        $sort = $request->input('sort') ?? 12;

        // Check if items per page is one of the available values else set to 12
        if (!in_array($itemsPerPage, [3, 9, 12, 24, 36]) ) {
            $itemsPerPage = 12;
        }
        // Check if sort matches on of the available values else set to (A to Z)
        if (!in_array($sort, ['alpha-asc', 'alpha-dsc', 'date', 'price-low', 'price-high'])) {
            $sort = 'alpha-asc';
        }

        $products = Product::filter(['search' => $search])
            ->with('photos', 'specifications', 'category',  'activeDiscounts')
            ->sort($sort)
            ->paginate($itemsPerPage, ['*'], 'page', $request->input('page'))
            ->withPath('products');

        // Create view HTML with products
        $view = view('components.products.shop-content', [
            'products' => $products,
            'itemsPerPage' => $itemsPerPage,
            'sort' => $sort,
            'attributes' => new ComponentAttributeBag([]),
        ])->render();

        // Return JSON response
        return response()->json([
            'status' => 'success',
            'content' => $view,
            'products' => $products
        ]);
    }

    public function test() {
        return view('test', [
            'products' => Product::with('discount')->get(),
        ]);
    }
}
