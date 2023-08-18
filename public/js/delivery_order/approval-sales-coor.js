function approvedBtnSales(uid) {
    approvedDoSales2Form.attr("action", `/do-sales2-approved/${uid}`);
    approvedDoSales2ListModal.modal("show");
}
