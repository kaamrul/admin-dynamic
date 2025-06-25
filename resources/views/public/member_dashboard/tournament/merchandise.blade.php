@extends('public.member_dashboard.dashboard_master')
@section('title', 'Tournament | Team Details')
@section('tournament', 'active')
@section('current', 'active')

@section('member_content')

@php
    use App\Library\Enum;
@endphp

<div class="row ">
    <div class="col-md-12 content-area pt-3 table-responsive">

        <h2>Merchandises</h2>
        <hr>

        {{-- <input type="hidden" value="{{ $tournament_team->id }}" id="tournamentTeamId"> --}}

        <div class="row mt-4">
            <div class="col-md-12">
                <form action="{{ route('member.dashboard.tournament.merchandise.buy', $tournament_team->id) }}" method="POST">
                    @csrf
                    @if ($merchandises?->count())
                        @php
                            $cart_identifier = $tournament->id . '-' . auth()->id();
                            $carts = App\Models\Cart::where('cart_identifier', $cart_identifier)->delete();
                        @endphp
                        <div class="card mt-4">
                            <div class="card-body">
                                <h5>Merchandise</h5>
                                <div class="w-100">
                                    @foreach ($merchandises ?? [] as $product)
                                        <div class="w-100 angler-item product_item_parent">
                                            <div
                                                class="w-100 d-flex align-items-center justify-content-between border p-2 mt-2 px-3">
                                                <div class="product_item" style="cursor: pointer; width: 70%">
                                                    <h5 class="m-0">{{ $product->title }}</h5>
                                                    <input type="hidden" name="product_id[]"
                                                        value="{{ $product->id }}" class="product_id" />
                                                </div>
                                                <div class="d-flex align-items-center gap-4">
                                                    <p class="m-0">
                                                        Qantity <span class="qtyx-{{ $product->id }}">0</span>
                                                        : (<span class="amountx-{{ $product->id }}">0</span>)
                                                        <span style="cursor: pointer;"
                                                            class="delete-{{ $product->id }}"></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="card mt-4" style="border: none;">
                        <div class="card-body">
                            <div id="details">

                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 mt-lg-0 d-none" id="shipping">
                        <div class="card-body">
                            <h5>Shipping Area</h5>
                            <div class="row">
                                <div class="col-4">
                                    <select class="form-select shipping-area form-control" name="shipping_area"
                                        id="shipping_area">
                                        <option value="" selected>Select Area</option>
                                        @foreach (App\Models\DeliveryType::get() ?? [] as $deliveryType)
                                            <option value="{{ $deliveryType->value }}">
                                                {{ $deliveryType->name }}-(${{ $deliveryType->value }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-8">
                                    <input style="width: 100%" class="address form-control" type="text"
                                        name="shipping_address" placeholder="Enter shipping Address" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Payment Summary</h5>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Total: </span>
                                    <span id="amount">$0</span>
                                    <input type="hidden" name="amount" id="hiddenAmount" value="0" />
                                </div>
                            </div>
                            <button id="pay" style="float: right;" class="btn btn-primary" disabled>Pay</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('public.member_dashboard.tournament.modal_create')
@include('admin.assets.select2')
@endsection


@include('admin.assets.select2')

@push('scripts')
    <script>
        var amount = parseFloat(0);
        var productAmount = parseFloat(0);
        var previousValue = 0;

        $(document).ready(function() {
            $("#select-angler").select2({
                placeholder: "Select angler",
                allowClear: true
            });
        });

        $(document).on('click', '.product_item', function(e) {
            var productId = $(this).find('.product_id').val();

            //$('#details').empty();

            $.ajax({
                url: BASE_URL + "/store/product/" + productId + "/details2",
                method: 'get',
                success: function(response) {
                    if (response) {
                        $('#details').fadeOut(300).promise().done(function() {
                            $(this).empty().append(response).fadeIn(300);
                        });
                        //$('#details').append(response);
                    }
                }
            });

        });

        function updateTotal(x) {
            amount = 0;
            amount += parseFloat(previousValue)

            if (x != 0) {
                amount += parseFloat(x);
            } else {
                var tournamentId = {{ $tournament->id }}

                $.ajax({
                    url: BASE_URL + "/get-tournament-cart/" + tournamentId,
                    method: 'get',
                    success: function(response) {
                        if (response && response.carts) {

                            productAmount = 0;

                            $('.product_id').each(function() {
                                const productId = $(this).val();
                                let totalQuantity = 0;
                                let totalAmount = 0;

                                response.carts.forEach(cart => {
                                    if (cart.product_id == productId) {
                                        totalQuantity += cart.quantity;
                                        totalAmount += cart.price * cart.quantity;
                                    }
                                });

                                if (totalQuantity > 0) {
                                    productAmount += parseFloat(totalAmount);
                                } else {
                                    //
                                }
                            });
                        } else {
                            console.error("Response or carts not available.");
                        }
                    }
                });
                amount += parseFloat(productAmount);
            }

            // Update the displayed and hidden amounts
            $('#amount').text('$' + amount.toFixed(2));
            $('#hiddenAmount').val(amount.toFixed(2));

            if (amount > 0) {
                $('#pay').attr('disabled', false)
            } else {
                $('#pay').attr('disabled', true)
            }
        }

        function changeAttribute(product_id) {
            var attributes = $(".product-form").serializeArray();

            $.ajax({
                url: BASE_URL + "/store/products/variant",
                method: 'get',
                data: {
                    product_id: product_id,
                    attributes: attributes,
                },
                dataType: 'json',
                success: function(response) {

                    if (response !== '') {
                        if (response.current_stock > 0) {
                            $('#addToCart').attr('disabled', false)
                            $('#buyNow').attr('disabled', false)
                        } else {
                            $('#addToCart').attr('disabled', true)
                            $('#buyNow').attr('disabled', true)
                        }

                        selectedImage = response?.image;

                        if (selectedImage) {
                            $('.product-img img').attr('src', selectedImage);
                        }

                        $("#stock_badge").html(response.stock_badge);
                        $('#product_quantity').prop('max', response.current_stock);
                        $('#product_quantity').val(1);

                        if (parseInt(response.has_discount) === 1) {
                            $("#price").html(`${response.discounted_price} $`);
                            $("#without_discount_price").text(response.price);
                            $("#discount_info").html(response.discounted_info);
                        } else {
                            $("#price").html(response.price);
                        }

                        $(".unit_price").val(response.price.replace(/[$,]/g, ''));
                    }

                }
            });
        };

        $(document).on("click", "#closeCart", function(e) {
            $('#details').fadeOut(300, function() {
                $(this).empty().fadeIn(300);
            });
        });

        $(document).on("click", "#addToCart", function(e) {
            e.preventDefault();
            var productId = $('input[name="product_id"]').val();
            var unitPrice = $('input[name="unit_price"]').val();
            var quantity = parseInt($('.qty-input').val());
            var discount = $('input[name="discount"]').val();
            var selectedColor = $('input[name="color"]:checked').val();
            var selectedVariants = [];
            var tournament_id = {{ $tournament->id }}

            $('input[type="radio"].attribute:checked').each(function() {
                selectedVariants.push($(this).val());
            });

            $.ajax({
                url: '/tournament-add-to-cart',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_id: productId,
                    quantity: quantity,
                    price: unitPrice,
                    discount: discount,
                    color: selectedColor,
                    variants: selectedVariants,
                    tournament_id: tournament_id
                },
                success: function(response) {
                    if (response && response.carts) {
                        $('#shipping').removeClass('d-none')
                        $('.shipping-area').attr('required', true);
                        $('.address').attr('required', true);
                        // Loop through each product_id input element
                        productAmount = 0
                        $('.product_id').each(function() {
                            const productId = $(this).val();
                            let totalQuantity = 0;
                            let totalAmount = 0;

                            // Loop through all carts and sum up the quantities and amounts for the same product_id
                            response.carts.forEach(cart => {
                                if (cart.product_id == productId) {
                                    // Accumulate the total quantity and amount
                                    totalQuantity += cart.quantity;
                                    totalAmount += cart.price * cart.quantity;
                                }
                            });

                            // If there was a match for the product_id, update the DOM
                            if (totalQuantity > 0) {
                                productAmount += parseFloat(totalAmount);
                                $('.qtyx-' + productId).text(totalQuantity);
                                $('.amountx-' + productId).text(`$${totalAmount.toFixed(2)}`);
                                deleteBtn = '<i onclick="deleteItem(' + productId + ',' +
                                    totalAmount +
                                    '  )" style="margin-left: 10px;" class="text-danger fas fa-trash-alt"></i>'
                                $('.delete-' + productId).html(deleteBtn)
                            } else {
                                //
                            }
                        });
                        updateTotal(productAmount)
                    } else {
                        console.error("Response or carts not available.");
                    }


                    $('#details').fadeOut(300, function() {
                        $(this).empty().fadeIn(300);
                    });
                    return;

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
                        var newItem = $('<li><img src="' + cartItem.thumbnail_image_url +
                            '" alt=""></li>');
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
                    var headerCart = $(
                        '<span class="position-absolute top-0 start-100 translate-middle badge cartItemTotal">' +
                        itemCount + ' <span class="visually-hidden">unread messages</span> </span>');
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

        $(document).on('click', '.plus', function() {
            var input = $(this).closest('.product-qty').find('.qty-input');
            var maxValue = parseInt(input.attr('max'));
            var inputValue = parseInt(input.val());

            if (inputValue < maxValue && !input.is('[readonly]')) {
                input.val(inputValue + 1);
                input.trigger('change');
            } else {
                input.val(maxValue);
            }
        });

        $(document).on('click', '.minus', function() {
            var input = $(this).closest('.product-qty').find('.qty-input');
            var inputValue = input.val();

            if (inputValue > 1 && !input.is('[readonly]')) {
                input.val(parseInt(inputValue) - 1);
                input.trigger('change');
            }
        });

        $(document).on('keyup', '.qty-input', function() {
            var input = $(this).closest('.product-qty').find('.qty-input');
            var minValue = parseInt($(this).attr('min'));
            var maxValue = parseInt($(this).attr('max'));
            var inputValue = $(this).val();

            if (inputValue < minValue || inputValue > maxValue) {
                $(this).val(1);
                input.trigger('change');
            }
        });

        function deleteItem(id, totalAmount) {
            $.ajax({
                url: '/cart-item-remove2',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    cart_item_id: id
                },
                success: function(response) {
                    $('.qtyx-' + id).closest('.product_item_parent').empty();

                    amount -= totalAmount;

                    // Update the displayed and hidden amounts
                    $('#amount').text('$' + amount.toFixed(2));
                    $('#hiddenAmount').val(amount.toFixed(2));

                    if (!response.carts.length) {
                        $('#shipping').addClass('d-none')
                        $('.shipping-area').attr('required', false);
                        $('.address').attr('required', false);
                    }
                },
                error: function(xhr, status, error) {
                    //notify('Opps! Something went wrong', 'danger');
                }
            });
        };

        $(document).on('change', '#shipping_area', function() {
            var selectedValue = parseFloat($(this).val());
            amount -= previousValue;

            amount += selectedValue;

            previousValue = selectedValue;

            // Update the displayed and hidden amounts
            $('#amount').text('$' + amount.toFixed(2));
            $('#hiddenAmount').val(amount.toFixed(2));

        });
    </script>
@endpush
