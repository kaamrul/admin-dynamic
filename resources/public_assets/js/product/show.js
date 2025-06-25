$(document).ready(function () {
    // Quantity Plus Minus
    $(document).on('click', '.plus', function() {
        var input  = $(this).closest('.product-qty').find('.qty-input');
        var maxValue =  parseInt(input.attr('max'));
        var inputValue = parseInt(input.val());

        if (inputValue < maxValue && !input.is('[readonly]')) {
            input.val(inputValue + 1);
            input.trigger('change');
        } else {
            input.val(maxValue);
        }
    });

    $('.minus').on('click', function () {
        var input  = $(this).closest('.product-qty').find('.qty-input');
        var inputValue = input.val();

        if ( inputValue > 1 && !input.is('[readonly]')) {
            input.val(parseInt(inputValue) - 1);
            input.trigger('change');
        }
    });

    $(document).on('keyup', '.qty-input', function() {
        var input  = $(this).closest('.product-qty').find('.qty-input');
        var minValue = parseInt($(this).attr('min'));
        var maxValue = parseInt($(this).attr('max'));
        var inputValue = $(this).val();

        if (inputValue < minValue || inputValue > maxValue) {
            $(this).val(1);
            input.trigger('change');
        }
    });

    // Add to cart button click event
    $('.btn-add-to-cart').on('click', function() {
        //$(this).attr('disabled', true);

        var productId = $('input[name="product_id"]').val();
        var unitPrice = $('input[name="unit_price"]').val();
        var quantity = parseInt($('.qty-input').val());
        var discount = $('input[name="discount"]').val();
        var selectedColor = $('input[name="color"]:checked').val();
        var selectedVariants = [];

        $('input[type="radio"].attribute:checked').each(function() {
            selectedVariants.push($(this).val());
        });

        $.ajax({
            url: '/add-to-cart',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId,
                quantity: quantity,
                price: unitPrice,
                discount: discount,
                color: selectedColor,
                variants: selectedVariants
            },
            success: function (response) {
                var totalAmount = 0;
                var cartIcon = $('.items-image');
                cartIcon.empty();

                response.carts.forEach(function(cartItem) {
                    var itemTotal = cartItem.quantity * cartItem.price;
                    totalAmount += itemTotal;
                });

                var itemsToDisplay = response.carts.slice(0, 4); // Select only the first 4 items
                var remainingItemCount = Math.max(response.carts.length - 3, 0);
                itemsToDisplay.forEach(function(cartItem) {
                    var newItem = $('<li><img src="' + cartItem.thumbnail_image_url + '" alt=""></li>');
                    cartIcon.prepend(newItem);
                });

                // Side Cart
                var itemCount = response.carts.length;
                $('.item-title').text(itemCount + ' Items');

                if (remainingItemCount > 0) {
                    $('.items-image li:last').text('+' + remainingItemCount);
                } else {
                    $('.items-image li:last').text('');
                }

                $('.cart-total').text('Total: $' + totalAmount.toFixed(2));

                // Header Cart
                var headerCart = $('<span class="position-absolute top-0 start-100 translate-middle badge cartItemTotal">' + itemCount + ' <span class="visually-hidden">unread messages</span> </span>');
                $('.header-cart').append(headerCart);

                cartIcon.show();

                notify(response.message, 'success');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);

                notify('Opps! Something went wrong', 'danger');
            }
        });
    });

});

// $('.btn-add-to-cart').on('click', function() {

//     var productId = $('input[name="product_id"]').val();
//     var unitPrice = $('input[name="unit_price"]').val();
//     var quantity = parseInt($('.qty-input').val());
//     var discount = $('input[name="discount"]').val();
//     var selectedColor = $('input[name="color"]:checked').val();
//     var selectedVariants = [];

//     $('input[type="radio"].attribute:checked').each(function() {
//         selectedVariants.push($(this).val());
//     });

//     $.ajax({
//         url: '/add-to-cart',
//         type: 'POST',
//         data: {
//             _token: $('meta[name="csrf-token"]').attr('content'),
//             product_id: productId,
//             quantity: quantity,
//             price: unitPrice,
//             discount: discount,
//             color: selectedColor,
//             variants: selectedVariants
//         },
//         success: function (response) {
//             var totalAmount = 0;
//             var cartIcon = $('.items-image');
//             cartIcon.empty();

//             response.carts.forEach(function(cartItem) {
//                 var itemTotal = cartItem.quantity * cartItem.price;
//                 totalAmount += itemTotal;
//             });

//             var itemsToDisplay = response.carts.slice(0, 4); // Select only the first 4 items
//             var remainingItemCount = Math.max(response.carts.length - 3, 0);
//             itemsToDisplay.forEach(function(cartItem) {
//                 var newItem = $('<li><img src="' + cartItem.thumbnail_image_url + '" alt=""></li>');
//                 cartIcon.prepend(newItem);
//             });

//             // Side Cart
//             var itemCount = response.carts.length;
//             $('.item-title').text(itemCount + ' Items');

//             if (remainingItemCount > 0) {
//                 $('.items-image li:last').text('+' + remainingItemCount);
//             } else {
//                 $('.items-image li:last').text('');
//             }

//             $('.cart-total').text('Total: $' + totalAmount.toFixed(2));

//             // Header Cart
//             var headerCart = $('<span class="position-absolute top-0 start-100 translate-middle badge cartItemTotal">' + itemCount + ' <span class="visually-hidden">unread messages</span> </span>');
//             $('.header-cart').append(headerCart);

//             cartIcon.show();

//             notify(response.message, 'success');
//         },
//         error: function(xhr, status, error) {
//             console.error(xhr.responseText);

//             notify('Opps! Something went wrong', 'danger');
//         }
//     });
// });

// Function to update cart data with AJAX
function addDataToCartAndRedirect() {
    var productId = $('input[name="product_id"]').val();
    var unitPrice = $('input[name="unit_price"]').val();
    var product_slug = $('input[name="product_slug"]').val();
    var quantity = parseInt($('.qty-input').val());
    var discount = $('input[name="discount"]').val();
    var selectedColor = $('input[name="color"]:checked').val();
    var selectedVariants = [];

    $('input[type="radio"].attribute:checked').each(function() {
        selectedVariants.push($(this).val());
    });

    $.ajax({
        url: '/buy-now',
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: productId,
            quantity: quantity,
            price: unitPrice,
            discount: discount,
            color: selectedColor,
            variants: selectedVariants,
            buy_now: 'buy_now',
            product_slug: product_slug,
        },
        success: function(response) {
            var isAuthenticated = response.isAuthenticated;

            if (isAuthenticated) {
                window.location.href = '/checkout';
            } else {
                window.location.href = '/login';
            }
        },
        error: function(xhr, status, error) {
            console.error('Error updating cart data:', error);
        }
    });
}

// Event listener for checkout button
$('#buyNow').on('click', function () {
    $(this).prop('disabled', true);

    addDataToCartAndRedirect();
});
