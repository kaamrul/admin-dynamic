@extends('public.member_dashboard.dashboard_master')
@section('order', 'active')

@section('member_content')
@php
use \App\Library\Enum;
@endphp
<div class="dashboard-order">
    <div class="title">
        <h2>Order Products</h2>
    </div>

    @if($order->order_status == \App\Library\Enum::ORDER_STATUS_TYPE_PENDING)
        <div class="d-flex justify-content-end ">
            <a href="{{ route('member.dashboard.order.cancel', $order->id) }}" class="btn btn-animation btn-sm">Cancel Order</a>
        </div>
    @endif

    <div class="cart-table order-table order-table-2">
    <div class="accordion accordion-box ">
        @php
            $order_product_qty = 0;
        @endphp
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-heading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapse" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapse">

                        <span class="text-capitalize">Status : {{ str_replace('_', ' ', $order->order_status) }}</span>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapse" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-heading">
                    <div class="accordion-body">
                        <div class="cart-table order-table">

                            <div class="table-responsive">
                                <table class="table mb-0 order-table-{{$order->id}}">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sub_qty = $unit_price = $sub_total = $total = 0;
                                        @endphp

                                        @foreach ($order->orderDetails->load('product') as $orderDetails)
                                        @php
                                            $sub_qty = $orderDetails->quantity;
                                            $order_product_qty +=$sub_qty;
                                            //$unit_price = $orderDetails->product->unit_price;
                                            $unit_price = $orderDetails->sale_price;
                                            $sub_total = $sub_qty*$unit_price;
                                            $total += $sub_total;
                                        @endphp
                                        <tr  class="parent-row">
                                            <td class="product-detail">
                                                <div class="product border-0 p-0">
                                                    <div class="product-image" style="height: auto">
                                                        <img src="{{$orderDetails->product->getThumbnailImage()}}"
                                                            class="img-fluid blur-up lazyload" style="height: auto" alt="">
                                                    </div>
                                                    <div class="product-detail">
                                                        <ul>
                                                            <li class="text-start">
                                                                {{ \Illuminate\Support\Str::limit($orderDetails->product->title, 25) }}

                                                                @if ($orderDetails?->load('productStock')?->productStock?->variant_ids)
                                                                    <br> <small>{{ getProductVariantValue($orderDetails?->productStock?->variant_ids) }}</small>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <h4 class="text-title">{{$sub_qty}}</h4>
                                            </td>

                                            <td class="price text-center">
                                                <h6 class="theme-color">{{getFormattedAmount($unit_price)}}</h6>
                                            </td>

                                            <td class="subtotal text-center">
                                                <h5>{{ getFormattedAmount($sub_total) }}</h5>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th class="text-end">
                                                <h5>Total Quantity</h5>
                                            </th>
                                            <th class="text-center">
                                                <h5 class="total-quantity">{{ $order->orderDetails->sum('quantity') }}</h5>
                                            </th>
                                            <th class="text-center">
                                                <h5>Total </h5>
                                            </th>
                                            <th class="text-center">
                                                <h5 class="total-price">{{ getFormattedAmount($total) }}</h5>
                                            </th>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </div>
    <div class="row g-4">
        <div class="col-lg-12 col-sm-6">
            <div class="summery-box">
                <div class="summery-header">
                    <h3>Price Details</h3>
                    <h5 class="ms-auto theme-color">({{$order_product_qty}} Items)</h5>
                </div>

                <ul class="summery-contain">
                    <li>
                        <h4>SubTotal</h4>
                        <h4 class="price">{{ getFormattedAmount($order->sub_total_amount) }}</h4>
                    </li>

                    <li>
                        <h4>Shipping Cost</h4>
                        <h4 class="price theme-color">{{ getFormattedAmount($order->shipping_cost) }}</h4>
                    </li>

                    <li>
                        <h4>Discount</h4>
                        <h4 class="price text-danger">{{ getFormattedAmount($order->discount_amount) }}</h4>
                    </li>
                </ul>

                <ul class="summery-total">
                    <li class="list-total">
                        <h4 style="font-size: 20px">Total</h4>
                        <h4 style="font-size: 20px" class="price">{{ getFormattedAmount($order->total_amount) }}</h4>
                    </li>
                    <li>
                        <h4 style="font-size: 18px">GST</h4>
                        <h4 style="font-size: 18px" class="price theme-color">{{ getFormattedAmount($order->gst_amount) }}</h4>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
