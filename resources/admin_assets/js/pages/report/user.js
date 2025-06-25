let columns = [
    { data: 'id' },
    { data: 'name' },
    { data: 'email' },
    { data: 'phone' },
    { data: 'user_type' },
    { data: 'status' },
    { data: 'ethnicity' },
    { data: 'dob' },
    { data: 'gender' },
    { data: 'entitlement_to_work' },
    { data: 'job_title' },
    { data: 'employment_type' },
    { data: 'client_id' },
    { data: 'employee_id' },
    { data: 'operator' },
];
let column_defs = [
    { targets: 7, visible: false },
    { targets: 8, visible: false },
    { targets: 9, visible: false },
    { targets: 10, visible: false },
    { targets: 11, visible: false },
    { targets: 12, visible: false },
    { targets: 13, visible: false },
    { targets: 14, visible: false },
    { "className": "text-center", "targets": [0,4,5,6,7,8,9,10,11,12,13,14] }
];

var table = $('#usersReportDataTable').DataTable({
    order: [[0, 'desc']],
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
        url: BASE_URL + "/report/users",
        data: function (d) {
            d.type   = $("#type").val()
            d.location = $("#location").val()
            d.status = $("#status").val()
            d.fromDate = $("#fromDate").val()
            d.toDate = $("#toDate").val()
        }
    },
    columns: columns,
    aLengthMenu: [
        [10, 50, 100, 200, 500, -1],
        [10, 50, 100, 200, 500, "All"]
    ],
    dom: 'Bfrtip',
    buttons: [
        'pageLength',
        {
            text: '<i class="fas fa-download"></i> Export',
            extend: 'collection',
            className: 'custom-html-collection pull-right',
            buttons: [
                'pdf',
                'csv',
                'excel',
            ]
        },
        { html: colVisibility('#usersReportDataTable', column_defs) },

    ],
    columnDefs: column_defs,
    language: {
        searchPlaceholder: "Search records",
        search: "",
        buttons: {
            pageLength: {
                _: "%d rows",
            }
        }
    }
});

executeColVisibility(table);
// End Tables

$(document).ready(function () {
    $('#type').select2({
        placeholder: "Select User Type",
        allowClear: true
    });

    $('#location').select2({
        placeholder: "Select Location",
        allowClear: true
    });

    $('#status').select2({
        placeholder: "Select Status",
        allowClear: true
    });
});

window.filterUsers = function () {
    table.ajax.reload();
}

window.filterClear = function () {
    $('#type').val([]).trigger('change');
    $('#location').val([]).trigger('change');
    $('#status').val([]).trigger('change');
    $('input[name="date_range"]').val([]);

    table.ajax.reload();
}
