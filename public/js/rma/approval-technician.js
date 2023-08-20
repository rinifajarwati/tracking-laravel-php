function approvedBtn(uid) {
    approvedTechnicianForm.attr("action", `/rma-approved-technician/${uid}`);
    approvedTechnicianListModal.modal("show");
}
