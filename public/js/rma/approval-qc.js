function approvedBtn(uid) {
    approvedQcForm.attr("action", `/rma-approved-qc/${uid}`);
    approvedQcListModal.modal("show");
}
