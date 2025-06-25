$(document).ready(function () {
    $(".close, .btn-close").on('click', function () {
        $(".modal").modal('hide');
    })

    const updateUserStatusModal = "#updateUserStatusModal";
    window.clickUpdateStatus = function () {
        $(updateUserStatusModal).modal('show');
    }
});

