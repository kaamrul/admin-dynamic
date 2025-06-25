$(document).ready(function () {
    $('#summernote').summernote({
        height: 350,
        inheritPlaceholder: true,
        focus: true
    });

    $('.form').on('submit', function(e) {
        if($('#summernote').summernote('isEmpty')) {
            notify('Note is empty, fill it!', 'warning');
          e.preventDefault();
        }
    });
});
