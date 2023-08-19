listDataNewuser.bootstrapTable({
    url: "/datatables/newuser",
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
    cookieIdTable: "newuser_list_data_user",
    icons: {
        refresh: "fas fa-sync",
        columns: "fas fa-th-list",
    },
    columns: [
        {
            title: "Nama",
            field: "name",
            sortable: true,
        },
        {
            title: "Email",
            field: "email",
            sortable: true,
        },

        {
            title: "Password",
            field: "password",
            sortable: true,
        },

        {
            title: "Posisi",
            field: "position_id",
            sortable: true,
        },

        {
            title: "Devisi",
            field: "devision_id",
            sortable: true,
        },
        {
            title: "Tanda Tangan",
            field: "img",
            sortable: true,
            formatter: (value, row) => {
                const urlFile = "/assets/pdf/file/" + row.file;
                return (
                    '<a href ="' +
                    urlFile +
                    '" class="badge bg-info text-decoration-none" target="_blank">Lihat File</a>'
                );
            },
        }
        // },
        // {
        //     title: "Created Name",
        //     field: "user.name",
        //     sortable: true,
        // },
        // {
        //     title: "Created At",
        //     field: "created_at",
        //     sortable: true,
        //     formatter: (value, row) => {
        //         return value ? moment(value).format("LLL") : null;
        //     },
        // },
        // {
        //     title: "Status",
        //     class: "text-nowrap",
        //     field: "created_at",
        //     sortable: true,
        //     formatter: (value, row) => {
        //         const type = value;

        //         var addClass = "badge bg-red";
        //         var text = "N/A";

        //         if (row.created_at) {
        //             addClass = "badge bg-teal";
        //             text = "Created";
        //         }
        //         if (row.accepted_at) {
        //             addClass = "badge bg-green";
        //             text = "Accepted";
        //         }
        //         if (row.rejected_at) {
        //             addClass = "badge bg-red";
        //             text = "Rejected";
        //         }
        //         if (row.purchased_at) {
        //             addClass = "badge bg-cyan";
        //             text = "Purchased";
        //         }
        //         if (row.received_at) {
        //             addClass = "badge bg-orange";
        //             text = "Received";
        //         }
        //         if (row.closed_at) {
        //             addClass = "badge bg-gray-600";
        //             text = "Closed";
        //         }

        //         const badge = `<span class="${addClass}">${text}</span>`;

        //         return badge;
        //     },
        // },
        // {
        //     title: "Action",
        //     field: "uid",
        //     sortable: true,
        //     formatter: (value, row) => {
        //         const fields = {
        //             "#edit_division_item_name": row.name
        //         };
        //         const obj = encodeURIComponent(JSON.stringify(fields));

        //         let buttons = "";
        //         // buttons += `
        //         //     <button class="btn btn-datatable btn-icon btn-transparent-dark my-auto" onclick="editDivisionModal('${row.uid}', '${obj}','edit_division_item_modal')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
        //         //         <i class="far fa-edit fa-fw"></i>
        //         //     </button>
        //         // `
        //         // buttons += `
        //         //     <button class="btn btn-datatable btn-icon btn-transparent-dark my-auto" onclick="deleteDivisionModal('${row.uid}', '${row.name}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
        //         //         <i class="far fa-trash-can fa-fw"></i>
        //         //     </button>
        //         // `
        //         return `
        //         <div class="d-flex space-x">
        //             ${buttons}
        //         </div>
        //     `;
        //     },
        // },
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
