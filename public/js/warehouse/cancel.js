function cancelBtn(uid) {
    cancelWarehouseForm.attr("action", `/warehouse-cancel/${uid}`);
    cancelWarehouseListModal.modal("show");
}
