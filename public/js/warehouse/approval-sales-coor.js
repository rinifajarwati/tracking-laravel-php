function approvedBtn(uid) {
    approvedSalesCoorForm.attr("action", `/warehouse-approved-sales-coor/${uid}`);
    approvedSalesCoorListModal.modal("show");
}
