@props(['specifications', 'categories'])
{{--{{ $specifications }}--}}
{{--@foreach($specifications as $specification)--}}

{{--@endforeach--}}

<!-- Start of Collapsible widget -->
@if (count($categories) > 1)
    <div class="widget widget-collapsible product-category">
        <h3 class="widget-title"><span>All Categories</span></h3>
        <ul class="widget-body filter-items search-ul">
            @foreach($categories as $category)
                <li><a href="#" data-category="{{ $category->slug }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endif
<!-- End of Collapsible Widget -->
@foreach($specifications->groupBy('label') as $groupLabel => $specData)
    <div class="product-specification widget widget-collapsible">
        <h3 class="widget-title"><span>{{ $groupLabel }}</span></h3>
        <ul class="widget-body filter-items item-check mt-1">
    @foreach($specData as $spec)
                <li><a href="#" data-group="{{ $spec->label_id }}" data-filter="{{ $spec->specification_id }}">{{ $spec->value }}</a></li>
    @endforeach
        </ul>
    </div>
{{--    {{ $specification->specification->label->label . ' : ' . $specification->specification->value . ' ' . $specification->specification_id }} <br>--}}
@endforeach

{{--<!-- Start of Collapsible Widget -->--}}
{{--<div class="widget widget-collapsible">--}}
{{--    <h3 class="widget-title"><span>Price</span></h3>--}}
{{--    <div class="widget-body">--}}
{{--        <ul class="filter-items search-ul">--}}
{{--            <li><a href="#">$0.00 - $100.00</a></li>--}}
{{--            <li><a href="#">$100.00 - $200.00</a></li>--}}
{{--            <li><a href="#">$200.00 - $300.00</a></li>--}}
{{--            <li><a href="#">$300.00 - $500.00</a></li>--}}
{{--            <li><a href="#">$500.00+</a></li>--}}
{{--        </ul>--}}
{{--        <form class="price-range">--}}
{{--            <input type="number" name="min_price" class="min_price text-center"--}}
{{--                   placeholder="$min"><span class="delimiter">-</span><input--}}
{{--                type="number" name="max_price" class="max_price text-center"--}}
{{--                placeholder="$max"><a href="#"--}}
{{--                                      class="btn btn-primary btn-rounded">Go</a>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- End of Collapsible Widget -->--}}

<!-- Start of Collapsible Widget -->
{{--<div class="widget widget-collapsible">--}}
{{--    <h3 class="widget-title"><span>Size</span></h3>--}}
{{--    <ul class="widget-body filter-items item-check mt-1">--}}
{{--        <li><a href="#">Extra Large</a></li>--}}
{{--        <li><a href="#">Large</a></li>--}}
{{--        <li><a href="#">Medium</a></li>--}}
{{--        <li><a href="#">Small</a></li>--}}
{{--    </ul>--}}
{{--</div>--}}
<!-- End of Collapsible Widget -->

{{--<!-- Start of Collapsible Widget -->--}}
{{--<div class="widget widget-collapsible">--}}
{{--    <h3 class="widget-title"><span>Brand</span></h3>--}}
{{--    <ul class="widget-body filter-items item-check mt-1">--}}
{{--        <li><a href="#">Elegant Auto Group</a></li>--}}
{{--        <li><a href="#">Green Grass</a></li>--}}
{{--        <li><a href="#">Node Js</a></li>--}}
{{--        <li><a href="#">NS8</a></li>--}}
{{--        <li><a href="#">Red</a></li>--}}
{{--        <li><a href="#">Skysuite Tech</a></li>--}}
{{--        <li><a href="#">Sterling</a></li>--}}
{{--    </ul>--}}
{{--</div>--}}
{{--<!-- End of Collapsible Widget -->--}}

{{--<!-- Start of Collapsible Widget -->--}}
{{--<div class="widget widget-collapsible">--}}
{{--    <h3 class="widget-title"><span>Color</span></h3>--}}
{{--    <ul class="widget-body filter-items item-check mt-1">--}}
{{--        <li><a href="#">Black</a></li>--}}
{{--        <li><a href="#">Blue</a></li>--}}
{{--        <li><a href="#">Brown</a></li>--}}
{{--        <li><a href="#">Green</a></li>--}}
{{--        <li><a href="#">Grey</a></li>--}}
{{--        <li><a href="#">Orange</a></li>--}}
{{--        <li><a href="#">Yellow</a></li>--}}
{{--    </ul>--}}
{{--</div>--}}
{{--<!-- End of Collapsible Widget -->--}}