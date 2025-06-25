@extends('public.member_dashboard.dashboard_master')
@section('title', 'Alerts')
@section('alerts', 'active')

@php
use \App\Library\Enum;
@endphp
@section('member_content')
<div class="dashboard-order">
    <div class="title" style="margin-bottom: 0;">
        <h4>Alert List</h4>
    </div>

    <style>
        .table td {
            padding: 0.7rem 0.7rem !important;
            background-color:#efefef;
        }

        .order-table a:hover {
            text-decoration: underline;
        }
    </style>
    <style>

        .nav-tabs {
            border: 0;
            padding: 15px 0;
        }

        .nav-tabs:not(.nav-tabs-neutral)>.nav-item>.nav-link.active {
            box-shadow: 0px 5px 35px 0px rgba(0, 0, 0, 0.3);
        }

        .card .nav-tabs {
            border-top-right-radius: 0.1875rem;
            border-top-left-radius: 0.1875rem;
        }

        .nav-tabs>.nav-item>.nav-link {
            color: #1c3263;
            margin: 0;
            margin-right: 5px;
            background-color: transparent;
            border: 1px solid #1c3263;
            border-radius: 30px;
            font-size: 14px;
            padding: 11px 23px;
            line-height: 1.5;
        }

        .nav-tabs>.nav-item>.nav-link:hover {
            background-color: #1c3263;
            color: white;
        }

        .nav-tabs>.nav-item>.nav-link.active {
            background-color: #1c3263;
            border-radius: 30px;
            color: #FFFFFF;
        }

        .nav-tabs>.nav-item>.nav-link i {
            font-size: 14px;
            position: relative;
            top: 1px;
            margin-right: 3px;
        }

        .nav-tabs.nav-tabs-neutral>.nav-item>.nav-link {
            color: #FFFFFF;
        }

        .nav-tabs.nav-tabs-neutral>.nav-item>.nav-link.active {
            background-color: #1c3263;
            color: #FFFFFF;
        }

        .tab-card {
            border: 0;
            border-radius: 0.1875rem;
            display: inline-block;
            position: relative;
            width: 100%;
        }

        .tab-card .card-header {
            background-color: transparent;
            border-bottom: 0;
            background-color: transparent;
            border-radius: 0;
            padding: 0;
        }
    </style>
    <div class="card tab-card">
        <div class="card-header">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ Request::query('type') == 'unseen' ? 'active' : ''}}" href="{{ url('/member/dashboard/alerts?type=unseen') }}">
                        <i class="fa-solid fa-square-envelope"></i> Unseen
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::query('type') == 'seen' ? 'active' : ''}}" href="{{ url('/member/dashboard/alerts?type=seen') }}">
                        <i class="fa-solid fa-envelope-open-text"></i> Seen
                    </a>
                </li>

                @if (Request::query('type') == 'unseen' && auth()->user()->unreadNotifications->count())
                <li class="nav-item" style="text-align: right;">
                    <a class="nav-link {{ Request::query('type') == 'seen' ? 'active' : ''}}" href="{{ url('/member/dashboard/alerts/mark-as-seen') }}">
                        <i class="fas fa-check-square"></i> Mark all as seen
                    </a>
                </li>
                @endif

            </ul>
        </div>
    </div>
    <hr>

    <div class="order-tab dashboard-bg-box">
        <div class="table-responsive" style="min-height: 400px;">
            <table class="table order-table">
                <tbody>
                    @foreach ($alerts as $alert)
                    <tr>
                        <td class="text-start">
                            @if (Request::query('type') == 'unseen')
                            <i class="fa-regular fa-envelope"></i> <a href="{{ url($alert->data['url']) }}?id={{ $alert->id }}">{{$alert->data['title']}}</a>
                            @else
                            <i class="fa-regular fa-envelope"></i> <a href="{{ url($alert->data['url']) }}">{{$alert->data['title']}}</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($alerts->hasPages())
        <nav class="custom-pagination mb-2">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ $alerts->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $alerts->previousPageUrl() }}&type={{ Request::query('type') }}" tabindex="-1">
                        <i class="fa-solid fa-angles-left"></i>
                    </a>
                </li>

                @foreach ($alerts->getUrlRange(1, $alerts->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $alerts->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}&type={{ Request::query('type') }}">{{ $page }}</a>
                    </li>
                @endforeach

                <li class="page-item {{ $alerts->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $alerts->nextPageUrl() }}&type={{ Request::query('type') }}">
                        <i class="fa-solid fa-angles-right"></i>
                    </a>
                </li>

            </ul>
        </nav>
        @endif
    </div>
</div>
@endsection
