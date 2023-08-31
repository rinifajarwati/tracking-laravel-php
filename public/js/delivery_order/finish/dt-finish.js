listDataDoFinish.bootstrapTable({
    url: "/datatables/delivery-order-finish",
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
    cookieIdTable: "delivery_order_finish_list_data_table",
    icons: {
        refresh: "fas fa-sync",
        columns: "fas fa-th-list",
    },
    columns: [
        {
            title: "Action",
            field: "uid",
            sortable: true,
            formatter: (value, row) => {
                const fields = {};
                const obj = encodeURIComponent(JSON.stringify(fields));
                let buttons = "";
                buttons += `<button class="btn btn-warning btn-icon btn-transparent-dark my-auto" onclick="pdfBtn('${row.uid}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pdf"> 
                <i class="fa-solid fa-file-pdf"></i>
                </button>`;
                if (row.status === "Created" && auth_position === "coordinator") {
                    buttons += `<button class="btn btn-warning btn-icon btn-transparent-dark my-auto" onclick="approvedBtnSales('${row.uid}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Approval"> 
                    <i class="fas fa-check fa-fw"></i>
                    </button>`;
                }else {
                }
                return `<div class="d-flex space-x">${buttons}</div>`;
            },
        },
        {
            title: "No SO",
            field: "no_so",
            sortable: true,
        },
        {
            title: "No SJ",
            field: "no_sj",
            sortable: true,
        },
        {
            title: "Description",
            field: "description",
            sortable: true,
        },
        {
            title: "Jasa Ekspedisi",
            field: "jasa_ekspedisi",
            sortable: true,
        },
        {
            title: "No Resi",
            field: "no_resi",
            sortable: true,
        },
        {
            title: "File",
            field: "uid",
            sortable: true,
            formatter: (value, row) => {
                const urlFile = "/assets/pdf/delivery-order/" + row.file;
                return (
                    '<a href ="' +
                    urlFile +
                    '" class="badge bg-info text-decoration-none" target="_blank">Lihat File</a>'
                );
            },
        },
        {
            title: "Delivery Photo",
            field: "img",
            sortable: true,
            formatter: (value, row) => {
                const urlFile = "/assets/img/no-resi/" + row.img;
                return (
                    '<a href ="' +
                    urlFile +
                    '" class="badge bg-info text-decoration-none" target="_blank">Lihat File</a>'
                );
            },
        },
        {
            title: "Status",
            field: "status",
            sortable: true,
            formatter: (value, row) => {
                let buttonHtml = "";
                if (value === "Created") {
                    buttonHtml = `<button class="badge bg-info" style="border:none">${value}</button>`;
                }
                if (value === "Approval-Coor") {
                    buttonHtml = `<button class="badge bg-primary" style="border:none">${value}</button>`;
                }
                if (value === "Approval-Qc") {
                    buttonHtml = `<button class="badge bg-primary" style="border:none">${value}</button>`;
                }
                if (value === "Approval-Logistics") {
                    buttonHtml = `<button class="badge bg-primary" style="border:none">${value}</button>`;
                }
                if (value === "Approval-Customer") {
                    buttonHtml = `<button class="badge bg-success" style="border:none">${value}</button>`;
                }
                if (value === "Cancel") {
                    buttonHtml = `<button class="badge bg-warning" style="border:none">${value}</button>`;
                }
                if (value === "Reject") {
                    buttonHtml = `<button class="badge bg-danger" style="border:none;">${value}</button>`;
                }
                if (value === "Closed") {
                    buttonHtml = `<button class="badge bg-black" style="border:none;">${value}</button>`;
                }
                return buttonHtml;
            },
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
            title: "Coor Name",
            field: "coor_logistics_name",
            formatter(value, row) {
                return row.coor_logistics ? row.coor_logistics.name : null;
                // console.log(row);
            },
            sortable: true,
        },
        {
            title: "Coor Date",
            field: "coor_logistics_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "Qc Name",
            field: "qc_name",
            formatter(value, row) {
                return row.qc_name ? row.qc_name.name : null;
            },
            sortable: true,
        },
        {
            title: "Qc Date",
            field: "qc_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "Logistics Kurir Name",
            field: "logistics_name",
            formatter(value, row) {
                return row.logistics_name ? row.logistics_name.name : null;
            },
            sortable: true,
        },
        {
            title: "Logistics Kurir Date",
            field: "logistics_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "Logistics Customer Name",
            field: "logistics_customer_name",
            formatter(value, row) {
                  return row.customer_name ? row.customer_name.name : null;
            },
            sortable: true,
        },
        {
            title: "Logistics Customer Date",
            field: "logistics_customer_date",
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
