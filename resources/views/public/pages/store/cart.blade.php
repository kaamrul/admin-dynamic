@extends('public.layout.master')
@section('title', 'Cart')
@section('store', 'active')

@section('content')

    <main id="main">
        <section class="cart-section section-b-space">
            <div class="container">
                @if (count($carts) > 0)
                    <div class="row g-sm-5 g-3">
                        <div class="col-xxl-9">
                            <div class="cart-table">
                                <div class="table-responsive-xl">
                                    <table class="table">
                                        <tbody>
                                            @foreach ($carts as $cartItem)
                                                <tr class="product-box-contain cartItems">
                                                    <td class="product-detail">
                                                        <div class="product-left border-0">
                                                            <a href="{{ route('store.product.details', $cartItem->product->slug) }}"
                                                                class="cart-product">
                                                                <img src="{{ $cartItem->product->getThumbnailImage() }}"
                                                                    class="img-fluid h-100 w-100 blur-up lazyload"
                                                                    alt="">
                                                            </a>
                                                            <div class="product-detail">
                                                                <a
                                                                    href="{{ route('store.product.details', $cartItem->product->slug) }}">
                                                                    <p class="m-0 text-nowrap">
                                                                        {{ \Illuminate\Support\Str::limit($cartItem->product->title, 25) }}
                                                                    </p>
                                                                </a>
                                                            </div>
                                                            <input type="hidden" name="cart_id" class="cart_id"
                                                                value="{{ $cartItem->id }}">
                                                            <input type="hidden" name="product_id" class="product_id"
                                                                value="{{ $cartItem->product_id }}">
                                                            <input type="hidden" name="user_id" class="user_id"
                                                                value="{{ authUser()?->id }}">
                                                        </div>
                                                    </td>

                                                    <td class="price">
                                                        <h4 class="table-title text-content">Price</h4>
                                                        <h5>
                                                            {{ getFormattedAmount(
                                                                $cartItem->product->calculatePriceAfterDiscount($cartItem->price) - $cartItem->ezzico_discount,
                                                            ) }}
                                                            @if ($cartItem->product->has_discount)
                                                                <del class="text-content"
                                                                    style="font-size: 13px">{{ getFormattedAmount($cartItem->price) }}</del>
                                                            @endif
                                                        </h5>
                                                        <input type="hidden" class="cart-price"
                                                            value="{{ $cartItem->price }}">

                                                        @if ($cartItem->product->has_discount)
                                                            <span class="theme-color" style="font-size: 14px">Save :
                                                                {{ getFormattedAmount($cartItem->price - $cartItem->product->calculatePriceAfterDiscount($cartItem->price)) }}
                                                            </span>
                                                        @endif
                                                    </td>

                                                    <td class="quantity">
                                                        <h4 class="table-title text-content">Qty</h4>
                                                        <div class="quantity-price">
                                                            <div class="cart_qty">
                                                                <div class="input-group">
                                                                    <button type="button" class="btn qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus ms-0"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity"
                                                                        value="{{ $cartItem->quantity }}">
                                                                    <button type="button" class="btn qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus ms-0"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <input type="hidden" name="price" class="unitPrice"
                                                        value="{{ $cartItem->product->calculatePriceAfterDiscount($cartItem->price) - $cartItem->ezzico_discount }}">
                                                    <input type="hidden" name="current_stock" class="current_stock"
                                                        value="{{ $cartItem->product->current_stock }}">

                                                    @php
                                                        $itemSubTotal =
                                                            $cartItem->product->calculatePriceAfterDiscount(
                                                                $cartItem->price
                                                            )*$cartItem->quantity;
                                                    @endphp

                                                    <td class="subtotal">
                                                        <h4 class="table-title text-content mb-1">Total</h4>
                                                        <h5 class="item-total">{{ getFormattedAmount($itemSubTotal) }}</h5>
                                                        <div>
                                                            {{-- @if ($cartItem->quantity <= $cartItem->product->current_stock) --}}
                                                            @if (true)
                                                                <h6 class="text-success mt-2">In Stock</h6>
                                                                <input type="hidden" name="isStockOut" class="isStockOut"
                                                                    value="0">
                                                            @else
                                                                <h6 class="text-danger mt-2">Stock Out</h6>
                                                                <input type="hidden" name="isStockOut" class="isStockOut"
                                                                    value="1">
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <td class="save-remove">
                                                        <h4 class="table-title">Action</h4>
                                                        <a href="#" class="remove text-danger"
                                                            data-cart-item-id="{{ $cartItem->id }}"><i
                                                                class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-3">
                            <div class="summery-box p-sticky">
                                <div class="summery-header">
                                    <h3>Order Summary</h3>
                                </div>

                                <div class="summery-contain">
                                    <ul class="p-0">
                                        <li class="subtotal">
                                            <h4>Subtotal</h4>
                                            <h4 class="price">$0.00</h4>
                                        </li>

                                        <li class="align-items-start shipping">
                                            <h4>Shipping</h4>
                                            <h4 class="price text-end">$0.00</h4>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="summery-total">
                                    <li class="list-total border-top-0 cartTotal">
                                        <h4>Total (NZD)</h4>
                                        <h4 class="price theme-color">$0.00</h4>
                                    </li>
                                </ul>

                                <div class="button-group cart-button">
                                    <ul class="p-0">
                                        <li>
                                            {{-- <button id="checkoutButton" class="btn process-btn btn-animation proceed-btn fw-bold {{ count($carts) > 0 && $cartItem->quantity <= $cartItem->product->current_stock ? '' : 'disabled' }}">Proceed To Checkout</button> --}}
                                            <button id="checkoutButton" class="btn process-btn btn-animation proceed-btn fw-bold {{ count($carts) > 0 ? '' : 'disabled' }}">Proceed To Checkout</button>
                                        </li>

                                        <style>
                                            .button-group ul li a.shopping-button {
    font-size: calc(13px +(14 - 13)*((100vw - 320px) /(1920 - 320)));
    background-color: #ececec;
    color: #000;
    border: 1px solid var(--color-primary);
}

.button-group ul li a {
    width: 100%;
    font: inherit;
    letter-spacing: 0.04em;
    padding: calc(8px +(12 - 8)*((100vw - 320px) /(1920 - 320))) calc(14px +(20 - 14)*((100vw - 320px) /(1920 - 320)));
}
                                        </style>

                                        <li>
                                            <a href="/store/products"
                                                class="btn btn-light shopping-button text-dark">
                                                <i class="fa-solid fa-arrow-left-long"></i> Return To Shopping</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row g-sm-5 g-3" style="height: 300px; display:flex; align-items: center;">
                        <div class="col-xxl-12">
                            <div class="text-center">
                                <p>There are no items in this cart</p>

                                <a class="shopping-button" href="{{ route('store.index') }}">
                                    <button class="btn btn-light">
                                        Continue Shopping
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </main>
@stop

@push('scripts')
    @vite('resources/public_assets/js/cart/cart.js')
@endpush
