//  /**=====================
//      My Cart js
// ==========================**/

$(document).on("click",".card-btn",function() {

    // Calculate the total amount in the cart

    var totalAmount = 0;

    var price = $(this).closest('.product').find('.product_price').val();
    var quantity = $(this).closest('.product').find('.qty-input').val();
    var discount = $(this).closest('.product').find('.discount').val() || 0;
    
    if (!isNaN(price) && !isNaN(quantity)) {
        totalAmount += price * quantity;
    }
   
    $('.cart-total').text('Total: ' + totalAmount);

    // Store item in database
    var productId = $(this).closest('.product').find('.product_id').val();

    $.ajax({
        url: '/add-to-cart',
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: productId,
            price: price,
            quantity: quantity,
            discount: discount
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
        error: function (xhr, status, error) {
            notify('Opps! Something went wrong', 'danger');
        }
    });

});

/** ----------------------------------------------------------
    Quantity Checking with Increment & Decrement
---------------------------------------------------------- **/

$(".addcart-button").click(function () {
    $(this).next().addClass("open");
    $(".add-to-cart-box .qty-input").val('1');
});

$(document).on("click",".add-to-cart-box",function() {
// $('.add-to-cart-box').on('click', function () {
    var $qty = $(this).siblings(".qty-input");
    var currentVal = parseInt($qty.val());
    if (!isNaN(currentVal)) {
        $qty.val(currentVal + 1);
    }
});

$(document).on("input",".qty-input",function() {
//$('.qty-input').on('input', function() {
    var current_stock = $(this).closest('.product').find('.current_stock').val();
    var quantity = parseInt($(this).val());

    if (quantity < 1 || isNaN(quantity)) {
        $(this).val(1);
    } else if (quantity > current_stock) {
        $(this).val(current_stock);
    }
});

$(document).on("click",".qty-left-minus",function() {
    var $qty = $(this).siblings(".qty-input");
    var currentVal = parseInt($qty.val());

    if (!isNaN(currentVal) && currentVal > 1) {
        $qty.val(currentVal - 1);
    }

    if ($qty.val() == '1') {
        $(this).parents('.cart_qty').removeClass("open");
    }
});

$(document).on("click",".qty-right-plus",function() {
    var current_stock = $(this).closest('.product').find('.current_stock').val();

    var $qty = $(this).siblings(".qty-input");
    var currentVal = parseInt($qty.val());

    if (currentVal < current_stock) {
        $(this).prev().val(+$(this).prev().val() + 1);
    }
});
