let columns = [
    { data: 'DT_RowIndex' },
    { data: 'name' },
    { data: 'email' },
    { data: 'phone' },
    { data: 'territory_id' },
    // { data: 'avatar' },
    { data: 'action', name: 'action', orderable: false, searchable: false, responsive:true },
];

let column_defs =  buildColumnDefs([0,2,3,4,5])

var table = $('#dataTable').DataTable({
    order: [[0, 'desc']],
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
    ajax: {
        url: BASE_URL + "/users/customers",
        data: function (d) {
            d.status     = $("#customerStatus").val()
            d.is_deleted = $("#isDeleted").val()
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
        { html: '<a class="dt-button buttons-collection" href="'+ BASE_URL +'/users/customers/create"><i class="fas fa-plus"></i> Add New</a>' }
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

window.filterStatus = function (status, type = '')
{
    if (type == 'is_deleted') {
        $("#isDeleted").val(1);
    } else {
        $("#customerStatus").val(status);
        $("#isDeleted").val(0);
    }

    table.ajax.reload();
}

window.restoreCustomer = function (id)
{
    loading('show');

    axios.post(BASE_URL + '/users/' + id + '/restore-api')
        .then(response => {
            notify(response.data.message, 'success');
            table.ajax.reload();
        })
        .catch(error => {
            const response = error.response;
            if (response)
                notify(response.data.message, 'error');
        })
        .finally(() => {
            loading('hide');
        });
}
