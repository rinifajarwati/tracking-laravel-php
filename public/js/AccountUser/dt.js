ListDataTable.bootstrapTable({
    url:"/datatables/account-user",
    showColumns: true,
    showColumnsToggleAll: true,
    showRefresh: true,
    sortable: true,
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
    columns :[
        {
            title:"Signature",
            field:"uid",
            sortable: true,
            formatter:(value, row) => {
                const urlFile = '/assetsgambar/file/' +row.img;
                return '<a href="'+ urlFile +'" class="badge bg-info text-decoration-none" target="_blank">Signature</a>' 
            }
        },
        {
            title: "Action",
            field: "uid",
            sortable: true,
            formatter:(value, row) => {
                const fields = {

                };
                const obj = encodeURIComponent(JSON.stringify(fields));
                let buttons = "";
                buttons += `
                <button class="btn btn-datatable btn-icon btn-transparent-dark my-auto" onclick="EditSignatureListModal('${row.uid}', '${obj}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                <i class="far fa-edit fa-fw"></i>
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