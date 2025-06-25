@extends('public.member_dashboard.dashboard_master')
@section('order_return', 'active')

@section('member_content')

@php
use \App\Library\Enum;
@endphp

<div class="dashboard-order">
    <div class="title">
        <h2>My Return Details</h2>
    </div>

    <div class="order-tab dashboard-bg-box">
        <div class="table-responsive" style="min-height: 300px;">
            <table class="table order-table">
                <tbody>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                    </tr>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($orderReturn->returnDetails as $details)
                    @php
                        $total += $details->sale_price;
                    @endphp

                    <tr>
                        <td class="text-start">
                            <img width="50" src="{{ $details->product->getThumbnailImage() }}">
                        </td>
                        <td class="text-start">
                            {{ $details->product->getTranslation('short_title') }}
                            @if ($details?->load('sellerOrderDetails.productStock')?->sellerOrderDetails?->productStock?->variant_ids)
                                <span>{{ getProductVariantValue($details?->productStock?->variant_ids) }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            {{ $details->quantity }}
                        </td>

                        <td class="text-center">
                            {{ getFormattedAmount($details->sale_price) }}
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td class="text-start"><strong>Total</strong></td>
                        <td></td>
                        <td></td>
                        <td class="text-center"><strong>{{ getFormattedAmount($total) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card mt-5">
                <div class="card-header">Order return Note </div>
                <div class="card-body">
                    <p>{!! $orderReturn->note !!}</p>
                </div>
            </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
