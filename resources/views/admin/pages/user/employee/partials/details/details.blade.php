@extends('admin.pages.user.employee.layout.master')

@section('title', 'Employee Details')

@section('employeeContent')

@php
    use App\Library\Enum;
    use App\Library\Helper;
@endphp

<table class="table org-data-table table-bordered">
    <tbody>
        <tr>
            <td>Status</td>
            <td>
                @php
                    if ($user?->status == Enum::USER_STATUS_PENDING) {
                        $class = 'badge-secondary';
                    } elseif ($user?->status == Enum::USER_STATUS_ACTIVE) {
                        $class = 'badge-success';
                    } elseif ($user?->status == Enum::USER_STATUS_SUSPENDED) {
                        $class = 'badge-danger';
                    }
                @endphp

                <div class="badge {{ $class }}">
                    {{ Enum::getUserStatus($user?->status) }}
                </div>
            </td>
        </tr>
        <tr>
            <td>User Type</td>
            <td class="text-capitalize"> {{ $user?->user_type == \APP\Library\Enum::USER_TYPE_SUPER_ADMIN ? 'Database User' : $user?->user_type }} </td>
        </tr>

        <tr>
            <td>Phone</td>
            <td> {{ $user?->phone }} </td>
        </tr>
        <tr>
            <td>Email</td>
            <td> {{ $user?->email }} </td>
        </tr>
        <tr>
            <td>Designation</td>
            <td> {{ $user?->designation ?? 'N/A' }} </td>
        </tr>
        <tr>
            <td>Territory</td>
            <td> 
                @if(Helper::hasAuthRolePermission('territory_show') && $user->territory_id)
                    <a href="{{ route('admin.config.more_settings.territory.show', $user->territory_id) }}" target="_blank" class="text-success">
                        {{ $user?->territory?->name ?? 'N/A' }} 
                    </a>
                @else
                    {{ $user?->territory?->name ?? 'N/A' }} 
                @endif
            </td>
        </tr>
        <tr>
            <td>Driving License </td>
            <td> {{ $user?->driving_license ?? 'N/A' }} </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td> {{ $user?->gender ?? 'N/A' }} </td>
        </tr>
        <tr>
            <td>Joined At</td>
            <td> {{ getFormattedDateTime($user->created_at) }} </td>
        </tr>
        <tr>
            <td>Roles</td>
            <td>
                @foreach ($user?->getRole() as $key => $value)
                    <span class="badge btn2-secondary mr-2">{{ $value->name }}</span>
                @endforeach
            </td>
        </tr>
        <tr>
            <td>Vans</td>
            <td>
                @if($user->vans()->count() > 0)
                    @foreach($user->vans as $van)
                        @if(Helper::hasAuthRolePermission('van_show') && $van->van_id)
                            <a href="{{ route('admin.user.van.show', $van->van_id) }}" target="_blank" class="text-success">
                                {{ $van?->van?->reg_number }}, 
                            </a>
                        @else
                            {{ $van?->van?->reg_number }}, 
                        @endif
                    @endforeach
                @else   
                    N/A
                @endif
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td class="summernote-preview">{{ $user->description ?? 'N/A' }}</td>
        </tr>

    </tbody>
</table>

@endsection