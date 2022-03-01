@props(['specifications', 'categories'])

@if (count($categories) > 1)
    <div class="widget widget-collapsible product-category">
        <h3 class="widget-title collapsed"><span>Categories</span></h3>
        <ul class="widget-body filter-items search-ul">
            @foreach($categories as $category)
                <li><a class="radio-custom" href="#" data-category="{{ $category->slug }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endif

@foreach($specifications->groupBy('label') as $groupLabel => $specData)
    <div class="product-specification widget widget-collapsible">
        <h3 class="widget-title collapsed" data-label="{{ $groupLabel }}"><span>{{ $groupLabel }}</span></h3>
        <ul class="widget-body filter-items item-check mt-1">
    @foreach($specData as $spec)
                <li><a href="#" data-group="{{ $spec->label_id }}" data-filter="{{ $spec->specification_id }}">{{ $spec->value }}</a></li>
    @endforeach
        </ul>
    </div>
@endforeach
