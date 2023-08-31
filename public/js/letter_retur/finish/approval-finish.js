function approvedBtnFinish(uid) {
    approvedLetterReturFinishForm.attr("action", `/letter-retur-finish/${uid}`);
    approvedLetterReturFinishListModal.modal("show");
}
