@php
use \App\Library\Enum;
$categories = \App\Models\Category::active()->orderBy('order', 'asc')->get();
@endphp

<div class="left-box">
    <div class="shop-left-sidebar">
        <div class="filter-category">
            <div class="filter-title">
                <h2>Filters</h2>
                <a href="javascript:void(0)" onclick="ClearAll()">Clear All</a>
            </div>
        </div>

        <form class="filter-form" action="javascript:void(0)">
            <div class="accordion custom-accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne">
                            <span>Categories</span>
                        </button>
                    </h2>

                    <div id="collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">

                            <ul class="category-list custom-padding custom-height p-0">
                                @foreach($categories as $key => $cat)
                                <li>
                                    <div class="form-check ps-0 m-0 category-list-box">
                                        <input class="checkbox_animated" type="checkbox"
                                        @if(isset($category)) @if($category->id == $cat->id)
                                        checked @endif @endif name="category[]" onclick="filter()"
                                            value="{{$cat->id}}" id="category{{$cat->id}}">
                                        <label class="form-check-label" for="category{{$cat->id}}">
                                            <span class="name">{{ $cat->getTranslation('title') }}</span>
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            <span>Price</span>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <div class="range-slider">
                                <input type="text" class="js-range-slider d-none" name="price_range" value="" onchange="filter()">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSize">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSize" aria-expanded="false" aria-controls="collapseSize">
                            Size
                        </button>
                    </h2>
                    <div id="collapseSize" class="accordion-collapse collapse" aria-labelledby="headingSize" data-bs-parent="#filterAccordion">
                        <div class="accordion-body">
                            <div class="range-slider">
                                <input type="text" class="js-size-range-slider d-none" name="size_range" value="" onchange="filter()">
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </form>
    </div>
</div>

@push('scripts')
@vite('resources/public_assets/js/product/filter.js')
@endpush

<style>
    .irs {
    position: relative;
    display: block;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    height: 55px
}

.irs .irs-line {
    position: relative;
    display: block;
    overflow: hidden;
    outline: none !important;
    height: 10px;
    top: 33px;
    background-color: #0244c9;
    border-radius: 50px
}

.irs .irs-line-left {
    width: 11%;
    height: 8px;
    position: absolute;
    display: block;
    top: 0;
    left: 0
}

.irs .irs-line-mid {
    width: 82%;
    height: 8px;
    position: absolute;
    display: block;
    top: 0;
    left: 9%
}

.irs .irs-line-right {
    width: 11%;
    height: 8px;
    position: absolute;
    display: block;
    top: 0;
    right: 0
}

.irs .irs-bar {
    width: 0;
    height: 10px;
    position: absolute;
    display: block;
    left: 0;
    top: 33px;
    background-color: #109a7e;
}

.irs .irs-bar-edge {
    width: 14px;
    height: 10px;
    position: absolute;
    display: block;
    left: 0;
    top: 33px;
    border: 1px solid #10599a;
    border-right: 0;
    background: #10599a;
    background: -webkit-gradient(linear, left bottom, left top, from(#10599a), to(#10599a));
    background: linear-gradient(to top, #10599a 0%, #10599a 100%);
    border-radius: 16px 0 0 16px
}

.irs .irs-shadow {
    width: 0;
    height: 2px;
    position: absolute;
    display: none;
    left: 0;
    top: 38px;
    background: #222;
    opacity: 0.3;
    border-radius: 5px
}

.irs .irs-slider {
    width: 20px;
    height: 20px;
    position: absolute;
    display: block;
    z-index: 1;
    top: 28px;
    border: 3px solid #fff;
    background-color: #10599a;
    border-radius: 100%;
    cursor: pointer
}

.irs .irs-slider .irs-slider.type_last {
    z-index: 2
}

.irs .irs-slider .irs-min {
    position: absolute;
    display: block;
    left: 0;
    cursor: default;
    color: #333;
    font-size: 12px;
    line-height: 1.333;
    text-shadow: none;
    top: 0;
    padding: 1px 5px;
    background: rgba(34, 34, 34, 0.1);
    border-radius: 3px
}

.irs .irs-max {
    position: absolute;
    display: block;
    right: 0;
    cursor: default;
    color: #777;
    font-size: 12px;
    line-height: 1.333;
    text-shadow: none;
    top: 0;
    padding: 3px 7px;
    background: rgba(34, 34, 34, 0.1);
    border-radius: 3px;
    font-weight: 500
}

.irs .irs-min {
    position: absolute;
    display: block;
    left: 0;
    top: 0;
    cursor: default;
    color: #777;
    font-size: 12px;
    line-height: 1.333;
    text-shadow: none;
    padding: 3px 7px;
    background: rgba(34, 34, 34, 0.1);
    border-radius: 3px;
    font-weight: 500
}

.irs .irs-from {
    position: absolute;
    display: block;
    top: 0;
    left: 0;
    cursor: default;
    white-space: nowrap;
    color: #fff;
    font-size: 13px;
    line-height: 1.333;
    text-shadow: none;
    padding: 3px 7px;
    background-color: #0846aa;
    border-radius: 3px;
    font-weight: 600
}

.irs .irs-to {
    position: absolute;
    display: block;
    top: 0;
    left: 0;
    cursor: default;
    white-space: nowrap;
    color: #fff;
    font-size: 13px;
    line-height: 1.333;
    text-shadow: none;
    padding: 3px 7px;
    background-color: #0846aa;
    border-radius: 3px;
    font-weight: 600
}

.irs .irs-single {
    position: absolute;
    display: block;
    top: 0;
    left: 0;
    cursor: default;
    white-space: nowrap;
    color: #fff;
    font-size: 14px;
    line-height: 1.333;
    text-shadow: none;
    padding: 1px 5px;
    background: #0846aa;
    border-radius: 3px
}

.irs .irs-grid {
    width: 100%;
    height: 20px;
    position: absolute;
    display: none;
    bottom: 0;
    left: 0;
    height: 27px
}

.irs .irs-with-grid {
    height: 75px
}

.irs .irs-with-grid .irs-grid {
    display: block
}

.irs .irs-grid-pol {
    width: 1px;
    height: 8px;
    position: absolute;
    top: 0;
    left: 0;
    background: #222;
    opacity: 0.5;
    background: #428bca
}

.irs .irs-grid-pol.small {
    height: 4px;
    background: #999
}

.irs .irs-grid-text {
    position: absolute;
    bottom: 0;
    left: 0;
    white-space: nowrap;
    text-align: center;
    font-size: 9px;
    line-height: 9px;
    padding: 0 3px;
    color: #222;
    bottom: 5px;
    color: #99a4ac
}

.irs .irs-disable-mask {
    width: 102%;
    height: 100%;
    position: absolute;
    display: block;
    top: 0;
    left: -1%;
    cursor: default;
    z-index: 2
}

.irs .irs-disabled {
    opacity: 0.4
}

.irs .irs-hidden-input {
    position: absolute !important;
    display: block !important;
    top: 0 !important;
    left: 0 !important;
    width: 0 !important;
    height: 0 !important;
    font-size: 0 !important;
    line-height: 0 !important;
    padding: 0 !important;
    margin: 0 !important;
    outline: none !important;
    z-index: -9999 !important;
    background: none !important;
    border-style: solid !important;
    border-color: transparent !important
}

.irs .lt-ie9 .irs-disable-mask {
    background: #222;
    filter: alpha(opacity=0);
    cursor: not-allowed
}

.irs .lt-ie9 .irs-shadow {
    filter: alpha(opacity=30)
}

.irs .lt-ie9 .irs-min {
    background: #ccc
}

.irs .lt-ie9 .irs-max {
    background: #ccc
}

.irs .lt-ie9 .irs-from {
    background: #999
}

.irs .lt-ie9 .irs-to {
    background: #999
}

.irs .lt-ie9 .irs-single {
    background: #999
}

.js-range-slider {
    margin-top: 15px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    color: #222;
    width: 100%
}

</style>