function approvedBtnMPpic(uid) {
    approvedMarketingForm.attr("action", `/letter-retur-approved-scm/${uid}`);
    approvedMarketingListModal.modal("show");
}
