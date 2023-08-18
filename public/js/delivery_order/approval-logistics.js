function approvedBtn(uid) {
    approvedDoLogisticsForm.attr("action", `/do-logistics-approved/${uid}`);
    approvedDoLogisticsListModal.modal("show");
}
