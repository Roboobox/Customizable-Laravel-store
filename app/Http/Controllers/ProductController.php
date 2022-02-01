<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSpecification;
use App\Models\ViewHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\ComponentAttributeBag;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products');
    }

    public function indexCategory(ProductCategory $category): View
    {
        return view('products');
    }

    public function show(Product $product): View
    {
        if (auth()->check())
        {
            ViewHistory::create( [
                'product_id' => $product->id,
                'user_id' => auth()->user()->id
            ] );
        } else {
//            if (!session()->has('viewHistory')) {
//                session()->put('viewHistory', array());
//            }
//            $viewHistory = session('viewHistory');
        }
        return view('product', [
            'product' => $product->load(['photos', 'specifications','specifications.label', 'category'] ),
            'moreProducts' => Product::whereNotIn('id', [$product->id])->inRandomOrder()->limit(6)
                ->with(['photos:product_id,photo_path'])->get(),
        ]);
    }


    public function search(Request $request): JsonResponse
    {
        // Get POST variables
        $search = $request->input('search') ?? "";
        $category = $request->input('category') ?? "";
        $itemsPerPage = $request->input('itemsPerPage') ?? 12;
        $sort = $request->input('sort') ?? 12;
        $specifications = $request->input('specifications') ?? "";
        $specGroups = $request->input('specGroups') ?? 1;
        $type = $request->input('type') ?? 1;

        if ($specGroups < 1 || $specGroups > 1000) {
            $specGroups = 1;
        }

        // Check if items per page is one of the available values else set to 12
        if (! in_array( $itemsPerPage, [ 3, 9, 12, 24, 36 ], false ) ) {
            $itemsPerPage = 12;
        }
        // Check if sort matches on of the available values else set to (A to Z)
        if (!in_array($sort, ['alpha-asc', 'alpha-dsc', 'date', 'price-low', 'price-high'])) {
            $sort = 'alpha-asc';
        }

        // Get paginated products with filters applied
        $products = Product::with('photos', 'specifications', 'category',  'discount')
            ->filter([
                'search' => $search,
                'category' => $category,
                'specifications' => $specifications,
                'specGroups' => $specGroups
            ])
            ->sort($sort)
            ->paginate($itemsPerPage, ['*'], 'page', $request->input('page'))
            ->withPath('products');

        $searchedProducts = Product::filter(['search' => $search, 'category' => $category])->select(['id']);
        if ($type == 2)
        {
            $searchedProductCategories = Product::filter(['search' => $search, 'category' => $category])->select('category_id')->distinct();
        } else {
            $searchedProductCategories = Product::filter(['search' => $search])->select('category_id')->distinct();
        }

        // Get specifications of all products that match search and category
        $filterSpecifications = ProductSpecification::select(['specification_id', 'specifications.value', 'specification_labels.label', 'specification_labels.id as label_id'])
            ->leftJoin('specifications', 'product_specifications.specification_id', '=', 'specifications.id')
            ->leftJoin('specification_labels', 'specifications.specification_label_id', '=', 'specification_labels.id')
            ->whereIn('product_id', ($searchedProducts))
            ->distinct()
            ->get();


        $filterCategories = ProductCategory::whereIn('id', $searchedProductCategories)->get();

        // Create view HTML with products
        $view = view('components.products.shop-content', [
            'products' => $products,
            'specifications' => $filterSpecifications->unique('specification_id'),
            'categories' => $filterCategories,
            'itemsPerPage' => $itemsPerPage,
            'sort' => $sort,
            'attributes' => new ComponentAttributeBag([]),
        ])->render();


        // Return JSON response
        return response()->json([
            'status' => 'success',
            'content' => $view,
        ]);
    }
}
