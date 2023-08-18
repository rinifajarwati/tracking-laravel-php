function approvedBtnPpic(uid) {
    approvedPPICForm.attr("action", `/warehouse-approved/${uid}`);
    approvedPPICListModal.modal("show");
}
