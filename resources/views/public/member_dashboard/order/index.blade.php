@extends('public.member_dashboard.dashboard_master')
@section('title', 'Order')
@section('order', 'active')

@php
use \App\Library\Enum;
@endphp
@section('member_content')
<div class="dashboard-order">
    <div class="title">
        <h2>My Orders History</h2>
    </div>

    <div class="order-tab dashboard-bg-box">
        <div class="table-responsive" style="min-height: 400px;">
            <table class="table order-table">
                <tbody>
                    <tr>
                        <th>Invoice Number</th>
                        <th>Total</th>
                        <th>Delivery Status</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($orders as $order)
                    <tr>
                        <td class="text-start">
                            #{{$order->invoice_id}}
                        </td>
                        <td class="text-start">
                            ${{ number_format($order->total_amount, 2) }}
                        </td>

                        <td class="text-start">
                                {!! getOrderStatus($order->order_status) !!}
                        </td>

                        <td class="text-start">
                            {!! getOrderPaymentStatus($order->payment_status) !!}
                        </td>

                        <td class="text-start d-flex justify-content-start">
                            <div class="dropdown">
                                <button style="background-color: #1c006a; color: #fff; padding: 6px; font-size: 14px;" class="btn dropdown-toggle" type="button" id="dropdownActiove" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-tools me-1"></i> Action
                                </button>
                                <ul style="min-width: 6rem; font-size: 14px;" class="dropdown-menu" aria-labelledby="dropdownActiove">
                                    <a class="dropdown-item" href="{{ route('member.dashboard.order.order.products', $order->id) }}">
                                        <i class="fa fa-eye"></i> Show
                                    </a>

                                    @if($order->order_status != \App\Library\Enum::ORDER_STATUS_TYPE_CANCELED)
                                    <a class="dropdown-item" href="{{ route('member.dashboard.order.return', $order->id) }}">
                                        <i class="fa fa-reply"></i> Return
                                    </a>

                                    <a class="dropdown-item" href="{{ route('member.dashboard.order.invoice', $order->invoice_id) }}">
                                        <i class="fa fa-download"></i> Download Invoice
                                    </a>
                                    @endif
                                </ul>
                              </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($orders->hasPages())
        <nav class="custom-pagination mb-2">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $orders->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $orders->previousPageUrl() }}" tabindex="-1">
                        <i class="fa-solid fa-angles-left"></i>
                    </a>
                </li>

                @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $orders->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                <li class="page-item {{ $orders->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $orders->nextPageUrl() }}">
                        <i class="fa-solid fa-angles-right"></i>
                    </a>
                </li>

            </ul>
        </nav>
        @endif
    </div>
</div>
@endsection
