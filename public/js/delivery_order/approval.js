function approvedBtn(uid) {
    approvedDoSales1Form.attr("action", `/do-sales1-approved/${uid}`);
    approvedDoSales1ListModal.modal("show");
}
