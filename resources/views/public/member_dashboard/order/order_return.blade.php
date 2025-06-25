@extends('public.member_dashboard.dashboard_master')
@section('order', 'active')

@section('member_content')
@php
use \App\Library\Enum;
@endphp
<div class="dashboard-order">
    <div class="title">
        <h2>Order Return</h2>
    </div>

    <style>
        .table td {
    padding: 10px !important;
}
    </style>

    <div class="accordion accordion-box">
        <form method="POST" class="" action="{{ route('member.dashboard.order.return', $order->id) }}">
            @csrf
            <div class="accordion-item">
                <h5 class="p-2">
                    Status : {{$order->order_status}}
                </h5>
                <hr>

                <div class="table-responsive">

                    <table class="table order-table-{{$order->id}}">
                        <thead>
                        <tr>
                            <th style="width: 10%;">Image</th>
                            <th style="width: 30%;">Product</th>
                            <th style="width: 10%; text-align: center;">Price</th>
                            <th style="width: 10%; text-align: center;">Quantity</th>
                            <th style="width: 20%; text-align: center;">Return Quantity</th>
                            <th style="width: 10%; text-align: center;">Total</th>
                            <th style="width: 10%; text-align: center;">Choice</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails->load('product') as $orderDetails)
                            <tr  class="parent-row">
                                <td class="product-detail">
                                    <div class="product border-0 p-0">
                                        <div class="product-image" style="height: auto">
                                            <img src="{{$orderDetails->product->getThumbnailImage()}}"
                                                class="img-fluid blur-up lazyload" style="width: 100px; height:100px;" alt="">
                                        </div>

                                    </div>
                                </td>
                                <td style="text-align: left">

                                    {{\Illuminate\Support\Str::limit($orderDetails->product->title, 25)}}

                                    @if ($orderDetails?->load('productStock')?->productStock?->variant_ids)
                                        <br> <small>{{ getProductVariantValue($orderDetails?->productStock?->variant_ids) }}</small>
                                    @endif

                                </td>
                                @php
                                //     $discount = $orderDetails->product->discount($orderDetails->product->getPriceAfterDiscount());
                                // @endphp
                                <td class="price text-center">
                                    {{-- @if ($orderDetails->product->has_discount)
                                        <h6>{{ getFormattedAmount($orderDetails->product->getPriceAfterDiscount() - $ezzicoDiscount) }}</h6>
                                    @else
                                        <h6>{{ getFormattedAmount($orderDetails->product->unit_price - $ezzicoDiscount) }}</h6>
                                    @endif --}}
                                    <h6>{{ getFormattedAmount($orderDetails->sale_price) }}</h6>
                                </td>

                                <td class=" text-center">
                                    <h5 class="text-title">{{$orderDetails->quantity}}</h5>
                                </td>

                                <td class="quantity text-center">
                                    <div class="counter-number">
                                        <div class="counter quantity d-flex align-items-center">
                                            <div class="qty-left-minus minus" data-type="minus"
                                                data-field="">
                                                <i class="fa-solid fa-minus"></i>
                                            </div>
                                            <input class="form-control input-number w-50 qty-input return-qty"
                                                type="number" name="quantity[]"
                                                step="any" min="0" value="0"
                                                max="{{ $orderDetails->quantity }}" readonly>
                                            <div class="qty-right-plus plus" data-type="plus" data-field="">
                                                <i class="fa-solid fa-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="price text-center">
                                    {{-- <h5>$ {{ number_format($orderDetails->quantity * $orderDetails->product->unit_price, 2) }}</h5> --}}
                                    {{-- @if ($orderDetails->product->has_discount)
                                        <h6>{{ getFormattedAmount($orderDetails->quantity * $orderDetails->product->getPriceAfterDiscount() - $ezzicoDiscount) }}</h6>
                                    @else
                                        <h6>{{ getFormattedAmount($orderDetails->quantity * $orderDetails->product->unit_price - $ezzicoDiscount) }}</h6>
                                    @endif --}}
                                        <h6>{{ getFormattedAmount($orderDetails->quantity * $orderDetails->sale_price) }}</h6>
                                </td>
                                <td class="text-center text-center">
                                @if($order->order_status == \App\Library\Enum::ORDER_STATUS_TYPE_DELIVERED)
                                    <input type="checkbox" class="is_return"
                                        name="is_return[]" value="1">
                                    <input type="hidden" class="is_return_demo"
                                        name="is_return[]" value="0">
                                        @else
                                        x
                                        @endif
                                </td>

                                <input type="hidden" class="order_details"
                                    name="order_details[]"
                                    value="{{ $orderDetails->id }}">

                                <input type="hidden" class="sale_price"
                                    name="sale_price[]"
                                    value="{{ $orderDetails->sale_price }}" step="any" required>

                                <input type="hidden" class="product_id"
                                    name="product_id[]"
                                    value="{{ $orderDetails->product_id }}" step="any" required>

                                <input type="hidden" class="order_id"
                                    name="order_id" value="{{$order->id}}" step="any" required>

                                <input type="hidden" class="sub_total"
                                    name="sub_total" value="0" step="any" required>
                            </tr>
                            @endforeach
                        </tbody>

                        @if($order->order_status == \App\Library\Enum::ORDER_STATUS_TYPE_DELIVERED)
                            <tfoot>
                                <tr>
                                    <th class="text-end" colspan="3">
                                        <h5>Total Quantity</h5>
                                    </th>
                                    <th class="text-center">
                                        <h5 class="total-quantity" id="total-qty-{{$order->id}}">0</h5>
                                    </th>
                                    <th class="text-center">
                                        <h5>Total </h5>
                                    </th>
                                    <th class="text-center">
                                        <h5 class="total-price" id="total-amount-{{$order->id}}">$0.0</h5>
                                    </th>
                                </tr>
                            </tfoot>
                            @endif

                    </table>

                    @if($order->order_status == \App\Library\Enum::ORDER_STATUS_TYPE_DELIVERED)
                        <div class="p-4">
                            <div class="form-floating mb-4 theme-form-floating">
                                <textarea type="text" class="form-control" name="note"
                                    placeholder="Leave a comment here" id="note" style="height: 100px"></textarea>
                                <label for="address">Note About Return</label>
                            </div>

                            <div class="d-flex gap-3 justify-content-end">
                                <button type="button" class="btn btn-animation btn-md fw-bold">Cancel</button>
                                <button type="submit"
                                    class="btn theme-bg-color btn-md fw-bold submit-btn" onclick="submitForm(event, {{$order->id}})">Return</button>
                            </div>
                        </div>
                        @endif
                </div>

            </div>
        </form>
    </div>

</div>
@endsection

@push('styles')
<style>
    .total-amount-div {
        margin-bottom: 25px !important;
        margin-right: 20% !important;
    }
</style>
@endpush

@push('scripts')
@vite('resources/public_assets/js/return/create.js')
@endpush
