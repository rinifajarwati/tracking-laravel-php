function approvedBtn(uid) {
    approvedSalesForm.attr("action", `/soharga-approved-sales/${uid}`);
    approvedSalesListModal.modal("show");
}
