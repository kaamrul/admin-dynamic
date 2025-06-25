@extends('public.layout.master')
@section('title', 'Checkout')
@section('store', 'active')

@section('content')

    <main id="main">
        <section class="checkout-section section-b-space">
            <div class="container">
                <div class="row g-sm-5 g-3">
                    <div class="col-xxl-9">
                        <div class="row">
                            <div class="col-12">

                                <div class="address-add" style="width: 20%; float: right;">

                                    <button data-bs-toggle="modal" data-bs-target="#add-address" class="btn theme-bg-color btn-md w-100 fw-bold">
                                        <i class="fa fa-location-dot"></i> Add Address</button>
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row g-3 mt-0">
                                    @if ($addresses->count() > 0)
                                        @foreach ($addresses as $address)
                                            <div class="col-xl-6 col-md-6">
                                                <label for="defaultShipping{{ $address->id }}" class="w-100" style="cursor: pointer;">
                                                    <div class="address-box {{ $address->primary ? 'active' : '' }}  shadow-lg">
                                                        <div class="position-relative">
                                                            <div class="table-responsive address-table">
                                                                <table class="table m-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="w-100">{{ $address->full_address }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="position-absolute end-0 top-0 me-2">
                                                                    <div class="dropdown">
                                                                        <button class=" btn bg-transparent text-dark p-1"
                                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                        </button>

                                                                        <ul class="dropdown-menu address-dropdown">
                                                                            <div><a class="dropdown-item theme-color"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#update-address{{ $address->id }}">Edit</a>
                                                                            </div>
                                                                            <div><a class="dropdown-item text-danger"
                                                                                    href="{{ route('checkout.address.delete', $address->id) }}">Delete</a>
                                                                            </div>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="position-absolute top-0">
                                                                    <div class="address-form-check m-0">
                                                                        <input class="form-check-input getAddress d-none"
                                                                            type="radio" value="{{ $address->id }}"
                                                                            name="defaultShipping"
                                                                            id="defaultShipping{{ $address->id }}"
                                                                            {{ $address->primary ? 'checked' : '' }}>
                                                                        @if ($address->primary)
                                                                            <span class="deliver-card-active">
                                                                                <span class="active-icon"><i
                                                                                        class="fa-solid fa-check"></i></span>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class=" col-md-12 shadow-lg p-2 text-center mx-auto">
                                            <h6>Address are not available......</h6>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="">
                            <div class="checked-item">
                                <div>
                                    @php
                                        $subtotal = 0;
                                        $quantity = 0;
                                        $discount = 0;
                                    @endphp
                                    @foreach ($cartDatas as $cartData)
                                        <div class="row pb-2 mb-2 border-bottom">
                                            <div class="col-md-7">
                                                <div class="d-md-flex flex-column flex-md-row align-items-center gap-2">
                                                    <div>
                                                        <div class="text-center text-md-start mb-2 mb-md-0 checkout-img">
                                                            <img alt="user" class="img-fluid w-100 h-100"
                                                                src="{{ $cartData->product->getThumbnailImage() }}">
                                                        </div>
                                                    </div>

                                                    <div class="text-center text-md-start">
                                                        <p>{{ \Illuminate\Support\Str::limit($cartData->product->title, 60) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="h-100 d-flex justify-content-between align-items-center">
                                                    <p class="m-0">Qty: {{ $cartData->quantity }}</p>
                                                    <button class="border-0 bg-transparent text-danger remove"
                                                        data-cart-item-id="{{ $cartData->id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                    <div style="width: 150px; text-align: end;">
                                                        @if ($cartData->product->has_discount)
                                                            <span class="price-box">
                                                                <del>{{ getFormattedAmount($cartData->price) }}</del>
                                                            </span>
                                                        @endif
                                                        <span
                                                            class="ms-2">{{ getFormattedAmount($cartData->product->calculatePriceAfterDiscount($cartData->price) * $cartData->quantity) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $subtotal += $cartData->quantity * $cartData->product->calculatePriceAfterDiscount($cartData->price);

                                            $quantity += $cartData->quantity;

                                            if ($cartData->product->has_discount) {
                                                $discount += $cartData->price * $cartData->quantity - $cartData->quantity * $cartData->product->calculatePriceAfterDiscount($cartData->price);
                                            }
                                        @endphp
                                    @endforeach
                                </div>

                                <input type="hidden" name="sub_total" value="{{ $subtotal }}" class="sub_total">
                                <input type="hidden" name="quantity" value="{{ $quantity }}"
                                    class="quantity">
                                <input type="hidden" name="discount" class="discount"
                                    value="{{ $discount }}">
                                <input class="form-check-input payment_method" type="hidden" name="payment_method" id="onlinePayment" value="onlinePayment">
                                {{-- <div class="d-flex justify-content-between align-items-center gap-3 mt-4">
                                    <div class="delivery-card opacity-0">
                                        <span class="deliver-card-active">
                                            <span class="active-icon"><i class="fa-solid fa-check"></i></i></span>
                                        </span>
                                        <div class="delivery-title d-flex justify-content-between align-items-center gap-2">
                                            <h4>Delivery Title</h4>
                                            <span>৳85</span>
                                        </div>
                                        <p>Receive by 2 Apr - 9 Apr</p>
                                    </div>
                                    <div class="voucher-box d-flex align-items-center gap-4 opacity-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <p><i class="fa-solid fa-ticket-simple"></i></p>
                                            <p>Store Voucher</p>
                                        </div>
                                        <button class="d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#voucher">
                                            <p>Get Voucher</p>
                                            <p><i class="fa-solid fa-angle-right"></i></p>
                                        </button>
                                    </div>
                                    <div class="total-price">
                                        <div class="shop-total-info">
                                            <span>1(Items).&nbsp;Subtotal:</span>
                                            <span class="shop-amount">$ 188</span>
                                        </div>
                                        <div>
                                            <h4>Saved $ 145</h4>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3">
                        <div class="summery-box p-4">
                            <div class="d-flex justify-content-between align-items-center border-bottom border-top py-2">
                                <h5 class="m-0">Shipping Area</h5>
                                <div class="w-50">
                                    <select class="form-select shipping-area" name="shipping-area">
                                        <option selected disabled>Select Area</option>
                                        @foreach ($deliveryTypes as $deliveryType)
                                            <option value="{{ $deliveryType->value }}">{{ $deliveryType->name }}-(${{ $deliveryType->value }})</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                        </div>
                        <div class="summery-box p-4">
                            <h3 class="text-center mb-2">Order Summary</h3>
                            <ul class="summery-total p-0">
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price subtotal-price">$0.00</h4>
                                </li>

                                <li>
                                    <h4>Shipping</h4>
                                    <h4 class="price shipping-price">$0.00</h4>
                                </li>


                                <li class="list-total">
                                    <h4 style="font-size: 20px;">Total (NZD)</h4>
                                    <h4 style="font-size: 20px;" class="price total-price orderTotalPrice">$0.00</h4>
                                </li>

                                <li>
                                    <h4 style="font-size: 18px;">GST</h4>
                                    <h4 style="font-size: 18px;" class="price gst-price">$0.00</h4>
                                </li>
                            </ul>
                            <button class="btn theme-bg-color btn-place-order order-btn btn-md w-100 mt-4 fw-bold" disabled >Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('public.components.side_cart')
        @include('public.pages.store.partials.addressModal')
        @include('public.pages.store.partials.updateAddress')
    </main>
@stop

@push('scripts')
    @vite('resources/public_assets/js/checkout/checkout.js')
@endpush

@push('styles')
    <style>
        .btn-place-order:hover{
            color: #fff;
        }
    </style>
@endpush
