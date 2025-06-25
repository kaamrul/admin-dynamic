@extends('public.layout.master')
@section('title', 'Team Details')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    {!! \App\Library\Html::breadcrumbsSection('Team Details') !!}
    <!-- End Breadcrumbs -->

    <section>
        <div class="container my-4 team-details">
            <div class="row">
                <div class="col-lg-8 offset-2">
                    <form action="{{ route('member.dashboard.tournament.enroll', $tournament->id) }}" method="POST">
                        @csrf
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="text-center">Team Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 border p-3 overflow-x-auto">
                                    <h5 class="mb-3">Tournament Details</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="px-4">Tournament Name</th>
                                                <th class="px-4">Tournament Type</th>
                                                <th class="px-4">Start Date</th>
                                                <th class="px-4">End Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $tournament->tournament_name }}</td>
                                                <td class="text-capitalize">{{ $tournament->tournament_type }}</td>
                                                <td>{{ date('D, jS M Y  h:i A', strtotime($tournament->start_date)) }}</td>
                                                <td>{{ date('D, jS M Y  h:i A', strtotime($tournament->end_date)) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mb-3 border p-3 overflow-x-auto">
                                    <h5 class="mb-3">Team Details</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="px-4">Team Name</th>
                                                <th class="px-4">Boat</th>
                                                <th class="px-4">Skipper</th>
                                                <th class="px-4">Team Captain</th>
                                                <th class="px-4">Paid By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @php
                                                    $amount = 0;
                                                    $captainAmount = 0;
                                                    $paidByAmount = 0;

                                                    if ($team['captain']?->user?->user_type == 'non-club-member') {
                                                        $captainAmount = str_replace('$', '', getFormattedMemberFee($tournament, 'non-club-member'));
                                                    } elseif (
                                                        $team['captain']?->user?->user_type == 'affiliated-club-member'
                                                    ) {
                                                        $captainAmount = str_replace('$', '', getFormattedMemberFee($tournament, 'affiliated-club-member'));
                                                    } elseif ($team['captain']?->user?->user_type == 'member') {
                                                        $captainAmount = str_replace('$', '', getFormattedMemberFee($tournament, 'member'));
                                                    }

                                                    // if ($team['captain']->user->id != authId()) {
                                                    //     if (auth()->user()->user_type == 'non-club-member') {
                                                    //         $paidByAmount = str_replace('$', '', getFormattedMemberFee($tournament, 'non-club-member'));
                                                    //     } elseif (
                                                    //         auth()->user()->user_type == 'affiliated-club-member'
                                                    //     ) {
                                                    //         $paidByAmount = str_replace('$', '', getFormattedMemberFee($tournament, 'affiliated-club-member'));
                                                    //     } elseif (auth()->user()->user_type == 'member') {
                                                    //         $paidByAmount = str_replace('$', '', getFormattedMemberFee($tournament, 'member'));
                                                    //     }
                                                    // }

                                                @endphp
                                                <td>{{ $team['name'] }}</td>
                                                <td>{{ $team['boat_name'] }}</td>
                                                <td>{{ $team['skipper']?->full_name }}</td>
                                                <td>{{ $team['captain']?->user?->full_name }}
                                                    {{ $tournament->tournament_type != 'boat' ? '($' . $captainAmount . ')' : '' }}
                                                </td>
                                                <td>{{ auth()->user()->full_name }}
                                                    {{-- {{ $tournament->tournament_type != 'boat' ? '($' . $paidByAmount . ')' : '' }} --}}
                                                </td>

                                                <input type="hidden" name="skipper_id"
                                                    value="{{ $team['skipper']?->id }}" />
                                                <input type="hidden" name="captain_id"
                                                    value="{{ $team['captain']?->id }}" />
                                                {{-- <input type="hidden" name="team_id" value="{{ $team->id }}"/> --}}
                                                <input type="hidden" name="tournament_id" value="{{ $tournament->id }}" />

                                                <input type="hidden" id="captainAmount" value="{{ $captainAmount }}" />
                                                <input type="hidden" id="paidByAmount" value="{{ $paidByAmount }}" />

                                                <input type="hidden" id="non_club_member_fee"
                                                    value="{{ str_replace('$', '', getFormattedMemberFee($tournament, 'non-club-member')) }}" />
                                                <input type="hidden" id="affiliated_club_member_fee"
                                                    value="{{ str_replace('$', '', getFormattedMemberFee($tournament, 'affiliated-club-member')) }}" />
                                                <input type="hidden" id="club_member_fee"
                                                    value="{{ str_replace('$', '', getFormattedMemberFee($tournament, 'member')) }}" />
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mb-3 border p-3">
                                    <h5 class="mb-3">Team Angler</h5>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <select class="form-select" id="select-angler">
                                                <option value="">Select angler</option>
                                                @foreach ($users as $user)
                                                    @if ($user->id == $team['captain']?->user?->id)
                                                        @continue
                                                    @endif

                                                    <option value="{{ $user?->member?->id }}">{{ $user->full_name }} -
                                                        {{ $user->user_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <h6 class="mt-3">Pay for my Team</h6>
                                    <div id="angler-list">

                                    </div>

                                    <select class="form-control d-none" id="hiddenAnglerList" name="anglers[]" multiple>

                                    </select>
                                </div>

                                <div class="mb-4 border p-3">
                                    <h5 class="mb-3">Invite Member</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="email-container">
                                                <div class="w-100 d-flex align-items-center gap-4 email-field mb-3">
                                                    <div class="w-100">
                                                        <input type="email" class="form-control" name="emails[]"
                                                            placeholder="Enter Email">
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-outline-secondary btn-sm"
                                                            id="addEmail">+</button>
                                                        <button class="btn bg-danger btn-danger btn-sm deleteEmail"
                                                            style="display: none;">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($sweepstakes?->count())
                            <div class="card mt-4 mt-lg-0">
                                <div class="card-body">
                                    <h5>Sweepstakes</h5>
                                    <div class="w-100">
                                        @foreach ($sweepstakes ?? [] as $sweepstake)
                                            <label for="sweepstake1" class="w-100 angler-item"
                                                data-value="${selectedValue}">
                                                <div
                                                    class="w-100 d-flex align-items-center justify-content-between border p-2 mt-2 px-3">
                                                    <h5 class="m-0">{{ $sweepstake->name }}</h5>
                                                    <div class="d-flex align-items-center gap-4">
                                                        <p class="m-0">${{ $sweepstake->amount }}</p>
                                                        <input type="checkbox" class="sweepstake sweepstake-checkbox"
                                                            data-amount="{{ $sweepstake->amount }}"
                                                            value="{{ $sweepstake->id }}" name="sweepstake_id[]"
                                                            id="sweepstake{{ $sweepstake->id }}">
                                                    </div>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($products?->count())

                            @php
                                $cart_identifier = $tournament->id . '-' . auth()->id();
                                $carts = App\Models\Cart::where('cart_identifier', $cart_identifier)->delete();
                            @endphp
                            <div class="card mt-4">
                                <div class="card-body">
                                    <h5>Merchandise</h5>
                                    <div class="w-100">
                                        @foreach ($products ?? [] as $product)
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
                                <button class="btn btn-primary">Pay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
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

            // Add placeholder to the search input
        $('#select-angler').on('select2:open', function() {
                // Use a small timeout to allow the Select2 elements to render
                setTimeout(function() {
                    $('.select2-search__field').attr('placeholder', 'Search'); // Add your search placeholder here
                }, 1);
            });

            var type = "{{ $tournament->tournament_type }}"
            var anglerFee = parseFloat(0);

            $(document).on('click', '#addEmail', function(e) {
                e.preventDefault();
                let currentEmailField = $(this).closest('.email-field');

                $(this).remove();
                currentEmailField.find('.deleteEmail').show();

                let emailField = currentEmailField.clone();
                emailField.find('input').val('');
                emailField.find('.deleteEmail').hide();
                emailField.find('.deleteEmail').before(
                    '<button class="btn btn-outline-secondary btn-sm" id="addEmail">+</button>');
                $('.email-container').append(emailField);
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

            $(document).on('click', '.deleteEmail', function(e) {
                e.preventDefault();
                $(this).closest('.email-field').remove();
            });

            if ($('.email-field').length === 1) {
                $('.deleteEmail').hide();
            }

            // angler start
            $('#select-angler').change(function() {
                var selectedValue = $(this).val();
                var selectedText = $('#select-angler option:selected').text();

                if (selectedValue) {
                    let anglerFeeHtml = ''
                    if (type != 'boat') {
                        let memberType = selectedText.split("-")[1].trim();
                        let non_club_member_fee = $('#non_club_member_fee').val();
                        let affiliated_club_member_fee = $('#affiliated_club_member_fee').val();
                        let club_member_fee = $('#club_member_fee').val();

                        if (memberType == 'non') {
                            anglerFee = non_club_member_fee;
                        } else if (memberType == 'affiliated') {
                            anglerFee = affiliated_club_member_fee;
                        } else if (memberType == 'member') {
                            anglerFee = club_member_fee;
                        }

                        amount += parseFloat(anglerFee);

                        anglerFeeHtml = '<p class="m-0">' + anglerFee + '</p>';

                        // Update the displayed and hidden amounts
                        $('#amount').text(amount.toFixed(2));
                        $('#hiddenAmount').val(amount.toFixed(2));
                    }

                    // Create a new div for the selected angler
                    var checkboxHtml =
                        `<input type="checkbox" checked onchange="updateTotal(0)" id="${selectedValue.replace('$', '')}" data-amount="${anglerFee}" name="angler[]" value="${selectedValue.replace('$', '')}" class="angler-checkbox form-check-input mt-0 me-2">`

                    if (type == 'boat') {
                        checkboxHtml = '';
                    }

                    var anglerItem = `
                    <label for="${selectedValue.replace('$', '')}" class="w-100 angler-item" data-value="${selectedValue.replace('$', '')}">
                        <div class="d-flex align-items-center border p-2 mt-2">
                                ${checkboxHtml}
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <p class="m-0">${selectedText}</p>
                                ${anglerFeeHtml}
                            </div>
                            <button style="margin-left: 20px" class="remove-angler btn bg-danger btn-danger btn-sm py-1 px-2" data-value="${selectedValue.replace('$', '')}" data-text="${selectedText}">-</button>
                        </div>
                    </label>
                `;

                    var h = `<option selected value="${selectedValue}">${selectedText}</option>`;

                    // Append the new div to the angler list
                    $('#angler-list').append(anglerItem);

                    $('#hiddenAnglerList').append(h);

                    // Remove the selected option from the dropdown
                    $('#select-angler option:selected').remove();
                    $('#select-angler').val(''); // Reset the dropdown to the default option
                }
            });

            // Event delegation to handle click event for dynamically added buttons
            $('#angler-list').on('click', '.remove-angler', function() {
                var anglerValue = $(this).data('value');
                var anglerText = $(this).data('text');

                // Remove the angler item from the list
                $(this).closest('.angler-item').remove();

                if (type != 'boat') {
                    let memberType = anglerText.split("-")[1].trim();
                    let non_club_member_fee = $('#non_club_member_fee').val().replace('$', '');
                    let affiliated_club_member_fee = $('#affiliated_club_member_fee').val().replace('$', '');
                    let club_member_fee = $('#club_member_fee').val().replace('$', '');

                    if (memberType == 'non') {
                        anglerFee = non_club_member_fee;
                    } else if (memberType == 'affiliated') {
                        anglerFee = affiliated_club_member_fee;
                    } else if (memberType == 'member') {
                        anglerFee = club_member_fee;
                    }

                    amount -= parseFloat(anglerFee);

                    $('#amount').text('$' + amount)
                    $('#hiddenAmount').val(amount)
                }

                // Add the removed angler back to the dropdown
                $('#select-angler').append(`<option value="${anglerValue}">${anglerText}</option>`);
            });

            if (type == 'boat') {
                amount = parseFloat("{{ str_replace('$', '', formatBoatAmount($tournament)) }}")
            } else {
                let captainAmount = $('#captainAmount').val().replace('$', '')
                let paidByAmount = $('#paidByAmount').val().replace('$', '')

                amount += parseFloat(captainAmount);
                amount += parseFloat(paidByAmount);
            }

            // Update the displayed and hidden amounts
            $('#amount').text('$' + amount.toFixed(2));
            $('#hiddenAmount').val(amount.toFixed(2));
        });

        function updateTotal(x) {
            var type = "{{ $tournament->tournament_type }}"

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

            if (type != 'boat') {
                const checkboxes = document.querySelectorAll('.angler-checkbox');
                // const checkboxes = document.querySelectorAll('input[type="checkbox"]');

                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        amount += parseFloat(checkbox.getAttribute('data-amount'));
                    }
                });
            }

            const checkboxes2 = document.querySelectorAll('.sweepstake-checkbox');
            // const checkboxes = document.querySelectorAll('input[type="checkbox"]');

            checkboxes2.forEach(checkbox => {
                if (checkbox.checked) {
                    amount += parseFloat(checkbox.getAttribute('data-amount'));
                }
            });

            if (type != 'boat') {
                let captainAmount = $('#captainAmount').val().replace('$', '')
                let paidByAmount = $('#paidByAmount').val().replace('$', '')

                amount += parseFloat(captainAmount);
                amount += parseFloat(paidByAmount);
            } else {
                amount += parseFloat("{{ str_replace('$', '', formatBoatAmount($tournament)) }}")
            }

            // Update the displayed and hidden amounts
            $('#amount').text('$' + amount.toFixed(2));
            $('#hiddenAmount').val(amount.toFixed(2));
        }

        $('.sweepstake-checkbox').change(function() {
            var productValue = parseFloat($(this).attr('data-amount'));

            if ($(this).is(":checked")) {
                // Add product value when checked
                amount += productValue;
            } else {
                // Subtract product value when unchecked
                amount -= productValue;
            }

            // Update the displayed and hidden amounts
            $('#amount').text('$' + amount.toFixed(2));
            $('#hiddenAmount').val(amount.toFixed(2));
        });

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
