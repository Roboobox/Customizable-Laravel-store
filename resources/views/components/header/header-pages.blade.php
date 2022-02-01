<li class="{{ Route::is('home') ? 'active' : '' }}">
    <a href="{{ route('home') }}">Home</a>
</li>
<li class="{{ Route::is('products') ? 'active' : '' }}">
    <a href="{{ route('products') }}">Products</a>
</li>
<li class="{{ Route::is('technology') ? 'active' : '' }}">
    <a href="{{ route('coming-soon') }}">Technology</a>
    <ul>
        <li><a href="{{ route('coming-soon') }}">Body adjust technology</a></li>
        <li><a href="{{ route('coming-soon') }}">Scientific tests</a></li>
        <li><a href="{{ route('coming-soon') }}">Features</a></li>
    </ul>
</li>
