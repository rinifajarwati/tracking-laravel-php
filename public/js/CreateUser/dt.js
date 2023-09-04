ListDataTable.bootstrapTable({
    url: "/datatables/create-user",
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
    cookieIdTable: "signature_data_table",
    icons: {
        refresh: "fas fa-sync",
        columns: "fas fa-th-list",
    },
    columns: [
        {
            title: "Name",
            field: "name",
            sortable: true,
        },
        {
            title: "Email",
            field: "email",
            sortable: true,
        },
        {
            title: "Position",
            field: "position_uid",
            sortable: true,
        },
        {
            title: "Division",
            field: "division.name",
            sortable: true,
        },
        {
            title: "Signature User",
            field: "uid",
            sortable: true,
            formatter: (value, row) => {
                const urlFile = "/assetsgambar/file/" + row.img;
                return (
                    '<a href="' +
                    urlFile +
                    '" class="badge bg-info text-decoration-none" target="_blank">Signature</a>'
                );
            },
        },
        {
            title: "Action",
            field: "uid",
            sortable: true,
            formatter: (value, row) => {
                const fields = {
                    "#edit_position_item_name": row.name,
                };
                const obj = encodeURIComponent(JSON.stringify(fields));

                let buttons = "";
                buttons += `
                <button class="btn btn-datatable btn-icon btn-transparent-dark my-auto" onclick="editUserModal('${row.uid}', '${obj}','${row?.division_uid}','${row?.position_uid}','edit_user_item_modal')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                    <i class="far fa-edit fa-fw"></i>
                </button>
                `;

                buttons += `
                    <button class="btn btn-datatable btn-icon btn-transparent-dark my-auto" onclick="deleteUserModal('${row.uid}', '${row.name}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
                        <i class="far fa-trash-can fa-fw"></i>
                    </button>
                `;
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
