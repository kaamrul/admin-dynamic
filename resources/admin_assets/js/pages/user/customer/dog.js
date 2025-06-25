let customer_id = $("#userId").val();

let columns = [
    { data: 'id' },
    { data: 'name' },
    { data: 'breed' },
    { data: 'dob' },
    { data: 'color' },
    { data: 'allergies' },
    { data: 'council_tag_number' },
    { data: 'active' },
    { data: 'temperament' },
    { data: 'avatar' },
];

let column_defs = [
    { targets: 5, visible: true },
    {"className": "text-center", "targets": [0,2,3,4,6,7,8,9]}
];

var table = $('#dataTable').DataTable({
    order: [[0, 'desc']],
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
        url: BASE_URL + "/users/customers/" + customer_id + "/list-of-dogs"
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
            text : '<i class="fas fa-download"></i> Export',
            extend: 'collection',
            className: 'custom-html-collection pull-right',
            buttons: [
                'pdf',
                'csv',
                'excel',
            ]
        },
        { html: colVisibility('#dataTable', column_defs) },
    ],
    columnDefs: column_defs,
    language: {
        searchPlaceholder: "Search records",
        search: "",
        buttons: {
            pageLength: {
                _: "%d Rows",
            }
        }
    }
});

executeColVisibility(table);
// End Tables