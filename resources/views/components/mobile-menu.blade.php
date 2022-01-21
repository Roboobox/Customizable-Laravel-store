<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>
                        <a href="{{ route('products') }}">Shop</a>
                        <ul>
                            <li>
                                <a href="#">Shop Pages</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Banner With Sidebar</a></li>
                                    <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                    <li><a href="{{ route('products') }}">Full Width Banner</a></li>
                                    <li><a href="shop-horizontal-filter.html">Horizontal Filter<span
                                                class="tip tip-hot">Hot</span></a></li>
                                    <li><a href="shop-off-canvas.html">Off Canvas Sidebar<span
                                                class="tip tip-new">New</span></a></li>
                                    <li><a href="shop-infinite-scroll.html">Infinite Ajax Scroll</a></li>
                                    <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                    <li><a href="shop-both-sidebar.html">Both Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Shop Layouts</a>
                                <ul>
                                    <li><a href="shop-grid-3cols.html">3 Columns Mode</a></li>
                                    <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                    <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                    <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                    <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                    <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                    <li><a href="shop-list.html">List Mode</a></li>
                                    <li><a href="shop-list-sidebar.html">List Mode With Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Pages</a>
                                <ul>
                                    <li><a href="product-variable.html">Variable Product</a></li>
                                    <li><a href="product-featured.html">Featured &amp; Sale</a></li>
                                    <li><a href="product-accordion.html">Data In Accordion</a></li>
                                    <li><a href="product-section.html">Data In Sections</a></li>
                                    <li><a href="product-swatch.html">Image Swatch</a></li>
                                    <li><a href="product-extended.html">Extended Info</a>
                                    </li>
                                    <li><a href="product-without-sidebar.html">Without Sidebar</a></li>
                                    <li><a href="product-video.html">360<sup>o</sup> &amp; Video<span
                                                class="tip tip-new">New</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Layouts</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Default<span
                                                class="tip tip-hot">Hot</span></a></li>
                                    <li><a href="product-vertical.html">Vertical Thumbs</a></li>
                                    <li><a href="product-grid.html">Grid Images</a></li>
                                    <li><a href="product-masonry.html">Masonry</a></li>
                                    <li><a href="product-gallery.html">Gallery</a></li>
                                    <li><a href="product-sticky-info.html">Sticky Info</a></li>
                                    <li><a href="product-sticky-thumb.html">Sticky Thumbs</a></li>
                                    <li><a href="product-sticky-both.html">Sticky Both</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="vendor-dokan-store.html">Vendor</a>
                        <ul>
                            <li>
                                <a href="#">Store Listing</a>
                                <ul>
                                    <li><a href="vendor-dokan-store-list.html">Store listing 1</a></li>
                                    <li><a href="vendor-wcfm-store-list.html">Store listing 2</a></li>
                                    <li><a href="vendor-wcmp-store-list.html">Store listing 3</a></li>
                                    <li><a href="vendor-wc-store-list.html">Store listing 4</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Vendor Store</a>
                                <ul>
                                    <li><a href="vendor-dokan-store.html">Vendor Store 1</a></li>
                                    <li><a href="vendor-wcfm-store-product-grid.html">Vendor Store 2</a></li>
                                    <li><a href="vendor-wcmp-store-product-grid.html">Vendor Store 3</a></li>
                                    <li><a href="vendor-wc-store-product-grid.html">Vendor Store 4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>
                        <ul>
                            <li><a href="blog.html">Classic</a></li>
                            <li><a href="blog-listing.html">Listing</a></li>
                            <li>
                                <a href="blog-grid.html">Grid</a>
                                <ul>
                                    <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                    <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                    <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masonry</a>
                                <ul>
                                    <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                    <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                    <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Mask</a>
                                <ul>
                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="post-single.html">Single Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">Pages</a>
                        <ul>

                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="become-a-vendor.html">Become A Vendor</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('signin') }}">Login</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="error-404.html">Error 404</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="{{ route('cart') }}">Cart</a></li>
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="elements.html">Elements</a>
                        <ul>
                            <li><a href="element-products.html">Products</a></li>
                            <li><a href="element-titles.html">Titles</a></li>
                            <li><a href="element-typography.html">Typography</a></li>
                            <li><a href="element-categories.html">Product Category</a></li>
                            <li><a href="element-buttons.html">Buttons</a></li>
                            <li><a href="element-accordions.html">Accordions</a></li>
                            <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                            <li><a href="element-tabs.html">Tabs</a></li>
                            <li><a href="element-testimonials.html">Testimonials</a></li>
                            <li><a href="element-blog-posts.html">Blog Posts</a></li>
                            <li><a href="element-instagrams.html">Instagrams</a></li>
                            <li><a href="element-cta.html">Call to Action</a></li>
                            <li><a href="element-vendors.html">Vendors</a></li>
                            <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                            <li><a href="element-icons.html">Icons</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-tshirt2"></i>Fashion
                        </a>
                        <ul>
                            <li>
                                <a href="#">Women</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">New Arrivals</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Best Sellers</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Trending</a></li>
                                    <li><a href="{{ route('products') }}">Clothing</a></li>
                                    <li><a href="{{ route('products') }}">Shoes</a></li>
                                    <li><a href="{{ route('products') }}">Bags</a></li>
                                    <li><a href="{{ route('products') }}">Accessories</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Jewlery &
                                            Watches</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Men</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">New Arrivals</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Best Sellers</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Trending</a></li>
                                    <li><a href="{{ route('products') }}">Clothing</a></li>
                                    <li><a href="{{ route('products') }}">Shoes</a></li>
                                    <li><a href="{{ route('products') }}">Bags</a></li>
                                    <li><a href="{{ route('products') }}">Accessories</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Jewlery &
                                            Watches</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-home"></i>Home & Garden
                        </a>
                        <ul>
                            <li>
                                <a href="#">Bedroom</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Beds, Frames &
                                            Bases</a></li>
                                    <li><a href="{{ route('products') }}">Dressers</a></li>
                                    <li><a href="{{ route('products') }}">Nightstands</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Kid's Beds &
                                            Headboards</a></li>
                                    <li><a href="{{ route('products') }}">Armoires</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Living Room</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Coffee Tables</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Chairs</a></li>
                                    <li><a href="{{ route('products') }}">Tables</a></li>
                                    <li><a href="{{ route('products') }}">Futons & Sofa
                                            Beds</a></li>
                                    <li><a href="{{ route('products') }}">Cabinets &
                                            Chests</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Office</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Office Chairs</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Desks</a></li>
                                    <li><a href="{{ route('products') }}">Bookcases</a></li>
                                    <li><a href="{{ route('products') }}">File Cabinets</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Breakroom
                                            Tables</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Kitchen & Dining</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Dining Sets</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Kitchen Storage
                                            Cabinets</a></li>
                                    <li><a href="{{ route('products') }}">Bashers Racks</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Dining Chairs</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Dining Room
                                            Tables</a></li>
                                    <li><a href="{{ route('products') }}">Bar Stools</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-electronics"></i>Electronics
                        </a>
                        <ul>
                            <li>
                                <a href="#">Laptops &amp; Computers</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Desktop
                                            Computers</a></li>
                                    <li><a href="{{ route('products') }}">Monitors</a></li>
                                    <li><a href="{{ route('products') }}">Laptops</a></li>
                                    <li><a href="{{ route('products') }}">Hard Drives &amp;
                                            Storage</a></li>
                                    <li><a href="{{ route('products') }}">Computer
                                            Accessories</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">TV &amp; Video</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">TVs</a></li>
                                    <li><a href="{{ route('products') }}">Home Audio
                                            Speakers</a></li>
                                    <li><a href="{{ route('products') }}">Projectors</a></li>
                                    <li><a href="{{ route('products') }}">Media Streaming
                                            Devices</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Digital Cameras</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Digital SLR
                                            Cameras</a></li>
                                    <li><a href="{{ route('products') }}">Sports & Action
                                            Cameras</a></li>
                                    <li><a href="{{ route('products') }}">Camera Lenses</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Photo Printer</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Digital Memory
                                            Cards</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Cell Phones</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Carrier Phones</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Unlocked Phones</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Phone & Cellphone
                                            Cases</a></li>
                                    <li><a href="{{ route('products') }}">Cellphone
                                            Chargers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-furniture"></i>Furniture
                        </a>
                        <ul>
                            <li>
                                <a href="#">Furniture</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Sofas & Couches</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Armchairs</a></li>
                                    <li><a href="{{ route('products') }}">Bed Frames</a></li>
                                    <li><a href="{{ route('products') }}">Beside Tables</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Dressing Tables</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Lighting</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Light Bulbs</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Lamps</a></li>
                                    <li><a href="{{ route('products') }}">Celling Lights</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Wall Lights</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Bathroom
                                            Lighting</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Home Accessories</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Decorative
                                            Accessories</a></li>
                                    <li><a href="{{ route('products') }}">Candals &
                                            Holders</a></li>
                                    <li><a href="{{ route('products') }}">Home Fragrance</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Mirrors</a></li>
                                    <li><a href="{{ route('products') }}">Clocks</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Garden & Outdoors</a>
                                <ul>
                                    <li><a href="{{ route('products') }}">Garden
                                            Furniture</a></li>
                                    <li><a href="{{ route('products') }}">Lawn Mowers</a>
                                    </li>
                                    <li><a href="{{ route('products') }}">Pressure
                                            Washers</a></li>
                                    <li><a href="{{ route('products') }}">All Garden
                                            Tools</a></li>
                                    <li><a href="{{ route('products') }}">Outdoor Dining</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-heartbeat"></i>Healthy & Beauty
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-gift"></i>Gift Ideas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-gamepad"></i>Toy & Games
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-ice-cream"></i>Cooking
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-ios"></i>Smart Phones
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-camera"></i>Cameras & Photo
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}">
                            <i class="w-icon-ruby"></i>Accessories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}"
                           class="font-weight-bold text-primary text-uppercase ls-25">
                            View All Categories<i class="w-icon-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
