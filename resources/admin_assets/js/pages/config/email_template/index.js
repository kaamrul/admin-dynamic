let columns = [
    { data: 'id' },
    { data: 'name' },
    { data: 'key' },
    { data: 'updated_at' },
    {
        data: 'action',
        orderable: false,
        searchable: false,
        responsive:true
    },
];

let column_defs =  buildColumnDefs([0,3])

var table = $('#emailTemplateDataTable').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
        url: BASE_URL + "/configs/more-settings/email-templates",
    },
    columns: columns,
    aLengthMenu: [
        [10, 50, 100, 200, 500, -1],
        [10, 50, 100, 200, 500, "All"]
    ],
    dom: 'Bfrtip',
    buttons: [
        'pageLength',
        { html: colVisibility('#emailTemplateDataTable', column_defs) },
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
