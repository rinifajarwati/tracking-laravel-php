listDataRmaFinish.bootstrapTable({
    url: "/datatables/rma-finish",
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
    cookieIdTable: "rma_finish_list_data_table",
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
                buttons += `<button class="btn btn-warning btn-icon btn-transparent-dark my-auto" onclick="DetailsBtn('${row.uid}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Details"> 
                <i class="fas fa-book-medical fa-fw"></i>
                </button>`;

                buttons += `<button class="btn btn-warning btn-icon btn-transparent-dark my-auto" onclick="pdfBtn('${row.uid}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pdf"> 
                <i class="fa-solid fa-file-pdf"></i>
                </button>`;

                if (row.status === "Approval-Qc") {
                    buttons += `<button class="btn btn-warning btn-icon btn-transparent-dark my-auto" onclick="approvedBtnFinish('${row.uid}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Approval"> 
                    <i class="fas fa-check fa-fw"></i>
                    </button>`;
                } else {
                }
                return `<div class="d-flex space-x">${buttons}</div>`;
            },
        },
        {
            title: "No SPK",
            field: "no_spk",
            sortable: true,
        },
        {
            title: "Serial Number",
            field: "no_sn",
            sortable: true,
        },
        {
            title: "Status Garansi",
            field: "warranty",
            sortable: true,
        },
        {
            title: "File",
            field: "uid",
            sortable: true,
            formatter: (value, row) => {
                const urlFile = "/assets/pdf/rma/" + row.file;
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
                if (value === "Approval-Technician") {
                    buttonHtml = `<button class="badge bg-primary" style="border:none">${value}</button>`;
                }
                if (value === "Approval-Qc") {
                    buttonHtml = `<button class="badge bg-primary" style="border:none">${value}</button>`;
                }
                if (value === "Cancel") {
                    buttonHtml = `<button class="badge bg-warning" style="border:none">${value}</button>`;
                }
                if (value === "Finish") {
                    buttonHtml = `<button class="badge bg-success" style="border:none;">${value}</button>`;
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
            title: "Technician Name",
            field: "Technician_name",
            formatter(value, row) {
                return row.t_name ? row.t_name.name : null;
            },
            sortable: true,
        },
        {
            title: "Technician Date",
            field: "technician_date",
            sortable: true,
            formatter: (value, row) => {
                return value ? moment(value).format("LLL") : null;
            },
        },
        {
            title: "Qc Name",
            field: "qc_name",
            formatter(value, row) {
                return row.q_name ? row.q_name.name : null;
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
