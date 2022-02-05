@props(['products'])
<div class="product-wrapper row cols-md-1 cols-1">
    @foreach($products as $product)
        <x-products.product-card-list :product="$product"></x-products.product-card-list>
@endforeach
