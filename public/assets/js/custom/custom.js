// On document ready
$(function ( ) {
    // Event for clearing error messages when swapping tabs in auth form
    $('.login-popup .nav-tabs .nav-item').click(function (  )
    {
        $('.login-popup .form-group input').removeClass('invalid');
        $('.login-popup .form-group .invalid-feedback').remove();
        $('.login-popup .form-group .alert').remove();
    });

    Wolmart.$body.on('click', 'header .cart-toggle', function (e) {
        let action = $('header .cart-toggle input[type="hidden"]').val();
        $('.cart-dropdown .loading-overlay').show();
        $.ajax({
            url : action,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: 'POST',
            dataType: "json",
            success : function (result){
                if (result['status'] === 'success') {
                    if (result['content'] !== undefined) {
                        $('header .cart-dropdown .cart-summary-container').html(result['content']);
                    }
                }
                $('.cart-dropdown .loading-overlay').hide();
            },
            error: function()
            {
                $('.cart-dropdown .loading-overlay').hide();
            }
        });
    });

    initProductPage();

});

function initProductPage() {
    let productPageElem = $('.product-page');
    productPageElem.on('click', '.quantity-plus, .quantity-minus', updateProductTotalPrice);
    productPageElem.on('change', 'input.quantity', updateProductTotalPrice);
}

function updateProductTotalPrice() {
    let quantity = $('.product-page input.quantity');
    validateProductQuantity('.product-page input.quantity');
    let productPrice = $('.product-page form .product-qty-form').data('price');
    $('.product-page #total_price').text((productPrice * Number(quantity.val())).toFixed(2));
}

function validateProductQuantity(quantityInputSelector) {
    let quantity = $(quantityInputSelector);
    if (quantity.val() < 1 ) {
        quantity.val(1);
    } else if (quantity.val() > 10000000) {
        quantity.val(10000000);
    }
}

function updateHeaderCartCount() {

}
