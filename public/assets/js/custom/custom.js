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

    Wolmart.$body.on('submit', 'footer #newsletter_sub', function (e) {
        e.preventDefault();
        let form = $('footer #newsletter_sub');
        let action = form.attr('action');
        $('footer #newsletter_sub input').removeClass('invalid');
        let resultField = $('footer .subscribe-result');
        let inputField = $('footer #newsletter_sub input[type="email"]');
        let submitButton = $('footer #newsletter_sub button[type="submit"]')

        resultField.removeClass('sub-success').removeClass('sub-error').text();
        inputField.removeClass('invalid');

        submitButton.addClass('wait');
        $.ajax({
            url : action,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: 'POST',
            data: form.serialize(),
            dataType: "json",
            success : function (result){
                if (result['status'] === 'success') {
                    resultField.addClass('sub-success').text('Subscribed to newsletter!').stop(true, true).fadeTo(200, 1);
                    inputField.text('').val('');
                } else if (result['error']) {
                    resultField.addClass('sub-error').text(result['error']).stop(true, true).fadeTo(200, 1);
                    inputField.addClass('invalid');
                } else {
                    resultField.addClass('sub-error').text('Something went wrong, try again later!').stop(true, true).fadeTo(200, 1);
                    inputField.addClass('invalid');
                }
                submitButton.removeClass('wait');
            },
            error: function()
            {
                resultField.addClass('sub-error').text('Something went wrong, try again later!').stop(true, true).fadeTo(200, 1);
                inputField.addClass('invalid');
                submitButton.removeClass('wait');
            }
        });
    });

    Wolmart.$body.on('click', '.btn-account-close', function (e) {
        e.preventDefault();
        clearAddressForm();
        $('#account_form_container').slideUp();
    });

    Wolmart.$body.on('click', '.btn-add-address', function (e) {
        e.preventDefault();
        clearAddressForm();
        $('#account_form_container form').attr('action', $(this).data('url'));
        $('#account_form_container').slideDown();
    });

    Wolmart.$body.on('click', '.btn-edit-address', function (e) {
        e.preventDefault();
        const $this = $(this);
        $('#account_form_container form').attr('action', $this.data('url'));
        $('#account_form_container #address').val($this.data('address'));
        $('#account_form_container #city').val($this.data('city'));
        $('#account_form_container #country').val($this.data('country'));
        $('#account_form_container #postcode').val($this.data('postcode'));
        $('#account_form_container #phone_number').val($this.data('mobile'));
        $('#account_form_container #edit_id').val($this.data('id'));
        $('.ecommerce-address .badge[data-id="'+$this.data("id")+'"]').show();
        $('#account_form_container').slideDown()[0].scrollIntoView({
            behavior: 'smooth',
            block: 'center',
            inline: 'center'
        });
    });

    Wolmart.$body.on('submit', '.address-delete-form', function (e) {
        if(!confirm("Are you sure you want to delete this address?")){
            e.preventDefault();
        }
    });

    initProductPage();

});

function initProductPage() {
    let productPageElem = $('.product-page');
    productPageElem.on('click touchend', '.quantity-plus, .quantity-minus', updateProductTotalPrice);
    productPageElem.on('change', 'input.quantity', updateProductTotalPrice);
}

function clearAddressForm() {
    $('#account_form_container form input').val('').removeClass('invalid');
    $('.ecommerce-address .badge').hide();
    $('#account_form_container form .invalid-feedback').remove();
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
