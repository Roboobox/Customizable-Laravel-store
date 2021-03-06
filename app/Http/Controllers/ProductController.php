<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSpecification;
use App\Models\ViewHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        return view('products', ['category' => $category]);
    }

    public function show(Product $product): View
    {
        if (auth()->check())
        {
            ViewHistory::create( [
                'product_id' => $product->id,
                'user_id' => auth()->user()->id,
                'company_id' => config('company.id'),
            ] );
        } else {
            if (!session()->has('viewHistory')) {
                session()->put('viewHistory', array());
            }
            $viewHistory = session('viewHistory');
            if (!in_array($product->id, $viewHistory)) {
                if (count($viewHistory) >= 10) {
                    array_pop($viewHistory);
                }
                $viewHistory[] = $product->id;
                session()->put('viewHistory', $viewHistory);
            }
        }
        return view('product', [
            'product' => $product->load(['photos', 'specifications','specifications.label', 'category'] ),
            'moreProducts' => Product::whereNotIn('id', [$product->id])->where('company_id', config('company.id'))->inRandomOrder()->limit(6)
                ->with(['photos:product_id,photo_path'])->get(),
        ]);
    }

    public function getModal(Request $request) {
        $rules = array(
            'product' => ['required', Rule::exists('products', 'id')],
        );
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error'
            ]);
        }

        $product = Product::with(['photos', 'specifications','specifications.label', 'category'] )->find($request->input('product'));

        $view = view('components.quickview-content', [
            'product' => $product,
        ])->render();

        return response()->json([
            'status' => 'success',
            'content' => $view
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
        $layout = $request->input('layout') ?? "grid";

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
        // Check if layout matches on of the available values else set to grid
        if (!in_array($layout, ['grid', 'list'])) {
            $layout = 'grid';
        }


        // Get paginated products with filters applied
        $products = Product::with('photos', 'specifications', 'category')
            ->where('company_id', config('company.id'))
            ->filter([
                'search' => $search,
                'category' => $category,
                'specifications' => $specifications,
                'specGroups' => $specGroups
            ])
            ->sort($sort)
            ->paginate($itemsPerPage, ['*'], 'page', $request->input('page'))
            ->withPath('products');

        $searchedProducts = Product::where('company_id', config('company.id'))
            ->filter(['search' => $search, 'category' => $category])->select(['id']);

        if ($type == 2)
        {
            $searchedProductCategories = Product::where('company_id', config('company.id'))
                ->filter(['search' => $search, 'category' => $category])->select('category_id')->distinct();
        } else {
            $searchedProductCategories = Product::where('company_id', config('company.id'))
                ->filter(['search' => $search])->select('category_id')->distinct();
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
            'layout' => $layout,
            'attributes' => new ComponentAttributeBag([]),
        ])->render();


        // Return JSON response
        return response()->json([
            'status' => 'success',
            'content' => $view,
        ]);
    }
}
