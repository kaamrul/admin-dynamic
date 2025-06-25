$(document).ready(function () {
    $('#summernote').summernote({
        height: 500,
        inheritPlaceholder: true,
        focus: true
    });

    $('.form').on('submit', function(e) {
        if($('#summernote').summernote('isEmpty')) {
            notify('Note is empty, fill it!', 'warning');
          e.preventDefault();
        }
    });

    $("#category").select2({
        placeholder: "Select One",
        allowClear: true
    });

    $("#tags").select2({
        placeholder: "Select One",
        allowClear: true
    });
});
