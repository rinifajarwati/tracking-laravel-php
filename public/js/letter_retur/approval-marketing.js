function approvedBtn(uid) {
    approvedMarketingPpicForm.attr("action", `/letter-retur-approved-marketing/${uid}`);
    approvedMarketingPpicListModal.modal("show");
}
