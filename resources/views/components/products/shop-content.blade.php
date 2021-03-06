@props(['products', 'itemsPerPage', 'sort', 'specifications', 'categories', 'layout'])
    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
        <div class="sidebar-overlay"></div>
        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

        <div class="sidebar-content scrollable">
            <div class="sticky-sidebar">
                <div class="filter-actions">
                    <label>Filter :</label>
                    <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                </div>
                <x-products.specification-filters :specifications="$specifications" :categories="$categories"></x-products.specification-filters>
            </div>
        </div>
    </aside>

    <div class="main-content">
        <nav class="toolbox sticky-toolbox sticky-content fix-top">
            <div class="toolbox-left">
                <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left d-block d-lg-none"><i
                        class="w-icon-category"></i><span>Filters</span></a>
                <div class="toolbox-item toolbox-sort select-box text-dark">
                    <label>Sort By :</label>
                    <select id="page_sort" name="orderby" class="form-control">
                        <option value="alpha-asc" {{ $sort=="alpha-asc" ? 'selected' : '' }}>Name: A - Z</option>
                        <option value="alpha-dsc" {{ $sort=="alpha-dsc" ? 'selected' : '' }}>Name: Z - A</option>
                        <option value="date" {{ $sort=="date" ? 'selected' : '' }}>Sort by latest</option>
                        <option value="price-low" {{ $sort=="price-low" ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price-high" {{ $sort=="price-high" ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>
            </div>
            <div class="toolbox-right">
                <div class="toolbox-item toolbox-show select-box">
                    <select id="page_items" name="count" class="form-control">
                        @if(!in_array($itemsPerPage, [9, 12, 24, 36]))
                            <option value="{{ $itemsPerPage }}" selected>Show {{ $itemsPerPage }}</option>
                        @endif
                        <option value="9" {{ $itemsPerPage==9 ? 'selected' : '' }}>Show 9</option>
                        <option value="12" {{ $itemsPerPage==12 ? 'selected' : '' }}>Show 12</option>
                        <option value="24" {{ $itemsPerPage==24 ? 'selected' : '' }}>Show 24</option>
                        <option value="36" {{ $itemsPerPage==36 ? 'selected' : '' }}>Show 36</option>
                    </select>
                </div>
                <div class="toolbox-item toolbox-layout">
                    <a href="#" class="icon-mode-grid btn-layout{{ $layout == 'grid' ? ' active' : '' }}" data-layout="grid">
                        <i class="w-icon-grid"></i>
                    </a>
                    <a href="#" class="icon-mode-list btn-layout{{ $layout == 'list' ? ' active' : '' }}" data-layout="list">
                        <i class="w-icon-list"></i>
                    </a>
                </div>
            </div>
        </nav>
        @if(count($products))
            @if($layout == 'list')
            <x-products.products-list :products="$products"></x-products.products-list>
            @else
            <x-products.products-grid :products="$products"></x-products.products-grid>
            @endif
        @else
            <div class="product-wrapper row">
                <div class="alert alert-simple alert-inline text-center mt-3">
                    <div class="alert-title">
                        <div class="text-uppercase" style="font-size: 1.6rem; font-weight: 800">No products were found that match criteria</div>
                        <div class="font-weight-normal">Try to change search criteria</div>
                        <a href="{{ route('products') }}" class="btn btn-primary btn-link text-normal mt-3">
                            View all products
                        </a>
                    </div>
                </div>
            </div>
        @endif
            </div>

        <div class="toolbox toolbox-pagination justify-content-between">
            {{ $products->withQueryString()->links('vendor.pagination.custom-pagination') }}
        </div>
    </div>
