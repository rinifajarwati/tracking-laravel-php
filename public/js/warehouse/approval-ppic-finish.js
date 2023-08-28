function approvedBtnFinish(uid) {
    approvedPPICFinishForm.attr("action", `/warehouse-approved-ppic-finish/${uid}`);
    approvedPPICFinishListModal.modal("show");
}
