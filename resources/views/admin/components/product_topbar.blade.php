@php
use App\Library\Helper;
@endphp

@push('styles')
    <style>
        .btn.active{
            background-color: #1c3263;
            color: white !important;
        }

    </style>
@endpush

@if( Helper::hasAuthRolePermission('product_index') )
<a class="btn btn-sm mr-2 @yield('product','')" style="border-color: #1c3263; color: #1c3263;" href="{{ route('admin.config.more_settings.product.index') }}">Products</a>
@endif

@if( Helper::hasAuthRolePermission('category_index') )
<a class="btn btn-sm mr-2 @yield('category','')" style="border-color: #1c3263; color: #1c3263;" href="{{ route('admin.category.index') }}">Categories</a>
@endif

@if( Helper::hasAuthRolePermission('color_index') )
<a class="btn btn-sm mr-2 @yield('color','')" style="border-color: #1c3263; color: #1c3263;" href="{{ route('admin.color.index') }}">Colors</a>
@endif

@if( Helper::hasAuthRolePermission('attribute_index') )
<a class="btn btn-sm mr-2 @yield('attribute','')" style="border-color: #1c3263; color: #1c3263;" href="{{ route('admin.attribute.index') }}">Attributes</a>
@endif

@if( Helper::hasAuthRolePermission('product_index') )
<a class="btn btn-sm mr-2 @yield('attribute_value','')" style="border-color: #1c3263; color: #1c3263;" href="{{ route('admin.attributeValue.index') }}">Attribute Values</a>
@endif

@if( Helper::hasAuthRolePermission('purchase_index') && false)
    <a class="btn btn-sm  @yield('purchase','')" style="border-color: #1c3263; color: #1c3263;" href="/purchase">Purchases</a>
@endif
