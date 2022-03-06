// On document ready
$(function ( ) {
    fetchProducts();
    initEvents();
});

function initEvents() {
    let shopContentElem = $('body.products .shop-content');
    // Items per page selector
    shopContentElem.on('change', '#page_items', function ()
    {
        addParamToUrl('i', this.value);
        removeParamFromUrl('page');
        fetchProducts();
    });
    // Item sort type selector
    shopContentElem.on('change', '#page_sort', function ()
    {
        addParamToUrl('sort', this.value);
        fetchProducts();
    });
    // Pagination page selection
    shopContentElem.on('click', '.pagination li a', function (e)
    {
        e.preventDefault();
        let page = $(this).data('page');
        if (page) {
            addParamToUrl('page', page);
            fetchProducts(true);
        }
    });
    // Layout selection
    shopContentElem.on('click', '.toolbox .btn-layout', function (e)
    {
        e.preventDefault();
        let layout = $(this).data('layout');
        if (layout) {
            addParamToUrl('layout', layout);
            fetchProducts();
        }
    });
    // Filter selection
    shopContentElem.on('click', '.product-specification li a', function ()
    {
        let element =  $(this);
        let listElement = element.parent();
        if (listElement.hasClass('active')) {
            listElement.removeClass('active');
        } else {
            listElement.addClass('active');
        }
        removeParamFromUrl('page');
        addSelectedFiltersToUrl(getSelectedFilters());
        fetchProducts();
    });

    // Category selection
    shopContentElem.on('click', '.product-category li a', function (event)
    {
        event.preventDefault();
        let element =  $(this);
        let category = element.data('category');
        addParamToUrl('c', category);
        fetchProducts();
    });

    // Clear filters selection
    shopContentElem.on('click', '.filter-clean', function (event)
    {
        clearUrlFilterParams();
        fetchProducts();
    });

    shopContentElem.on('submit', '.cart_quick_add', function (event)
    {
        quickAddToCart($(this), event);
    });

    shopContentElem.on('change', '.cart_quick_add input.quantity', function (event)
    {
        validateProductQuantity('.cart_quick_add input.quantity');
    });
}

function showProductsLoading() {
    $('.products .loading-overlay').show();
}

function hideProductsLoading() {
    $('.products .loading-overlay').hide();
}

function removeParamFromUrl(name) {
    const url = new URL(window.location.href);
    url.searchParams.delete(name);
    window.history.replaceState(null, null, url);
}


function addParamToUrl(name, value) {
    const url = new URL(window.location.href);
    url.searchParams.set(encodeURI(name), encodeURI(value));
    window.history.replaceState(null, null, url);
}

function scrollToShopTop() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("header.header").offset().top
    }, 400);
}

function quickAddToCart(form, event) {
    event.preventDefault();
    $.ajax({
        url : form.attr('action'),
        method: 'POST',
        dataType: "json",
        data: form.serialize(),
        success : function (result){
            if (result['status'] !== undefined && result['status'] === 'success') {
                $('.cart-dropdown .cart-count').text(result['count']);
                form.children('.cart-message').removeClass('error').text('Added to the cart!').stop(true, true).fadeTo(200, 1).delay(4000).fadeTo(200, 0);
                form.find('input.quantity').val(1);
            } else {
                form.children('.cart-message').addClass('error').text('Something went wrong, try again later!').stop(true, true).fadeTo(200, 1).delay(4000).fadeTo(200, 0);
            }
        },
        error: function()
        {
            form.children('.cart-message').addClass('error').text('Something went wrong, try again later!').stop(true, true).fadeTo(200, 1).delay(4000).fadeTo(200, 0);
        }
    });
}

function clearUrlFilterParams() {
    const keepParams = ['s', 'i', 'sort'];
    let urlParams = new URLSearchParams(window.location.search);
    var newUrl = window.location.href.split('?')[0];
    for (const param of keepParams) {
        if (urlParams.has(param)) {
            newUrl = new URL(newUrl);
            newUrl.searchParams.set(param, urlParams.get(param));
        }
    }
    window.history.replaceState(null, null, newUrl);
}

function getSelectedFilters() {
    let filters = [];
    $('.shop-content .product-specification li.active a').each(function ()
    {
        let filterId = $(this).data('filter');
        let filterGroup = $(this).data('group');

        if (filterId && filterGroup)
        {
            if ( filters[filterGroup] === undefined )
            {
                filters[filterGroup] = [];
            }
            filters[filterGroup].push(filterId);
        }
    })
    return filters;
}

function addSelectedFiltersToUrl(activeFilters) {
    let filterQueryString = "";
    for (const [group, values] of Object.entries(activeFilters)) {
        for (const value of values) {
            //filterQueryString += group + '_' + value + '-';
            filterQueryString += value + '-';
        }
    }
    if (filterQueryString.length > 1) {
        // Remove trailing '-'
        filterQueryString = filterQueryString.slice(0, -1);
    }
    addParamToUrl('f', filterQueryString);
    addParamToUrl('fg', Object.keys(activeFilters).length);
}

function setFiltersSelected(urlFilters) {
    let filters = urlFilters.split('-');
    try {
        for (let filter of filters) {
            //filter = filter.split('_')[1];
            $('.shop-content .product-specification a[data-filter="'+filter+'"]').parent().addClass('active');
        }
    } catch (e) {

    }
}

function fetchProducts(scrollToTop = false) {
    const urlQuery = window.location.search;
    const urlParams = new URLSearchParams(urlQuery);

    // Params
    let search = "";
    try {
        search = decodeURI(urlParams.get('s') ?? "");
    } catch (e) {
        search = ""
    }

    let shopContent = $('.products .shop-content');
    let category = shopContent.data('category') ?? urlParams.get('c') ?? '';
    let itemsPerPage = urlParams.get('i') ?? 12;
    let page = urlParams.get('page') ?? 1;
    let sort = urlParams.get('sort') ?? "alpha-asc"
    let layout = urlParams.get('layout') ?? "grid";
    let specifications = urlParams.get('f') ?? "";
    let specGroups = urlParams.get('fg') ?? "";

    let type = 1;
    if (shopContent.data('category')) {
        type = 2;
    }

    // Get opened filters
    let openFilters = $('.product-specification .widget-title:not(.collapsed)').map(function(){
        return $(this).data('label');
    }).get();

    // Check if category widget was open
    let isCtgOpen = $('.product-category .widget-title:not(.collapsed)').length;

    showProductsLoading();

    let ajaxUrl = shopContent.data('url');

    $.ajax({
        url : ajaxUrl,
        method: 'POST',
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            search: search,
            itemsPerPage: itemsPerPage,
            category: category,
            page: page,
            layout: layout,
            sort: sort,
            specifications: specifications,
            specGroups: specGroups,
            type: type
        },
        success : function (result){
            if (result['status'] === 'success') {
                shopContent.html(result['content']);
                shopContent.find('.product-category ul li a').removeClass('active');
                shopContent.find('.product-category ul li a[data-category="'+category+'"]').addClass('active');
                Wolmart.countDown('.product-countdown, .countdown');
                Wolmart.sidebar('sidebar');                                         // Initialize Sidebar
                Wolmart.sidebar('right-sidebar');
                Wolmart.initQtyInput('.quantity');
                Wolmart.menu.init();
                setFiltersSelected(specifications);
                if (scrollToTop)
                {
                    scrollToShopTop();
                }
                // Open previously opened filters
                for (let filterLabel of openFilters) {
                    $('.product-specification .widget-title[data-label="'+filterLabel+'"]').removeClass('collapsed');
                }
                if (isCtgOpen) $('.product-category .widget-title.collapsed').removeClass('collapsed');
            }
            hideProductsLoading();
        },
        error: function()
        {
            hideProductsLoading();
        }
    });
}
