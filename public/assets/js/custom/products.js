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
            sort: sort
        },
        success : function (result){
            if (result['status']) {
                $('.shop-content').html(result['content']);
                Wolmart.init();
                setEventsOnProductRefresh();
                createPagination();
            }
        },
        error: function()
        {

        }
    });
}
