@extends('public.member_dashboard.dashboard_master')
@section('title', 'Create Boat')

@section('member_content')
<div class="row">
    <div class="col-md-12 content-area pt-3">
        <h2>Update Boat</h2>
        <hr>

        <form method="post" action="{{ route('member.dashboard.boat.update', $boat->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="">
                        <div class="form-group row @error('boat_name') error @enderror">
                            <label class="col-sm-3 col-form-label required">{{ __('Boat Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="boat_name" name="boat_name"
                                    value="{{ old('boat_name', $boat->boat_name) }}" placeholder="{{ __('Boat Name') }}"
                                    required>
                                <p id="boat-name-warning" class="text-danger" style="display: none">Same name already have for another boat</p>
                                @error('boat_name')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row @error('registration_number') error @enderror">
                            <label class="col-sm-3 col-form-label required">{{ __('Registration Number') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="registration_number"
                                    value="{{ old('registration_number', $boat->registration_number ) }}" placeholder="{{ __('Registration Number') }}"
                                    required>
                                @error('registration_number')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row @error('skipper_id') error @enderror" id="skipper_id">
                            <label class="col-sm-3 col-form-label required">{{ __('Skipper') }}</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="skipper_id" id="skipper_id" required>
                                    <option value="" class="selected highlighted">Select One</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" data-name="{{ $user->full_name }}"
                                        {{(old("skipper_id", $boat->skipper_id) == $user->id) ? "selected" : ""}}>
                                        {{ $user->full_name }}</option>
                                    @endforeach
                                </select>
                                @error('skipper_id')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row @error('type') error @enderror" id="type">
                            <label class="col-sm-3 col-form-label required">{{ __('Boat Type') }}</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="type" id="type" required>
                                    <option value="" class="selected highlighted">Select One</option>
                                    @foreach(App\Library\Enum::getBoatType() as $key => $type)
                                    <option value="{{ $key }}" data-name="{{ $key }}"
                                        {{(old("type", $boat->type) == $key) ? "selected" : ""}}>
                                        {{ $type }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row @error('size') error @enderror">
                            <label class="col-sm-3 col-form-label">{{ __('Size') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="size"
                                    value="{{ old('size', $boat->size) }}" placeholder="{{ __('Size') }}">
                                @error('size')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row @error('make') error @enderror">
                            <label class="col-sm-3 col-form-label">{{ __('Make') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="make"
                                    value="{{ old('make', $boat->make) }}" placeholder="{{ __('Make') }}">
                                @error('make')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row @error('motor') error @enderror">
                            <label class="col-sm-3 col-form-label">{{ __('Motor') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="motor"
                                    value="{{ old('motor', $boat->motor) }}" placeholder="{{ __('Motor') }}">
                                @error('motor')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row @error('fuel_type') error @enderror" id="fuel_type">
                            <label class="col-sm-3 col-form-label required">{{ __('Fuel Type') }}</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="fuel_type" id="fuel_type" required>
                                    <option value="" class="selected highlighted">Select One</option>
                                    @foreach(App\Library\Enum::getBoatFuelType() as $key => $fuel_type)
                                    <option value="{{ $key }}" data-name="{{ $key }}"
                                        {{(old("fuel_type", $boat->fuel_type) == $key) ? "selected" : ""}}>
                                        {{ $fuel_type }}</option>
                                    @endforeach
                                </select>
                                @error('fuel_type')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row @error('image') error @enderror">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <div class="file-upload-section">
                                    <input name="image" type="file" class="form-control d-none"
                                        allowed="png,gif,jpeg,jpg">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            readonly placeholder="Size: 600x600 and max 800kB">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-outline-secondary"
                                                type="button"><i class="fas fa-upload"></i>
                                                Browse</button>
                                        </span>
                                    </div>
                                    @error('image')
                                    <p class="error-message">{{ $message }}</p>
                                    @enderror
                                    <div class="display-input-image">
                                        <img src="{{ $boat->image ? asset($boat->image) : Vite::asset(\App\Library\Enum::NO_IMAGE_PATH) }}"
                                            alt="Preview Image" />
                                        <button type="button"
                                            class="btn btn-sm btn-outline-danger file-upload-remove ml-3"
                                            title="Remove">x</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <div class="form-group row @error('color') error @enderror" id="color">
                            <label class="col-sm-3 col-form-label">{{ __('Color') }}</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="color" id="color">
                                    <option value="" class="selected highlighted">Select One</option>
                                    @foreach($colors as $color)
                                    <option value="{{ $color }}"
                                        {{(old("color", $boat->color) == $color) ? "selected" : ""}}>
                                        {{ $color }}</option>
                                    @endforeach
                                </select>
                                @error('color')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row @error('safety_equipment') error @enderror">
                            <label class="col-sm-3 col-form-label">{{ __('Safety Equipment') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="safety_equipment"
                                    value="{{ old('safety_equipment', $boat->safety_equipment) }}" placeholder="{{ __('Safety Equipment') }}">
                                @error('safety_equipment')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row @error('call_sign') error @enderror">
                            <label class="col-sm-3 col-form-label">{{ __('
                            Call Sign') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="call_sign"
                                    value="{{ old('call_sign', $boat->call_sign) }}" placeholder="{{ __('Call Sign') }}">
                                @error('call_sign')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row @error('note') error @enderror">
                            <label class="col-sm-3 col-form-label">{{ __('Boat Note') }}</label>
                            <div class="col-sm-9">
                                <textarea type="text" rows="6" class="form-control" name="note"
                                    placeholder="{{ __('Write Boat Note') }}">{{ old('note', $boat->note) }}</textarea>
                                @error('note')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row @error('short_description') error @enderror">
                            <label class="col-sm-3 col-form-label">{{ __('Short Description') }}</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="short_description"
                                    placeholder="{{ __('Write Short Description') }}">{{ old('short_description', $boat->short_description) }}</textarea>
                                @error('short_description')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row @error('description') error @enderror">
                            <label class="col-sm-3 col-form-label">{{ __('Description') }}</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="summernote"
                                    name="description">{{ old('description', $boat->description) }}</textarea>
                                @error('description')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="modal-footer justify-content-center col-md-12">
                    {!! \App\Library\Html::btnSubmit() !!}
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@include('admin.assets.summernote-text-editor')
@include('admin.assets.select2')

@push('scripts')
@vite('resources/admin_assets/js/select2.js')
<script>
    $(document).ready(function () {
    $('#summernote').summernote({
        height: 250,
        placeholder: "Write Description",
    });
});
    
$(document).ready(function () {
    $('#boat_name').on('keyup', function () {
        const boatName = $(this).val();
        const warningElement = $('#boat-name-warning');

        if (boatName.trim() !== '') {
            $.ajax({
                url: BASE_URL + '/member/dashboard/boats/check-boat-name',
                method: 'GET',
                data: { boat_name: boatName },
                success: function (response) {
                    console.log(response);
                    if (response.exists) {
                        warningElement.show();
                    } else {
                        warningElement.hide();
                    }
                },
                error: function () {
                    console.error('An error occurred while checking the boat name.');
                }
            });
        } else {
            warningElement.hide();
        }
    });
});

</script>
@endpush

@push('styles')
<style>
    .note-btn {
        font-size: 10px !important;
        padding: 4px 6px !important;
        height: auto;
        line-height: 1.2;
    }
</style>