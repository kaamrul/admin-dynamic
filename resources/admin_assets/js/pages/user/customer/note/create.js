$(document).ready(function () {
    $('#summernote').summernote({
        height: 300,
        placeholder: "Write Description (Required)",
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ],
    });

    $("#note_category").select2({
        placeholder: "Note Type(Required)",
        allowClear: true
    });
});

$(document).ready(function () {
    var i = 1;
    $("#add").click(function () {
        i++;
        $('#dynamic_field').append('<div class="row" id="row' + i + '">' +
            '<div class="col-xl-4 col-sm-4 col-12">' +
            '<div class="form-group row p-1">' +
            '<input type="text" name="name[]" id="name' + i + '" onkeyup="attachmentRequired(' + i + ')" class="name_list form-control"' +
            'placeholder="File Name">' +
            '</div>' +
            '</div>' +

            '<div class="col-xl-6 col-sm-6 col-12">' +
            '<div class="form-group">' +
            '<div class="file-upload-section d-flex d-inline-flex">' +
            '   <input name="attachment[]" type="file" id="attachment' + i + '" onchange="attachmentRequired(' + i + ')" class="attached_file form-control d-none" allowed="*">' +
            '       <div class="input-group p-1">' +
            '           <input type="text" class="form-control file-upload-info" disabled="" readonly' +
            '               placeholder="Size: 500kB">' +
            '           <span>' +
            '               <button class="file-upload-browse btn btn-outline-secondary pb-3"' +
            '                   type="button"><i class="fas fa-upload"></i></button>' +
            '           </span>' +
            '       </div>' +
            '       <div class="display-input-image display-input-image2 d-none">' +
            '           <img src="" alt="Preview Image" />' +
            '       </div>' +
            '   </div>' +
            '</div>' +
            '</div>' +
            '    <div class="col-md-2 d-flex align-items-center">' +
            '<div class="form-group mr-1">' +
            '        <button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm icon-btn ms-3 mb-2 btn_remove"><i class="fas fa-close"></i></button>' +
            '    </div>' +
            '    </div>' +
            '</div>');
    });

    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

});
