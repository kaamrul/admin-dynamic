<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5 pb-4">

    @php
        use App\Library\Helper;
        $urlArray = url()->full();
        $segments = explode('/', $urlArray);
        $numSegments = count($segments);
        $currentSegment = $segments[$numSegments - 1];
    @endphp
    
    <!-- Home Content -->
    <div class="card shadow-sm">
        <div class="card-body py-sm-4">
            <div class="border-bottom text-center pb-2">
                <div class="mb-3 border-bottom">
                    <img src="{{ $user?->getAvatar() }}" alt="profile"
                        class="img-lg rounded-circle mb-3" onclick="clickImage('{{ $user?->getAvatar() }}')">
                </div>
                <div class="mb-3">
                    <h3>{{ $user?->full_name }}</h3>
                </div>

                @if($user?->address)
                <p class="mx-auto mb-2">
                    Address: {{ $user?->address?->street_address }}
                </p>
                <p class="mx-auto mb-2">
                    Post Code: {{ $user?->address?->post_code }}
                </p>
                @endif

            </div>

            <div class="text-center mt-4 nav-tab">
                @if( Helper::hasAuthRolePermission('user_update_status') )
                <button
                    class="btn btn-sm mb-2 mr-2 change-status {{ $user->status != \App\Library\Enum::USER_STATUS_ACTIVE ? 'btn-secondary tooltip-secondary' : 'btn2-secondary' }}"
                    href="javascript:void(0)" onclick="clickUpdateStatus()" tooltip="Change Status">
                    <i class="fas fa-power-off"></i>
                </button>
                @endif

                @if( Helper::hasAuthRolePermission('user_update_password') )
                <button class="btn btn-sm mb-2 mr-2 btn2-light-secondary change-pass"
                    onclick="bus.emit('common-update-password', {{ $user->id }})" tooltip="Change Password">
                    <i class="fas fa-key"></i> </button>
                @endif

                @if(Helper::hasAuthRolePermission('employee_update') && $user->user_type != \App\Library\Enum::USER_TYPE_SUPER_ADMIN)
                <a href="{{ route('admin.user.employee.edit', $user->id) }}"
                    class="btn btn-sm btn-warning mb-2 mr-2 tooltip-warning" tooltip="Edit">
                    <i class="fas fa-edit"></i></a>
                @endif

                @if(Helper::hasAuthRolePermission('user_delete'))
                <button class="btn btn-sm btn-danger mb-2 mr-2 tooltip-danger"
                    onclick="confirmFormModal('{{ route('admin.user.delete.api', $user->id) }}', 'Confirmation', 'Are you sure to delete operation?')" tooltip="Delete">
                    <i class="fas fa-trash-alt"></i> </button>
                @endif

                @if(Helper::hasAuthRolePermission('employee_change_to_driver'))
                <button class="btn btn-sm btn-warning mb-2 tooltip-danger"
                    onclick="confirmFormModal('{{ route('admin.user.employee.change_user_type', $user->id) }}', 'Confirmation', 'Are you certain you want to update this user from employee to driver?')" tooltip="Update to Driver">
                    <i class="fas fa-sync-alt"></i> </button>
                @endif

            </div>

        </div>
    </div>
    <!-- End Home Content-->

    <!----------------- SideBar -------------------->
    <div class="card mt-3">
        <div class="card-body">
            <ul class="nav nav-tabss nav-tabs-vertical" role="tablist">

                @if(Helper::hasAuthRolePermission('employee_show'))
                <li class="nav-item mb-2">
                    <a class="nav-link {{ $currentSegment === 'show' ? 'active' : ''}}"
                        href="{{ route('admin.user.employee.show', $user->id) }}">
                        <i class="fa-solid fa-border-all ms-2 mr-1"></i> Dashboard
                    </a>
                </li>
                @endif

                @if(Helper::hasAuthRolePermission('employee_details'))
                <li class="nav-item mb-2">
                    <a class="nav-link {{ $currentSegment === 'details' ? 'active' : ''}}"
                        href="{{ route('admin.user.employee.details', $user->id) }}">
                        <i class="fa-solid fa-user-tie fa-lg ms-2"></i> Details
                    </a>
                </li>
                @endif

                @php
                    $role = count($user?->getRole());
                @endphp

                @if(Helper::hasAuthRolePermission('employee_security'))
                <li class="nav-item mb-2">
                    <a class="nav-link {{ $currentSegment === 'security' ? 'active' : ''}}"
                        href="{{ route('admin.user.employee.security', $user->id) }}">
                        <i class="fa-solid fa-lock ms-2"></i> Security
                    </a>
                </li>
                @endif

            </ul>
        </div>
    </div>
    <!----------------- End SideBar -------------------->
</div>

@include('admin.assets.preview-image')

