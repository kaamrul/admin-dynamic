let customer_id = $("#userId").val();

let columns = [
    { data: 'id' },
    { data: 'customer' },
    { data: 'product' },
    { data: 'amount' },
    { data: 'number_of_walks' },
    { data: 'used_walks' },
    { data: 'payment_taken_by' },
    { data: 'expired_at' },
    { data: 'payment_method' },
    { data: 'payment_status' },
];

let column_defs =  buildColumnDefs([0,3,4,5,6,7,8,9])

var table = $('#dataTable').DataTable({
    order: [[0, 'desc']],
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
        url: BASE_URL + "/users/customers/" + customer_id + "/purchase-lists"
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
