listDataWarehouseSales.bootstrapTable({
    url: "/datatables/warehouse-sales",
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
    cookieIdTable: "warehouse_list_data_table",
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

                buttons += `<button class="btn btn-warning btn-icon btn-transparent-dark my-auto" onclick="DetailsBtn('${row.uid}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Details"> 
                <i class="fas fa-book-medical fa-fw"></i>
                </button>`

                if(row.status === "Created"){
                    buttons += `<button class="btn btn-warning btn-icon btn-transparent-dark my-auto" onclick="approvedBtn('${row.uid}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Approval"> 
                    <i class="fas fa-check fa-fw"></i>
                    </button>`
                }else{

                }
                return `<div class="d-flex space-x">${buttons}</div>`;
            }
        },
        {
            title: "No SO",
            field: "no_so",
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
                    buttonHtml = `<button class="badge bg-primary" style="border:none;">${value}</button>`
                }
                if(value === "Approval-PPIC"){
                    buttonHtml = `<button class="badge bg-primary" style="border:none;">${value}</button>`
                }
                if(value === "Approval-Warehouse"){
                    buttonHtml =`<button class="badge bg-primary" style="border:none">${value}</button>`
                }
                if(value === "Approval-Logistics"){
                    buttonHtml =`<button class="badge bg-primary" style="border:none">${value}</button>`
                }
                if(value === "Cancel"){
                    buttonHtml = `<button class="badge bg-warning" style="border:none">${value}</button>`
                }
                if(value === "Finish"){
                    buttonHtml = `<button class="badge bg-success" style="border:none;">${value}</button>`
                }
                if(value === "Closed"){
                    buttonHtml = `<button class="badge bg-black" style="border:none;">${value}</button>`
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
            title: "Sales",
            field: "sales_coor_name",
            sortable: true,
            formatter(value, row){
                return row.s_c_name ? row.s_c_name.name : null;
            },
        },
        {
            title: "Approved Date",
            field: "sales_coor_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "PPIC Name",
            field: "ppic_name",
            formatter(value, row){
                return row.p_name ? row.p_name.name : null;
            },
            sortable: true,
        },
        {
            title: "PPIC Date",
            field: "ppic_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "Warehouse Name",
            field: "warehouse_name",
            formatter(value, row){
                return row.w_name ? row.w_name.name : null;
            },
            sortable: true,
        },
        {
            title: "Warehouse Date",
            field: "warehouse_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "Logistics Name",
            field: "logistics_name",
            formatter(value, row){
              return row.l_name ? row.l_name.name : null;
            },
            sortable: true,
        },
        {
            title: "Logistics Date",
            field: "logistics_date",
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
