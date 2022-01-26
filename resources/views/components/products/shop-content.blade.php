@props(['products', 'itemsPerPage', 'sort', 'specifications', 'categories'])
    <!-- Start of Sidebar, Shop Sidebar -->
    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
        <!-- Start of Sidebar Overlay -->
        <div class="sidebar-overlay"></div>
        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

        <!-- Start of Sidebar Content -->
        <div class="sidebar-content scrollable">
            <!-- Start of Sticky Sidebar -->
            <div class="sticky-sidebar">
                <div class="filter-actions">
                    <label>Filter :</label>
                    <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                </div>
                <x-products.specification-filters :specifications="$specifications" :categories="$categories"></x-products.specification-filters>
            </div>
            <!-- End of Sidebar Content -->
        </div>
        <!-- End of Sidebar Content -->
    </aside>
    <!-- End of Shop Sidebar -->

    <!-- Start of Shop Main Content -->
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
                    <a href="shop-banner-sidebar.html" class="icon-mode-grid btn-layout active">
                        <i class="w-icon-grid"></i>
                    </a>
                    <a href="shop-list.html" class="icon-mode-list btn-layout">
                        <i class="w-icon-list"></i>
                    </a>
                </div>
            </div>
        </nav>
        <div class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2">
            @foreach($products as $product)
                <x-products.product-card :product="$product"></x-products.product-card>
            @endforeach
        </div>

        <div class="toolbox toolbox-pagination justify-content-between">
{{--            <p class="showing-info mb-2 mb-sm-0">--}}
{{--                Showing<span>1-12 of 60</span>Products--}}
{{--            </p>--}}
{{--            {{ $products->withQueryString()->links('vendor.pagination.custom-pagination') }}--}}
            {{ $products->withQueryString()->links('vendor.pagination.custom-pagination') }}
{{--            <ul class="pagination">--}}
{{--                <li class="prev disabled">--}}
{{--                    <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">--}}
{{--                        <i class="w-icon-long-arrow-left"></i>Prev--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="page-item active">--}}
{{--                    <a class="page-link" href="#">1</a>--}}
{{--                </li>--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="#">2</a>--}}
{{--                </li>--}}
{{--                <li class="next">--}}
{{--                    <a href="#" aria-label="Next">--}}
{{--                        Next<i class="w-icon-long-arrow-right"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </div>
    </div>
    <!-- End of Shop Main Content -->
