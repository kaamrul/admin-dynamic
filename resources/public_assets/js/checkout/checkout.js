$(document).ready(function() {
    $('.btn-apply').click(function() {
        var button = $(this);

        var couponCode = button.prev().val();
        var sellerId = button.closest('.coupon-cart').find('.seller_id').val();
        var subTotal = button.closest('.coupon-cart').find('.sub_total').val();

        if (!couponCode) {
            $('.coupon-cart .coupon-message').remove();
            button.closest('.coupon-cart').append('<span class="coupon-message text-danger">Coupon code is required.</span>');

            return;
        }

        $('.coupon-cart .coupon-message').remove();

        $.ajax({
            type: 'POST',
            url: '/apply-coupon',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                sellerId: sellerId,
                coupon_code: couponCode,
                subTotal: subTotal,
            },
            success: function(response) {
                if (response.success) {
                    var couponDiscountElement = button.closest('.sellerItemFooter').find('.coupon-discount');
                    couponDiscountElement.text('Coupon Discount: ' + getFormattedAmount(response.discount_amount));

                    button.closest('.sellerItemFooter').find('.seller_coupon_discount').val(response.discount_amount);

                    notify('Coupon Applied Successfully', 'success');

                    updateOrderSummary();
                } else {
                    button.prev().val('');
                    button.closest('.sellerItemFooter').find('.coupon-discount').text('');
                    button.closest('.coupon-cart').append('<span class="coupon-message text-danger">' + response.message + '</span>');

                    button.closest('.sellerItemFooter').find('.seller_coupon_discount').val(0);

                    notify('Opps! Something went wrong', 'danger');

                    updateOrderSummary();
                }
            },
            error: function(xhr, status, error) {
                button.prev().val('');
                button.closest('.sellerItemFooter').find('.coupon-discount').text('');
                $('.coupon-message').text('An error occurred while applying the coupon: ' + error);

                button.closest('.sellerItemFooter').find('.seller_coupon_discount').val(0);

                notify('Opps! Something went wrong', 'danger');

                updateOrderSummary();
            }
        });

    });
});

updateOrderSummary();

// Function to update the order summary data
function updateOrderSummary() {
    var subtotal = 0;

    $('.checked-item').each(function() {
        var itemTotal = parseFloat($(this).find('.sub_total').val());
        subtotal += itemTotal;
    });

    var shippingCost = parseFloat($('.shipping-price').text().replace(/[^\d.-]/g, ''));
    var gstCost = (subtotal / 100) * 15;

    var total = subtotal + shippingCost;

    $('.summery-total .subtotal-price').text(getFormattedAmount(subtotal));
    $('.summery-total .shipping-price').text(getFormattedAmount(shippingCost));
    $('.summery-total .gst-price').text(getFormattedAmount(gstCost));
    $('.summery-total .total-price').text(getFormattedAmount(total));
}

function getFormattedAmount(amount) {
    var formattedAmount = amount.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2,
    });

    return formattedAmount;
}

// Event listener for remove button
$('.remove').on('click', function () {
    var $removeButton = $(this);
    var cartItemId = $removeButton.data('cart-item-id');

    // var confirmRemove = confirm('Are you sure you want to remove this item from your cart?');
    // if (confirmRemove) {
        $.ajax({
            url: '/cart-item-remove',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                cart_item_id: cartItemId
            },
            success: function(response) {
                notify(response.message, 'success');

                location.reload();
            },
            error: function(xhr, status, error) {
                notify('Opps! Something went wrong', 'danger');
            }
        });
    // }
});

// When the "Place Order" button is clicked
$('.btn-place-order').on('click', function() {
    var shippingAddress = $('input[name="defaultShipping"]:checked').val();

    if (!shippingAddress) {
        notify('Please select a shipping address.', 'danger');

        return;
    }

    var paymentMethod = $('input[name="payment_method"]').val();
    if (!paymentMethod) {
        notify('Please select a payment method.', 'danger');

        return;
    }

    $('.btn-place-order').attr('disabled', true);

    var cartData = [];

    $('.checkout-items').each(function(index, element) {
        var subTotal = $(element).find('input[name="sub_total"]').val();
        var quantity = $(element).find('input[name="quantity"]').val();
        var discount = $(element).find('input[name="discount"]').val();

        var data = {
            subTotal: subTotal,
            quantity: quantity,
            discount: discount,
        };

        cartData.push(data);
    });

    var subtotalPrice = parseFloat($('.subtotal-price').text().replace(/[^\d.-]/g, ''));
    var shippingPrice = parseFloat($('.shipping-price').text().replace(/[^\d.-]/g, ''));
    var gstPrice = parseFloat($('.gst-price').text().replace(/[^\d.-]/g, ''));
    var orderTotalPrice = parseFloat($('.orderTotalPrice').text().replace(/[^\d.-]/g, ''));
    var discount = parseFloat($('.discount').val());

    var obj = {};
    obj.cartData= cartData,
    obj.shippingAddress= shippingAddress,
    obj.subtotalPrice= subtotalPrice,
    obj.shippingPrice= shippingPrice,
    obj.gstPrice= gstPrice,
    obj.paymentMethod= paymentMethod,
    obj.orderTotalPrice= orderTotalPrice,
    obj.discount= discount,

    $('#sslczPayBtn').prop('postdata', obj);

    $.ajax({
        type: 'POST',
        url: '/place-order',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            cartData: cartData,
            shippingAddress: shippingAddress,
            subtotalPrice: subtotalPrice,
            shippingPrice: shippingPrice,
            gstPrice: gstPrice,
            paymentMethod: paymentMethod,
            orderTotalPrice: orderTotalPrice,
            discount: discount,
        },
        success: function(response) {
            if (response.success) {
                console.log(response);
                // if (!response.message) {
                //     notify("Place Order is Successful", 'success');
                // }
                //notify(response.message, 'success');

                window.location.href = response.data;
                //window.location.href = '/order-confirmation';
            } else {
                notify(response.message, 'danger');
            }
        },
        error: function(xhr, status, error) {
            notify('Opps! Something went wrong', 'danger');
        }
    });
});

$(document).ready(function() {
    function updateButton() {
        let addressSelected = $('.getAddress:checked').length > 0;
        let paymentMethodSelected = $('.payment_method:checked').length > 0;

        if (addressSelected && paymentMethodSelected) {
            $('.btn1').addClass('d-none');
            $('.btn2').removeClass('d-none');
        } else {
            $('.btn1').removeClass('d-none');
            $('.btn2').addClass('d-none');
        }
    }

    $('.shipping-area').change(function() {
        let selectedArea = $(this).val();
        var subTotal = $('input[name="sub_total"]').val();
        var gstPrice = parseFloat($('.gst-price').text().replace(/[^\d.-]/g, ''));

        if (selectedArea && subTotal) {
            $('.summery-total .shipping-price').text(`$ ${selectedArea}`);
            $('.summery-total .total-price').text(`$ ${ parseFloat(subTotal) + parseFloat(selectedArea) }`);
            $('.btn-place-order').attr('disabled', false)
        }
    });

    $('.getAddress').change(function() {
        if ($(this).is(':checked')) {
            let address_id = $(this).attr('id').replace('defaultShipping', '')
            let inputFiled = $(this);

            $.ajax({
                url: '/defaultShipping',
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: address_id
                },
                success: function(response) {
                    $('.summery-total .shipping-price').text(getFormattedAmount(response.totalShippingCost));

                    $('.address-box').removeClass('active');
                    inputFiled.closest('.address-box').addClass('active');
                    $(".address-form-check").find(".deliver-card-active").addClass("d-none");

                    inputFiled.parent().append(
                        `<span class="deliver-card-active">
                            <span class="active-icon"><i class="fa-solid fa-check"></i></i></span>
                        </span>`
                    );

                    updateOrderSummary();
                    updateButton();

                    notify('Successfully Update Default Address', 'success');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    notify('Something is wrong !!', 'danger');
                }
            });
        }
    });

    $('.payment_method').change(function() {
        $('#paymentMethod').val($(this).val());

        if ($(this).is(':checked')) {
            $('.active1').addClass('d-none');
            $('.payment-method-box').removeClass('active')
            $(this).closest('.payment-method-box').addClass('active')

            $(this).parent().append(
                `<span class="deliver-card-active active1">
                    <span class="active-icon"><i class="fa-solid fa-check"></i></i></span>
                </span>`
            );

            updateButton();
        }
    })

    updateButton();

});
