@props(['products'])
<div class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2">
    @foreach($products as $product)
        <x-products.product-card-grid :product="$product"></x-products.product-card-grid>
@endforeach
