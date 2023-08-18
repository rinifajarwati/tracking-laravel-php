function approvedBtn(uid) {
    approvedWarehouseForm.attr("action", `/warehouse-approved-warehouse/${uid}`);
    approvedWarehouseListModal.modal("show");
}
