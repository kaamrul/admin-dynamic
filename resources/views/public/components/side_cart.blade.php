@php
    use App\Models\Cart;

    $cartIdentifier = request()->cookie('cart_identifier');
    $cartItems = Cart::with('product')->where('cart_identifier', $cartIdentifier)->get();
    $totalAmount = 0;
@endphp

{{-- <div class="button-item">
    <button class="item-btn btn text-white">
        <i class="fa fa-bag-shopping"></i>
    </button>
</div>
<div class="item-section">
    <button class="close-button">
        <i class="fas fa-times"></i>
    </button>
    <h6>
        <i class="iconly-Bag-2 icli"></i>
        <span class="item-title">4 Items</span>
    </h6>

    <ul class="items-image">
        <li>
            <img src="{{ asset('img/product.jpg') }}" alt="">
        </li>
        <li>
            <img src="{{ asset('img/product.jpg') }}" alt="">
        </li>
        <li>
            <img src="{{ asset('img/product.jpg') }}" alt="">
        </li>

        <li>+{{ 4 - 3 }}</li>

    </ul>

    <a href="{{ url('/cart') }}">
        <button class="btn item-button btn-sm fw-bold cart-total">200$</button>
    </a>
</div> --}}

<div class="button-item">
    <button class="item-btn btn text-white">
        <i class="fa fa-bag-shopping"></i>
    </button>
</div>
<div class="item-section">
    <button class="close-button">
        <i class="fas fa-times"></i>
    </button>
    <h6>
        <i class="iconly-Bag-2 icli"></i>
        <span class="item-title">{{ count($cartItems) > 0 ? count($cartItems) : 'No' }} Items</span>
    </h6>

    <ul class="items-image">
        @if(count($cartItems) > 0)
            @foreach($cartItems as $key => $item)
                @php
                    $itemTotal = Cart::getTotalAmount($item->quantity, $item->load('product')->product->calculatePriceAfterDiscount($item->price));
                    $totalAmount += $itemTotal;
                @endphp

                @if($key < 3)
                    <li>
                        <img src="{{ $item->product->getThumbnailImage() }}" alt="">
                    </li>
                @endif
            @endforeach

            @if(count($cartItems) - 3 > 0)
                <li>+{{ count($cartItems) - 3 }}</li>
            @endif
        @endif
    </ul>

    <a href="{{ url('/cart') }}">
        <button class="btn item-button btn-sm fw-bold cart-total">Total: {{ getFormattedAmount($totalAmount) }}</button>
    </a>
</div>
