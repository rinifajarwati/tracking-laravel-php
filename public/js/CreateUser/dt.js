ListDataTable.bootstrapTable({
    url:"/datatables/create-user",
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
    columns :[
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
            title: "Devisison",
            field: "division.name",
            sortable: true,
        },
        {
            title:"Signature User",
            field:"uid",
            sortable: true,
            formatter:(value, row) => {
                const urlFile = '/assetsgambar/file/' +row.img;
                return '<a href="'+ urlFile +'" class="badge bg-info text-decoration-none" target="_blank">Signature</a>' 
            }
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