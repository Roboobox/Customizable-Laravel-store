// On document ready
$(function ( ) {
    updateCart();
});

function initCartItemDelete() {
    $('.cart-page .cart table.cart-table tbody .remove-cart-item').click(function ()
    {
        let recheck = confirm('Are you sure you want to delete this item?');
        if (recheck)
        {
            let $this = $( this );
            let url = $this.data( 'url' );
            $.ajax( {
                url: url,
                headers: { 'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' ) },
                method: 'POST',
                dataType: "json",
                success: function ( result )
                {
                    if ( result[ 'status' ] === 'success' )
                    {
                        updateCart();
                    }
                },
                error: function ()
                {

                }
            } );
        }
    });
}

function initCartItemUpdate() {
    $('.cart-page .cart table.cart-table .product-quantity input.quantity').change(function()
    {
        updateCartItem($(this));
    });
    $('.cart-page .cart table.cart-table .product-quantity .quantity-change').click(function()
    {
        updateCartItem($(this));
    });
}

function updateCartItem(elem) {
    let form = elem.closest('form');
    let formAction = form.prop('action');
    validateProductQuantity('.cart-page .cart table.cart-table tbody input.quantity');
    $('.cart-page .loading-overlay').show();
    $.ajax({
        url : formAction,
        method: 'POST',
        dataType: "json",
        data: form.serialize(),
        success : function (result){
            if (result['status'] === 'success') {
                //
            }
            updateCart();
            $('.cart-page .loading-overlay').hide();
        },
        error: function()
        {
            $('.cart-page .loading-overlay').hide();
        }
    });
}


function updateCart() {
    let action = $('.cart-page .cart table.cart-table').data('url');
    $.ajax({
        url : action,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: 'POST',
        dataType: "json",
        success : function (result){
            if (result['status'] === 'success') {
                if (result['content'] !== undefined) {
                    $('.cart-page .cart table.cart-table tbody').html(result['content']);
                    $('.cart-dropdown .cart-count').text(result['count']);
                    Wolmart.initQtyInput('.quantity');
                    initCartItemDelete();
                    initCartItemUpdate();
                }
            }
        },
        error: function()
        {

        }
    });
}
