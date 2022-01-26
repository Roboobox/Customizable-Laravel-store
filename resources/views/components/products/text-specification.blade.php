@props(['product'])
<ul class="list-none">
    @foreach($product->specifications as $specification)
        <li>
            <label>{{ $specification->label->label }}</label>
            <p>{{ $specification->value }}</p>
        </li>
    @endforeach
</ul>
