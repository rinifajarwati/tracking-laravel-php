listDataLetterRetur.bootstrapTable({
    url: "/datatables/letter-retur",
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
    cookieIdTable: "letter_retur_list_data_table",
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
                return `<div class="d-flex space-x">${buttons}</div>`;
            },
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
            title: "File",
            field: "uid",
            sortable: true,
            formatter: (value, row) => {
                const urlFile = "/assets/pdf/letter-retur/" + row.file;
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
                if (value === "Approval-Warehouse") {
                    buttonHtml = `<button class="badge bg-primary" style="border:none">${value}</button>`;
                }
                if (value === "Approval-Marketing") {
                    buttonHtml = `<button class="badge bg-primary" style="border:none">${value}</button>`;
                }
                if (value === "Approval-PPIC-Marketing") {
                    buttonHtml = `<button class="badge bg-primary" style="border:none">${value}</button>`;
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
            title: "Warehouse Name",
            field: "warehouse_name",
            formatter(value, row) {
                return row.w_name ? row.w_name.name : null;
            },
            sortable: true,
        },
        {
            title: "warehouse Date",
            field: "warehouse_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "Marketing Name",
            field: "marketing_name",
            formatter(value, row) {
                  return row.m_name ? row.m_name.name : null;
            },
            sortable: true,
        },
        {
            title: "Marketing Date",
            field: "marketing_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "Marketing PPIC Name",
            field: "ppic_marketing_name",
            formatter(value, row) {
                  return row.m_p_name ? row.m_p_name.name : null;
            },
            sortable: true,
        },
        {
            title: "Marketing PPIC Date",
            field: "ppic_marketing_date",
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
