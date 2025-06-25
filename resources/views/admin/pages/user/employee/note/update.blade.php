@extends('admin.layouts.master')

@section('title', __('Update Notes'))

@section('content')
<div class="content-wrapper">

    <div class="content-header d-flex justify-content-start">
    {!! \App\Library\Html::linkBack(route('admin.user.employee.note.index', $user->id)) !!}
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('Update Notes')) }}</h4>
        </div>

    </div>

    <div class="card shadow-sm col-xl-6 col-md-6 col-sm-12 col-12">
        <div class="card-body py-sm-4">
            
            <form method="post" action="{{ route('admin.user.employee.note.update', [$user->id, $note->id]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-lg-12 notes">
                    <div class="form-group row @error('category') error @enderror p-1">
                        <select class="form-control" name="category" id="note_category" required>
                            <option value="" class="selected highlighted">Select Note Type</option>
                            @foreach($noteTypes as $value)
                            <option class="text-capitalize" value="{{ $value }}" {{ (old("category", $note->category) == $value) ? "selected" : ""}}>
                                {{ $value }}</option>
                            @endforeach
                        </select>

                        @error('category')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 notes">
                    <div class="form-group row @error('title') error @enderror p-1">
                        <input type="text" name="title" class="form-control" placeholder="Title"
                            value="{{ old('title', $note->title) }}">
                        @error('title')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 notes">
                    <div class="form-group row @error('description') error @enderror p-1">
                        <textarea type="text" name="description" class="form-control" id="summernote"
                            value="{{ old('description', $note->description) }}" placeholder="Description" style="width: 80%;"></textarea>
                        @error('description')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                @if(\App\Library\Helper::hasAuthRolePermission('customer_note_update'))
                <div class="row">
                    <div class="modal-footer justify-content-center col-md-12">
                        {!! \App\Library\Html::btnReset() !!}
                        <button type="submit" class="btn mr-3 my-3 btn2-secondary" id="subBtnFinal">
                            <i class="fas fa-save"></i> Save
                        </button>
                    </div>
                </div>
                @endif

            </form>

        </div>
    </div>
</div>
@stop
@include('admin.assets.summernote-text-editor')
@include('admin.assets.select2')

@push('scripts')
@vite('resources/admin_assets/js/pages/user/customer/note/create.js')
@endpush
