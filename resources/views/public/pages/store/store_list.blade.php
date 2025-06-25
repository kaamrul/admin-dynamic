@extends('public.layout.master')
@section('title', 'Store')
@section('store', 'active')

@php
use \App\Library\Enum;
@endphp
@section('content')
    <style>
        .shop-section .show-button .top-filter-menu .category-dropdown .dropdown .dropdown-toggle {
            color: #0a1243;
            border: 3px solid #0a1243;
        }
    </style>
    <main id="main">

        <section class="section-b-space shop-section">
            <div class="container">
                <div class="row">
                    <div class="col-custom-3 wow fadeInUp">
                        @include('public.pages.store.filter_sidebar')
                    </div>
                    <div class="col-custom- wow fadeInUp">
                        <div class="show-button">
                            <div class="filter-button-group mt-0">
                                <div class="filter-button d-inline-block d-lg-none">
                                    <a><i class="fa-solid fa-filter"></i> Filter Menu</a>
                                </div>
                            </div>

                            <div class="top-filter-menu">
                                <div class="grid-option d-none d-md-block">
                                </div>
                                <div class="category-dropdown">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown">
                                            <span>Latest Product</span> <i class="fa-solid fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" id="aToz" onclick="filter('latest_on_top')"
                                                    href="javascript:void(0)">
                                                    Latest Product</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="zToa" onclick="filter('oldest_on_top')"
                                                    href="javascript:void(0)">
                                                    Oldest Product</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="low" onclick="filter('price_low')"
                                                    href="javascript:void(0)">
                                                    Low - High Price</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" id="high" onclick="filter('price_high')"
                                                    href="javascript:void(0)">
                                                    High - Low Price</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                        <div
                            class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                            @forelse($products??[] as $key => $product)
                                @include('public.pages.store.product')
                            @empty
                                <div style="width: 100%; height: 100vh;text-align: center;">
                                    <img src="{{ Vite::asset(Enum::NO_DATA_IMAGE_PATH) }}"
                                        class="img-fluid blur-up lazyload" alt="">
                                    <h2 class="mt-3"> No Data Found </h2>
                                </div>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </section>

        @include('public.components.side_cart')
    </main><!-- End #main -->
@stop

@push('scripts')
    @vite('resources/public_assets/js/cart/addToCart.js')
@endpush
