function approvedBtnFinish(uid) {
    approvedFinishForm.attr("action", `/rma-finish/${uid}`);
    approvedFinishListModal.modal("show");
}
