function approvedBtn(uid) {
    approvedDoQcForm.attr("action", `/do-qc-approved/${uid}`);
    approvedDoQcListModal.modal("show");
}
