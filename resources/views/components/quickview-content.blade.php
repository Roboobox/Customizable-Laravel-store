<div class="row gutter-lg">
    <div class="col-md-6 mb-4 mb-md-0">
        <div class="product-gallery product-gallery-sticky">
            <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                <div class="swiper-wrapper row cols-1 gutter-no">
                    @foreach($product->photos as $photo)
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="{{ asset('assets/images/store/products/' . $photo->photo_path) }}"
                                     data-zoom-image="{{ asset('assets/images/store/products/' . $photo->photo_path) }}"
                                     alt="{{ $product->name }}" width="800" height="900">
                            </figure>
                        </div>
                    @endforeach
                </div>
                <button class="swiper-button-next"></button>
                <button class="swiper-button-prev"></button>
            </div>
            <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                        'navigation': {
                            'nextEl': '.swiper-button-next',
                            'prevEl': '.swiper-button-prev'
                        }
                    }">
                <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                    @foreach($product->photos as $photo)
                        <div class="product-thumb swiper-slide">
                            <img src="{{ asset('assets/images/store/products/' . $photo->photo_path) }}"
                                 alt="Product Thumb" width="800" height="900">
                        </div>
                    @endforeach
                </div>
                <button class="swiper-button-next"></button>
                <button class="swiper-button-prev"></button>
            </div>
        </div>
    </div>
    <div class="col-md-6 overflow-hidden p-relative">
        <div class="product-details scrollable pl-0">
            <h2 class="product-title">{{ $product->name }}</h2>
            <div class="product-bm-wrapper">
                <div class="product-meta">
                    <div class="product-categories">
                        Category:
                        <span class="product-category"><a href="{{ route('products-category', ['category' => $product->category]) }}">{{ $product->category->name }}</a></span>
                    </div>
                </div>
            </div>

            <hr class="product-divider">

            <div class="product-price">${{ $product->price }}</div>

            <hr class="product-divider">

            <div class="product-variation-price">
                <span id="total_price">{{ $product->price }}</span><span class="currency">$</span>
            </div>

            <div class="product-form">
                <div class="product-qty-form">
                    <div class="input-group">
                        <input class="quantity form-control" type="number" min="1" max="10000000">
                        <button class="quantity-plus w-icon-plus"></button>
                        <button class="quantity-minus w-icon-minus"></button>
                    </div>
                </div>
                <button class="btn btn-primary btn-cart">
                    <i class="w-icon-cart"></i>
                    <span>Add to Cart</span>
                </button>
            </div>

            <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#product-tab-description" class="nav-link active">Description</a>
                    </li>
                    <li class="nav-item">
                        <a href="#product-tab-specification" class="nav-link">Specification</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="product-tab-description">
                        <div class="row mb-4">
                            <div class="col-md-12 mb-5">
                                {{ $product->description ?? 'Product has no description.' }}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="product-tab-specification">
                        <ul class="list-none">
                            @foreach($product->specifications as $specification)
                                <li>
                                    <label>{{ $specification->label->label }}</label>
                                    <p>{{ $specification->value }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
