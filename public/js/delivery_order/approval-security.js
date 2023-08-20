function approvedSecurity(uid) {
    approvedDoSecurityForm.attr("action", `/do-logistics-security-approved/${uid}`);
    approvedDoSecurityListModal.modal("show");
}
