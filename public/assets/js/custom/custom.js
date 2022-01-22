// On document ready
$(function ( ) {
    // Event for clearing error messages when swapping tabs in auth form
    $('.login-popup .nav-tabs .nav-item').click(function (  )
    {
        $('.login-popup .form-group input').removeClass('invalid');
        $('.login-popup .form-group .invalid-feedback').remove();
        $('.login-popup .form-group .alert').remove();
    })
});
