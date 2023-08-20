function approvedBtn(uid) {
    approvedLogisticsForm.attr("action", `/warehouse-approved-logistics/${uid}`);
    approvedLogisticsListModal.modal("show");
}
