function approvedBtn(uid) {
    approvedSalesForm.attr("action", `/letter-retur-approved-sales/${uid}`);
    approvedSalesListModal.modal("show");
}
