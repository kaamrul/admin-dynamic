@extends('admin.pages.user.employee.layout.master')

@section('title', 'Employee Details')

@section('employeeContent')

<div class="row">
    <div class="col-12">
        <h6>
            Roles: {{ $user->roles->pluck('name')->implode(', ') }}
        </h6>

        <form method="post" action="{{ route('admin.user.employee.security.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            <hr>

            <div class="form-group row @error('role_id') error @enderror">
                <label class="col-sm-3 col-form-label required">{{ __('Role') }}</label>
                <div class="col-sm-9">
                    <select class="form-control select2" name="role_id[]" id="role_id" multiple>
                        @foreach ($roles as $value)
                            <option value="{{ $value->id }}"
                                {{ collect(old('role_id'))->contains($value->id) ? 'selected' : '' }}
                                data-params="{{ $value->id }}">
                                {{ ucwords($value->name) }}</option>
                        @endforeach
                    </select>
                    
                    @error('role_id')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            @if(\App\Library\Helper::hasAuthRolePermission('employee_security_update'))
            <div class="row">
                <div class="modal-footer justify-content-center col-md-12">
                    {!! \App\Library\Html::btnReset() !!}
                    {!! \App\Library\Html::btnSubmit() !!}
                </div>
            </div>
            @endif

        </form>
    </div>
</div>

@include('admin.assets.select2')

@push('scripts')
<script>
    $(document).ready(function () {
        $("#role_id").select2({
            placeholder: "Select One",
            allowClear: true
        });

        var roles = <?php echo $user->getRole() ?> ;

        var roleArr = [];
        $.each(roles, function(index, row) {
            roleArr.push(row.id)
        });

        $('#role_id').val(roleArr).trigger("change");
    });
</script>

@endpush

@endsection