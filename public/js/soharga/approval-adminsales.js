function approvedBtn(uid) {
    approvedAdminsalesForm.attr("action", `/soharga-approved-adminsales/${uid}`);
    approvedAdminsalesListModal.modal("show");
}