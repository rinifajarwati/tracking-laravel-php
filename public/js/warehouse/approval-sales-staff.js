function approvedBtnStaff(uid) {
    approvedSalesStaffForm.attr("action", `/warehouse-approved-sales-staff/${uid}`);
    approvedSalesStaffListModal.modal("show");
}
