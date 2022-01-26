// On document ready
$(function ( ) {
    fetchProducts();
});

function setEventsOnProductRefresh() {
    // Items per page selection
    $('.shop-content #page_items').change(function ()
    {
        addParamToUrl('i', this.value);
        removeParamFromUrl('page');
        fetchProducts();
    });
    // Items sort selection
    $('.shop-content #page_sort').change(function ()
    {
        addParamToUrl('sort', this.value);
        fetchProducts();
    });

    $('.shop-content .pagination li a').click(function(e)
    {
        e.preventDefault();
        let page = $(this).data('page');
        if (page) {
            addParamToUrl('page', page);
            fetchProducts();
            scrollToShopTop();
        }
    })


    $('.shop-content .product-specification li a').click(function ()
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
        scrollToShopTop();
    });
}

function createPagination() {
    $('.shop-content .pagination').html(
        '<button data-page="1">1</button><button data-page="2">2</button><button data-page="3">3</button>'
    )
    $('.shop-content .pagination button').click(function ()
    {
        addParamToUrl('page', $(this).data('page'));
        scrollToShopTop();
        fetchProducts();
    });
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
        scrollTop: $("#shop_content_top").offset().top
    }, 500);
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
    console.log('here');
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


function fetchProducts() {
    const urlQuery = window.location.search;
    const urlParams = new URLSearchParams(urlQuery);

    // Params
    let search = "";
    try {
        search = decodeURI(urlParams.get('s') ?? "");
    } catch (e) {
        search = ""
    }
    let category = urlParams.get('c') ?? '';
    let itemsPerPage = urlParams.get('i') ?? 12;
    let page = urlParams.get('page') ?? 1;
    let sort = urlParams.get('sort') ?? "alpha-asc"
    let layout = urlParams.get('layout') ?? "grid";
    let specifications = urlParams.get('f') ?? "";
    let specGroups = urlParams.get('fg') ?? "";

    $.ajax({
        url : "ajax/products",
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
            specGroups: specGroups
        },
        success : function (result){
            if (result['status']) {
                $('.shop-content').html(result['content']);
                Wolmart.init();
                setEventsOnProductRefresh();
                //createPagination();
                setFiltersSelected(specifications);
            }
        },
        error: function()
        {

        }
    });
}
