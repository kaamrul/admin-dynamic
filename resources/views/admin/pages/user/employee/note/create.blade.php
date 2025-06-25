<div class="card shadow-sm">
    <div class="card-body py-sm-4">
        <form method="post" action="{{ route('admin.user.employee.note.store', $user->id) }}"
            enctype="multipart/form-data">
            @csrf

                <div class="col-12 col-lg-12 notes">
                    <div class="form-group row @error('category') error @enderror p-1">
                        <select class="form-control" name="category" id="note_category" required>
                            <option value="" class="selected highlighted">Select Note Type</option>
                            @foreach($noteTypes as $value)
                            <option class="text-capitalize" value="{{ $value }}" {{(old("category") == $value) ? "selected" : ""}}>
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
                            value="{{ old('title') }}">
                        @error('title')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 notes">
                    <div class="form-group row @error('description') error @enderror p-1">
                        <textarea type="text" name="description" class="form-control" id="summernote"
                            value="{{ old('description') }}" placeholder="Description" style="width: 80%;"></textarea>
                        @error('description')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            <div class="col-md-12" id="dynamic_field">
                <div class="row">
                    <div class="col-xl-4 col-sm-4 col-12 notes">
                        <div class="form-group row @error('name') error @enderror p-1">
                            <input type="text" name="name[]" id="name1" class="form-control name_list" value="{{ old('name[]') }}"
                                placeholder="File Name">
                            @error('name')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 col-12 notes">
                        <div class="form-group @error('attachment') error @enderror">
                            <div class="file-upload-section d-flex d-inline-flex">
                                <input name="attachment[]"  id="attachment1" type="file" class="form-control d-none attached_file" allowed="*">
                                <div class="input-group p-1">
                                    <input type="text" class="form-control file-upload-info" disabled="" readonly
                                        placeholder="Size: 500kB">
                                    <span>
                                        <button class="file-upload-browse btn btn-outline-secondary pb-3"
                                            type="button"><i class="fas fa-upload"></i></button>
                                    </span>
                                </div>
                                @error('attachment')
                                <p class="error-message">{{ $message }}</p>
                                @enderror
                                <div class="display-input-image display-input-image2 d-none">
                                    <img src="" alt="Preview Image" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 d-flex align-items-center notes">
                        <div class="form-group @error('attachment') error @enderror mr-1">
                            <button type="button" class="btn btn-info btn-sm" id="add">
                                <i class="ti-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-sm-4 col-12 pt-3">
                    <span style="color:red" id="nameError"></span>
                </div>
                <div class="col-xl-6 col-sm-6 col-12 pt-3">
                    <span style="color:red" id="fileError"></span>
                </div>
            </div>

            @if(\App\Library\Helper::hasAuthRolePermission('customer_note_create'))
            <div class="row">
                <div class="modal-footer justify-content-center col-md-12">
                    {!! \App\Library\Html::btnReset() !!}
                    <button type="submit" class="btn mr-3 my-3 btn2-secondary d-none" id="subBtnFinal">
                        <i class="fas fa-save"></i> Save
                    </button>

                    <span class="btn mr-3 my-3 btn2-secondary" id="subBtn">
                        <i class="fas fa-save"></i> Save
                    </span>
                </div>
            </div>
            @endif

        </form>
    </div>
</div>

@include('admin.assets.summernote-text-editor')
@include('admin.assets.select2')

@push('scripts')
@vite('resources/admin_assets/js/pages/user/customer/note/create.js')

<script>
    $(document).on('click', '#subBtn', function() {
        let nameRequired = false;
        let fileRequired = false;

        var arrName = $('.name_list').map((i, e) => e.value).get();
        var arrFile = $('.attached_file').map((i, e) => e.value).get();

        let isEmptyNameArray = arrName.every(item => item === '');
        let isEmptyFileArray = arrFile.every(item => item === '');

        if (isEmptyNameArray && isEmptyFileArray) {
            $('#subBtnFinal').click();
            return;
        }

        arrName.forEach(element => {
            if (element == '') {
                nameRequired = true;
            }
        });

        arrFile.forEach(element => {
            if (element == '') {
                fileRequired = true
            }
        });

        if (nameRequired) {
            $("#nameError").text('All Name field is required');
        } else {
            $("#nameError").text('');
        }

        if (fileRequired) {
            $("#fileError").text('All Attachment field is required');
        } else {
            $("#fileError").text('');
        }

        if (!nameRequired && !fileRequired) {
            $('#subBtnFinal').click();
        }

        return;
    });
</script>
@endpush
