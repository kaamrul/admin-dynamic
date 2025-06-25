@php
    use App\Library\Helper;

    $urlArray = url()->full();
    $segments = explode('/', $urlArray);
    $numSegments = count($segments);
    $currentSegmentt = $segments[$numSegments - 1];
    // dd($currentSegmentt);
@endphp

<div class="card-body py-sm-4">
    <ul class="nav nav-tab" role="tablist">
        @if(Helper::hasAuthRolePermission('customer_details'))
        <li class="nav-item">
            <a  class="nav-link {{ $currentSegmentt === 'show' ? 'active' : ''}}"  href="{{ route('admin.member.show', $user->id) }}">
                <i class="fa-solid fa-circle-info"></i> Details
            </a>
        </li>
        @endif
    </ul>
</div>
