listDataPosition.bootstrapTable({
    url: "/datatables/positions",
    showColumns: true,
    showColumnsToggleAll: true,
    showRefresh: true,
    sortable: true,
    search: true,
    searchOnEnterKey: false,
    searchHighlight: true,
    pagination: true,
    pageSize: 50,
    pageList: [50, 100, 200],
    cookie: true,
    cookieIdTable: "position_list_data_table",
    icons: {
        refresh: "fas fa-sync",
        columns: "fas fa-th-list",
    },
    columns: [
        {
            title: "Position Name",
            field: "name",
            sortable: true,
        },
        {
            title: "Action",
            field: "uid",
            sortable: true,
            formatter: (value, row) => {
                const fields = {
                    "#edit_position_item_name": row.name
                };
                const obj = encodeURIComponent(JSON.stringify(fields));

                let buttons = "";
                buttons += `
                    <button class="btn btn-datatable btn-icon btn-transparent-dark my-auto" onclick="deletePositionModal('${row.uid}', '${row.name}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
                        <i class="far fa-trash-can fa-fw"></i>
                    </button>
                `
                return `
                <div class="d-flex space-x">
                    ${buttons}
                </div>
            `;
            },
        },
    ],

    onPostBody: () => {
        const tooltipTriggerList = document.querySelectorAll(
            '[data-bs-toggle="tooltip"]'
        );
        const tooltipList = [...tooltipTriggerList].map(
            (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
        );
    },
});
