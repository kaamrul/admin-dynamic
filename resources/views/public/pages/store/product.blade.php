<div class="wow fadeInUp" data-wow-delay="{{ 0.05 * $key }}s">
    <div class="product">
        <div class="product-image">
            <a href="{{ route('store.product.details', $product->slug) }}">
                <img src="{{ $product->getThumbnailImage() }}" class="img-fluid" alt="">
            </a>
        </div>

        <div class="product-detail">
            <a href="{{ route('store.product.details', $product->slug) }}">
                <h5 title="{{ $product->getTranslation('title') }}">
                    {{ \Illuminate\Support\Str::limit($product->title, 25) }}</h5>
            </a>
            @if ($product->has_discount)
                <h5 class="price theme-color">
                    {{ getFormattedAmount($product->getPriceAfterDiscount(getUnitPrice($product))) }}
                    @if ($product->productDetails->discount > 0)
                        <del class="text-content fs-6">{{ getFormattedAmount(getUnitPrice($product)) }} </del>
                    @endif
                </h5>
            @else
                <h5 class="price theme-color">{{ getFormattedAmount(getUnitPrice($product)) }}
                    @if ($product->productDetails->discount > 0)
                        <del class="text-content fs-6">{{ getFormattedAmount($product->unit_price) }} </del>
                    @endif
                </h5>
            @endif

            <div class="w-100">
                @if ($product->has_variant)
                    <a href="{{ route('store.product.details', $product->slug) }}">
                        <button class="btn"
                            style="width: 100%; border-radius: 50px; border: 1px solid; font-size: 16px">
                            Add To Cart
                        </button>
                    </a>
                @else
                    <button class="btn card-btn" {{ $product->current_stock > 0 ? '' : 'disabled' }}>Add To Cart</button>
                @endif
            </div>
        </div>
        <form action="#">
            <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}">
            <input type="hidden" name="user_id" class="user_id" value="{{ authUser()?->id }}">
            <input type="hidden" name="current_stock" class="current_stock" value="{{ $product->current_stock }}">
            <input type="hidden" name="product_price" class="product_price" value="{{ getUnitPrice($product) }}">
            <input type="hidden" name="qty-input" class="qty-input" value="{{ 1 }}">
            <input type="hidden" name="discount" class="discount" value="{{ $product->productDetails->discount }}">
        </form>
    </div>
</div>
