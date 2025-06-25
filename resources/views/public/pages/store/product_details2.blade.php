
@php
    use App\Library\Enum;
    use Illuminate\Support\Facades\Vite;
    $variant_index = 0;
    $discount = 0;
@endphp

<style>
    .product-section .right-box-contain .product-package .select-package {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    gap: calc(5px + (13 - 5) * ((100vw - 320px) / (1920 - 320)))
}

@media (max-width: 767px) {
    .product-section .right-box-contain .product-package .select-package {
        -webkit-box-pack: center;
        -ms-flex-pack: center;
    }
}

[dir="rtl"] .product-section .right-box-contain .product-package .select-package {
    padding-right: 0
}

.product-section .right-box-contain .product-package .select-package li {
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    min-height: unset;
    margin: 0;
    padding: 0;
    position: relative
}

.product-section .right-box-contain .product-package .select-package li label {
    padding: 6px 11px;
    border: 1px solid #ececec;
    border-radius: 4px;
    display: block;
    color: #4a5568;
    font-size: 14px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}

.product-section .right-box-contain .product-package .select-package .form-check-input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    float: unset;
    margin: 0;
    opacity: 0;
    cursor: pointer
}

.product-section .right-box-contain .product-package .select-package .form-check-input:checked~.form-check-label {
    background-color: #d8d8d8;
}

.product-section .right-box-contain .product-package .select-package .form-check-input:checked~.form-check-label span {
    color: #ffffff;
}

.product-section .right-box-contain .product-package .select-package.color li.active {
    opacity: 1;
    border-color: #222
}

.product-section .right-box-contain .product-package .select-package.color li .form-check-input:checked~.form-check-label {
    opacity: 1;
    border-color: #fff;
}

.product-section .right-box-contain .product-package .select-package.color li .form-check-input:checked~.form-check-label span {
    background-color: transparent
}

.product-section .right-box-contain .product-package .select-package.color li .form-check-label {
    opacity: 0.7
}

.product-section .right-box-contain .product-package .select-package.circle li:hover button {
    color: #222;
    background-color: #f1f0f0
}

.product-section .right-box-contain .product-package .select-package.circle li .form-check-label {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    cursor: pointer;
    border-radius: 100%;
    color: #4a5568;
    padding: 3px;
    border: 1px solid rgba(154, 154, 154, 0.4);
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    -webkit-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
    position: relative
}

.product-section .right-box-contain .product-package .select-package.circle li .form-check-label span {
    -webkit-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
    width: calc(30px + (34 - 30) * ((100vw - 320px) / (1920 - 320)));
    height: calc(30px + (34 - 30) * ((100vw - 320px) / (1920 - 320)));
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    background-color: #f8f8f8;
    color: #222;
    border-radius: 100%
}

.product-section .right-box-contain .product-package .select-package.product-radio-list {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    gap: 15px
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check {
    margin: 0;
    padding: 0;
    min-height: auto;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    gap: 8px
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check:hover .form-check-input {
    border-color: rgba(154, 154, 154, 0.65)
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check:hover .form-check-label {
    color: #222
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check .form-check-input {
    cursor: pointer;
    float: unset;
    margin: 0;
    width: 16px;
    height: 16px;
    background-color: #f8f8f8;
    border: 1px solid rgba(154, 154, 154, 0.4);
    position: relative;
    opacity: 1;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check .form-check-input::after {
    content: "";
    position: relative;
    width: 12px;
    height: 12px;
    background-color: var(--theme-color);
    border-radius: 100%;
    -webkit-transition: 0.3s ease-in-out;
    transition: 0.3s ease-in-out;
    -webkit-transform: scale(0);
    transform: scale(0)
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check .form-check-input:focus {
    -webkit-box-shadow: unset;
    box-shadow: unset
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check .form-check-input:active {
    -webkit-filter: unset;
    filter: unset
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check .form-check-input:checked {
    background-color: #fff;
    border-color: var(--theme-color)
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check .form-check-input:checked::after {
    -webkit-transform: scale(1);
    transform: scale(1)
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check .form-check-input:checked~.form-check-label {
    color: #222
}

.product-section .right-box-contain .product-package .select-package.product-radio-list .form-check .form-check-label {
    line-height: 1;
    font-size: 16px;
    font-weight: 600;
    margin-top: 1px;
    color: #4a5568;
    cursor: pointer
}

.product-section .right-box-contain .product-package .select-package .form-select {
    background: linear-gradient(187.77deg, #fafafa 5.52%, #f8f8f8 94%);
    border-radius: 7px;
    border: 1px solid #eee;
    display: inline-block
}

.product-section .right-box-contain .product-package .select-package.image li .form-check-label {
    cursor: pointer;
    font-size: 14px;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
    border: 1px solid rgba(154, 154, 154, 0.4);
    border-radius: 6px;
    padding: 3px
}

.product-section .right-box-contain .product-package .select-package.image li .form-check-label img {
    width: 65px;
    border-radius: 4px;
    cursor: pointer;
    height: 65px;
    padding: 0;
    overflow: hidden
}

.product-section .right-box-contain .product-package .select-package.rectangle li {
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    min-height: unset;
    margin: 0;
    padding: 0;
    position: relative
}

.product-section .right-box-contain .product-package .select-package.rectangle li:hover button {
    color: #222;
    background-color: #f1f0f0
}

.product-section .right-box-contain .product-package .select-package.rectangle li.active button {
    color: #fff;
    background-color: var(--theme-color)
}

.product-section .right-box-contain .product-package .select-package.rectangle li .form-check-label {
    cursor: pointer;
    font-size: 14px;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
    border: 1px solid rgba(154, 154, 154, 0.4);
    border-radius: 6px;
    padding: 3px
}

.product-section .right-box-contain .product-package .select-package.rectangle li .form-check-label span {
    padding: 6px 11px;
    background-color: #f8f8f8;
    border-radius: 4px;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out
}

.product-section .right-box-contain .product-package .select-package .disabled {
    overflow: hidden;
    position: relative;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: default;
    opacity: 0.6 !important;
    pointer-events: none
}

.product-section .right-box-contain .product-package .select-package .disabled::before {
    content: "";
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%) rotate(45deg);
    transform: translateY(-50%) rotate(45deg);
    left: 0;
    background-color: #ff7272;
    width: 100%;
    height: 1px;
    cursor: default;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    z-index: 1
}

.product-section .right-box-contain .product-package .select-package .disabled a,
.product-section .right-box-contain .product-package .select-package .disabled button {
    cursor: default
}

.product-section .right-box-contain .product-package .select-package .disabled .form-check-input:checked~.form-check-label {
    background-color: #f8f8f8 !important;
    color: #4a5568 !important
}
</style>


<div class="row product-section" style="margin-top: 0;">
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
                    </div>
                </div>
            </div>

            <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="right-box-contain">
                    <div class="d-flex justify-content-between">
                        <h2 class="name">{{ $product->getTranslation('title') }}</h2>
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
                        <button type="button" id="addToCart"
                            class="btn theme-bg-color card-btn btn-add-to-cart mt-sm-4 btn-md text-white py-3 px-2 fw-300 w-50" {{ $first_stock->current_stock > 0 ? '' : 'disabled' }}><i
                                data-feather="shopping-cart"></i> <span class="ms-1">Add To
                                Cart</span></button>

                        <button type="button" id="closeCart"
                        class="btn bg-dark text-white mt-sm-4 btn-md py-3 fw-300 w-50"><i
                            data-feather="shopping-cart"></i> <span class="ms-1">Close</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    @vite('resources/public_assets/js/product/show.js')
    <script>

    </script>
@endpush
