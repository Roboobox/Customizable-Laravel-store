@props(['specifications', 'categories'])


@foreach($specifications->groupBy('label') as $groupLabel => $specData)
    <div class="product-specification widget widget-collapsible">
        <h3 class="widget-title collapsed"><span>{{ $groupLabel }}</span></h3>
        <ul class="widget-body filter-items item-check mt-1">
    @foreach($specData as $spec)
                <li><a href="#" data-group="{{ $spec->label_id }}" data-filter="{{ $spec->specification_id }}">{{ $spec->value }}</a></li>
    @endforeach
        </ul>
    </div>
@endforeach
