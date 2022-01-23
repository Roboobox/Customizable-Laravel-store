@props(['products', 'itemsPerPage', 'sort'])
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
                <!-- Start of Collapsible widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title"><span>All Categories</span></h3>
                    <ul class="widget-body filter-items search-ul">
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Babies</a></li>
                        <li><a href="#">Beauty</a></li>
                        <li><a href="#">Decoration</a></li>
                        <li><a href="#">Electronics</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Furniture</a></li>
                        <li><a href="#">Kitchen</a></li>
                        <li><a href="#">Medical</a></li>
                        <li><a href="#">Sports</a></li>
                        <li><a href="#">Watches</a></li>
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title"><span>Price</span></h3>
                    <div class="widget-body">
                        <ul class="filter-items search-ul">
                            <li><a href="#">$0.00 - $100.00</a></li>
                            <li><a href="#">$100.00 - $200.00</a></li>
                            <li><a href="#">$200.00 - $300.00</a></li>
                            <li><a href="#">$300.00 - $500.00</a></li>
                            <li><a href="#">$500.00+</a></li>
                        </ul>
                        <form class="price-range">
                            <input type="number" name="min_price" class="min_price text-center"
                                   placeholder="$min"><span class="delimiter">-</span><input
                                type="number" name="max_price" class="max_price text-center"
                                placeholder="$max"><a href="#"
                                                      class="btn btn-primary btn-rounded">Go</a>
                        </form>
                    </div>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title"><span>Size</span></h3>
                    <ul class="widget-body filter-items item-check mt-1">
                        <li><a href="#">Extra Large</a></li>
                        <li><a href="#">Large</a></li>
                        <li><a href="#">Medium</a></li>
                        <li><a href="#">Small</a></li>
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title"><span>Brand</span></h3>
                    <ul class="widget-body filter-items item-check mt-1">
                        <li><a href="#">Elegant Auto Group</a></li>
                        <li><a href="#">Green Grass</a></li>
                        <li><a href="#">Node Js</a></li>
                        <li><a href="#">NS8</a></li>
                        <li><a href="#">Red</a></li>
                        <li><a href="#">Skysuite Tech</a></li>
                        <li><a href="#">Sterling</a></li>
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title"><span>Color</span></h3>
                    <ul class="widget-body filter-items item-check mt-1">
                        <li><a href="#">Black</a></li>
                        <li><a href="#">Blue</a></li>
                        <li><a href="#">Brown</a></li>
                        <li><a href="#">Green</a></li>
                        <li><a href="#">Grey</a></li>
                        <li><a href="#">Orange</a></li>
                        <li><a href="#">Yellow</a></li>
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->
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
            <p class="showing-info mb-2 mb-sm-0">
                Showing<span>1-12 of 60</span>Products
            </p>
{{--            {{ $products->withQueryString()->links('vendor.pagination.custom-pagination') }}--}}
            <ul class="pagination">
                <li class="prev disabled">
                    <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                        <i class="w-icon-long-arrow-left"></i>Prev
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="next">
                    <a href="#" aria-label="Next">
                        Next<i class="w-icon-long-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End of Shop Main Content -->
