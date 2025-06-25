@php
    use App\Library\Helper;
    $user_role = App\Models\User::getAuthUserRole();

    $urlArray = url()->full();
    $segments = explode('/', $urlArray);
    $numSegments = count($segments);
    $currentSegmentt = $segments[$numSegments - 1];
@endphp


<div class="card-body py-sm-4">
    <ul class="nav nav-tab" role="tablist">

        @if(Helper::hasAuthRolePermission('customer_show'))
        <li class="nav-item details">
            <a  class="nav-link {{ ($currentSegmentt === 'show' || $currentSegmentt === 'details') ? 'active' : ''}}"  href="{{ route('admin.user.employee.show', $user->id) }}">
                {{-- <div class="tooltip"> Details </div> --}}
                <i class="fa-solid fa-circle-info"></i> Details
            </a>
        </li>
        @endif

        @if(Helper::hasAuthRolePermission('employee_note_index'))
        <li class="nav-item details">
            <a  class="nav-link {{ ($currentSegmentt === 'note' || $currentSegmentt === 'note') ? 'active' : ''}}"  href="{{ route('admin.user.employee.note.index', $user->id) }}">
                <i class="fas fa-note-sticky"></i> Note
            </a>
        </li>
        @endif
        
    </ul>
</div>
