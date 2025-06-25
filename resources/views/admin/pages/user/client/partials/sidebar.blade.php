<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5 pb-4">

@php
    use App\Library\Helper;
    $urlArray = url()->full();
    $segments = explode('/', $urlArray);
    $numSegments = count($segments);
    $currentSegment = $segments[$numSegments - 1];
@endphp

    <!-- Client Info -->
    <div class="card shadow-sm">
        <div class="card-body py-sm-4">
            <div class="border-bottom text-center pb-2">
                <div class="mb-3">
                    <h3>{{ $user?->full_name }}</h3>
                </div>
                <p class="mx-auto mb-2">
                    <i class="fas fa-map-marker-alt"></i> {{ $user->location }}
                </p>
            </div>
            <div class="text-center mt-4 nav-tab">
                @if(Helper::hasAuthRolePermission('user_update_status'))
                <button
                    class="btn btn-sm mb-2 mr-2 change-status {{ $user->status != \App\Library\Enum::USER_STATUS_ACTIVE  ? 'btn-secondary' : 'btn2-secondary' }}"
                    onclick="clickUpdateStatus()">
                    <div class="tooltip client-tooltip"> Change Status </div>
                    <i class="fas fa-power-off"></i>
                </button>
                @endif

                @if(Helper::hasAuthRolePermission('user_update_password') && false)
                <button class="btn btn-sm mb-2 mr-2 btn2-light-secondary change-pass"
                    onclick="bus.emit('common-update-password', {{ $user->id }})">
                    <div class="tooltip client-tooltip"> Change Password </div>
                    <i class="fas fa-key"></i> </button>
                @endif

                @if(Helper::hasAuthRolePermission('customer_update'))
                <a href="{{ route('admin.member.update', $user->id) }}"
                    class="btn btn-sm btn-warning mb-2 mr-2 tooltip-edit">
                    <div class="tooltip client-tooltip"> Edit </div>
                    <i class="fas fa-edit"></i></a>
                @endif

                @if(Helper::hasAuthRolePermission('user_delete'))
                <button class="btn btn-sm mb-2 mr-2 btn-danger tooltip-delete"
                    onclick="confirmFormModal('{{ route('admin.user.delete.api', $user->id) }}', 'Confirmation', 'Are you sure to delete operation?')">
                    <div class="tooltip client-tooltip"> Delete </div>
                    <i class="fas fa-trash-alt"></i> </button>
                @endif
            </div>
        </div>
    </div><!-- End Client Info -->

    <!-- SideBar Start -->
    <div class="card mt-3">
        <div class="card-body">
            <ul class="nav nav-tabss nav-tabs-vertical" role="tablist">

                @if(Helper::hasAuthRolePermission('customer_show'))
                <li class="nav-item mb-2">
                    <a class="nav-link {{ $currentSegment === 'show' ? 'active' : ''}}"
                        href="{{ route('admin.member.show', $user->id) }}">
                        <i class="fa-solid fa-border-all ms-2 mr-1"></i> Dashboard
                    </a>
                </li>
                @endif

                @if(Helper::hasAuthRolePermission('customer_details'))
                <li class="nav-item mb-2">
                    <a class="nav-link {{ $currentSegment === 'details' ? 'active' : ''}}" href="{{ route('admin.member.show.details', $user->id) }}">
                        <i class="fa-solid fa-user ms-2"></i> Details
                    </a>
                </li>
                @endif

            </ul>
        </div>
    </div>
    <!-- Sidebar End -->
</div>
