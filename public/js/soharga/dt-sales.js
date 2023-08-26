listDataSoharga.bootstrapTable({
    url: "/datatables/soharga-approved-sales'",
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
    cookieIdTable: "soharga_list_data_table",
    icons: {
        refresh: "fas fa-sync",
        columns: "fas fa-th-list",
    },
    columns: [
        {
            title: "Action",
            field: "uid",
            sortable:true,
            formatter:(value, row) => {
                const fields = {

                };
                const obj = encodeURIComponent(JSON.stringify(fields));
                let buttons = "";
                buttons += `<button class="btn btn-warning btn-icon btn-transparent-dark my-auto" onclick="pdfBtn('${row.uid}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pdf"> 
                <i class="fa-solid fa-file-pdf"></i>
                </button>`
                if(row.status === "Created"){
                    buttons += `<button class="btn btn-warning btn-icon btn-transparent-dark my-auto" onclick="approvedBtn('${row.uid}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Approval"> 
                    <i class="fas fa-check fa-fw"></i>
                    </button>`
                }else if(row.status === "Approved-By"){
                    buttons += `<button class="btn btn-warning btn-icon btn-transparent-dark my-auto" onclick="approvedBtnPpic('${row.uid}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Approval"> 
                    <i class="fas fa-check fa-fw"></i>
                    </button>`
                }else{

                }
                return `<div class="d-flex space-x">${buttons}</div>`;
            }
        },
        {
            title: "SO Number",
            field: "so_number",
            sortable: true,
        },
        {
            title: "Po Number",
            field: "po_no",
            sortable: true,
        },
        {
            title: "Description",
            field: "description",
            sortable: true,
        },
        {
            title: "File",
            field: "uid",
            sortable: true,
            formatter: (value, row) => {
                const urlFile = "/assets/pdf/file/" + row.file;
                return (
                    '<a href ="' +
                    urlFile +
                    '" class="badge bg-info text-decoration-none" target="_blank">Lihat File</a>'
                );
            },
        },
        {
            title:"Status",
            field:"status",
            sortable: true,
            formatter: (value, row) => {
                let buttonHtml = '';
                if(value === "Created"){
                    buttonHtml = `<button class="badge bg-info" style="border:none">${value}</button>` 
                }
                if(value === "Approved-By"){
                    buttonHtml = `<button class="badge bg-success" style="border:none;">${value}</button>`
                }
                if(value === "Approval-Sales"){
                    buttonHtml = `<button class="badge bg-danger" style="border:none;">${value}</button>`
                }
                return buttonHtml;
            }
        },
        {
            title: "Created Name",
            field: "user.name",
            sortable: true,
        },
        {
            title: "Created Date",
            field: "created_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "Sales Name",
            field: "sales_name",
            sortable: true,
            formatter(value, row){
                return row.s_c_name ? row.s_c_name.name : null;
            },
        },
        {
            title: "Approved Date sales",
            field: "sales_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "Adminsales Name",
            field: "adminsales_name",
            formatter(value, row){
                return row.p_name ? row.p_name.name : null;
            },
            sortable: true,
        },
        {
            title: "Approved Date",
            field: "adminsales_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
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
