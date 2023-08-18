function approvedBtn(uid) {
    approvedSalesForm.attr("action", `/rma-approved-sales/${uid}`);
    approvedSalesListModal.modal("show");
}
