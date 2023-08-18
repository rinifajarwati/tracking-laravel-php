function approvedBtn(uid) {
    approvedWarehouseForm.attr("action", `/letter-retur-approved-warehouse/${uid}`);
    approvedWarehouseListModal.modal("show");
}
