@extends('public.layout.master')
@section('title', 'Product Details')
@section('store', 'active')

@php
    use App\Library\Enum;
    use Illuminate\Support\Facades\Vite;
    $variant_index = 0;
    $discount = 0;
@endphp

@section('content')

    <main id="main">
        <section class="product-section">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 wow fadeInUp">
                        <div class="row g-4">
                            <div class="col-xl-5 wow fadeInUp">
                                <div class="product-left-box">
                                    <div class="row g-2">
                                        <div class="col-12 ">
                                            <div class="product-main-2">
                                                @php
                                                    $productImages = $product->attachments->whereIn('for', [
                                                        'thumbnail',
                                                        'gallery',
                                                    ]);
                                                    $productStockImages = $product->productStocks->flatMap(function (
                                                        $productStock,
                                                    ) {
                                                        return $productStock
                                                            ->load('attachments')
                                                            ->attachments->whereIn('for', ['variant']);
                                                    });

                                                    $attachments = $productImages
                                                        ->concat($productStockImages)
                                                        ->sortByDesc('for');
                                                @endphp
                                                <div>
                                                    <div class="product-img">
                                                        <img src="{{ $product->getThumbnailImage() }}" id="img"
                                                            alt=""
                                                            class="img-fluid w-100 h-100 lazyload thumbnail-image">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="product-slider position-relative">
                                                <div class="swiper productSwiper mt-4">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($attachments as $key => $galleryAttachment)
                                                            <div class="swiper-slide">
                                                                <img src="{{ $galleryAttachment->getAttachment() }}"
                                                                    id="img-{{ $key + 1 }}"
                                                                    data-zoom-image="{{ $galleryAttachment->getAttachment() }}"
                                                                    class="img-fluid w-100 h-100 border" alt="">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="swiper-button-next product-button-next"></div>
                                                <div class="swiper-button-prev product-button-prev"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="right-box-contain">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="name">{{ $product->getTranslation('title') }}</h2>
                                        <div class="d-flex gap-2">
                                            <div class="media-section position-relative">
                                                <div class="share-icon">
                                                    <i class="fa fa-share-alt"></i>
                                                </div>
                                                <div class="media-group">
                                                    <ul class="social-share-list">
                                                        {!! $button_component !!}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <span id="stock_badge" class="badge stock-badge">{!! \App\Library\Html::StockBadge($first_stock->current_stock, $product->stock_visibility) !!}</span>
                                    </div>
                                    @if ($product->has_discount)
                                        <h3 class="theme-color price mt-4" id="price">
                                            {{ getFormattedAmount($first_stock->getPriceAfterDiscount()) }}</h3>
                                        @if ($first_stock->getDiscountInfo())
                                            <p><del id="without_discount_price"
                                                    class="text-content">{{ getFormattedAmount($first_stock->unit_price) }}</del>
                                                <span id="discount_info"
                                                    class="offer theme-color">{{ $first_stock->getDiscountInfo() }}</span>
                                            </p>
                                        @endif
                                    @else
                                        <h3 id="price" class="mt-4">
                                            {{ getFormattedAmount($first_stock->unit_price) }}</h3>
                                    @endif
                                    <div class="product-package">
                                        <form class="product-form" action="javascript:void(0)">
                                            @if (isset($product->colors) && count($product->colors) > 0)
                                                <div class="product-title">
                                                    <h4>Color</h4>
                                                </div>

                                                <ul class="color circle select-package p-0">
                                                    @foreach ($product->colors as $key => $color)
                                                        <li class="form-check">
                                                            <input type="radio" name="color" value="{{ $color->id }}"
                                                                @if ($color->id == explode('-', $first_stock->variant_ids)[$variant_index]) checked @endif
                                                                class="form-check-input"
                                                                onclick="changeAttribute({{ $product->id }})"
                                                                id="color{{ $key }}">
                                                            <label class="form-check-label m-0"
                                                                for="color{{ $key }}">
                                                                <span
                                                                    style="background-color:{{ $color->color_code }}"></span>
                                                            </label>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                                @php $variant_index = 1; @endphp
                                            @endif
                                            @if (isset($attributes) && count($attributes) > 0)
                                                @foreach ($attributes as $index => $attribute)
                                                    @php $check=true; @endphp
                                                    <div class="product-title">
                                                        <h4>{{ $attribute->name }} </h4>
                                                    </div>

                                                    <ul class="select-package p-0 mt-3">
                                                        @foreach ($attribute->attributeValues as $key => $attributeValue)
                                                            @if (in_array($attributeValue->id, json_decode($product->selected_variants_ids)))
                                                                @php $name = $attribute->id.'_attribute';@endphp
                                                                <li>
                                                                    <input class="form-check-input attribute" type="radio"
                                                                        @if ($attributeValue->id == explode('-', $first_stock->variant_ids)[$index + $variant_index]) checked @endif
                                                                        onclick="changeAttribute({{ $product->id }})"
                                                                        name="attribute[{{ $index }}]"
                                                                        id="{{ $name }}_{{ $attributeValue->id }}"
                                                                        value="{{ $attributeValue->id }}">
                                                                    <label class="form-check-label"
                                                                        for="{{ $name }}_{{ $attributeValue->id }}">
                                                                        <span>{{ $attributeValue->value }}</span>
                                                                    </label>
                                                                </li>
                                                                @php $check=false; @endphp
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endforeach
                                            @endif
                                        </form>

                                        <input type="hidden" name="unit_price" class="unit_price"
                                            value="{{ $first_stock->unit_price }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @php
                                            if ($product->productDetails->discount_type == 'flat') {
                                                $discount = $product->productDetails->discount;
                                            } elseif ($product->productDetails->discount_type == 'percentage') {
                                                $discount = ($product->productDetails->discount / 100) * $first_stock->unit_price;
                                            } else {
                                                $discount = 0;
                                            }
                                        @endphp
                                        <input type="hidden" name="discount" class="discount"
                                            value="{{ $discount }}">

                                        <div class="quantity-section gap-3 mt-2">
                                            <div class="product-title">
                                                <h4>Quantity</h4>
                                            </div>

                                            <div class="note-box product-package">
                                                <div class="cart_qty qty-box product-qty">
                                                    <div class="input-group">
                                                        <button type="button" class="quantity-item qty-left-minus minus"
                                                            data-type="minus" data-field="">
                                                            <i class="fa fa-minus"></i>
                                                        </button>

                                                        <input id="product_quantity"
                                                            class="form-control input-number quantity-item qty-input"
                                                            type="text" name="quantity" value="1" min="1"
                                                            max="{{ $first_stock->current_stock }}">

                                                        <button type="button" class="quantity-item qty-right-plus plus"
                                                            data-type="plus" data-field="">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                        <button id="addToCart"
                                            class="btn theme-bg-color card-btn btn-add-to-cart mt-sm-4 btn-md text-white py-3 px-2 fw-300 w-50"
                                            {{ $first_stock->current_stock > 0 ? '' : 'disabled' }}><i
                                                data-feather="shopping-cart"></i> <span class="ms-1">Add To
                                                Cart</span></button>
                                        <button {{ $first_stock->current_stock > 0 ? '' : 'disabled' }}
                                            class="btn bg-dark text-white mt-sm-4 btn-md py-3 fw-300 w-50"
                                            id="buyNow">Buy
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card border-0">
                                <div class="card-body px-5">
                                    <h3 class="text-center text-lg-start mb-4">Description</h3>
                                    <p>
                                        {{ $product->short_description }}
                                    </p>
                                    <p>
                                        {!! $product->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('public.components.side_cart')
    </main>
@stop

@push('scripts')
    @vite('resources/public_assets/js/product/show.js')
    <script>
        $(document).ready(function() {
            $('.swiper-slide img').click(function() {
                var newImageSrc = $(this).attr('src');
                $('.product-img img').attr('src', newImageSrc);
                $('.product-img img').attr('data-zoom-image', newImageSrc);
            });
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
    </script>
@endpush
