function approvedBtnFinance(uid) {
    approvedLetterReturFinanceForm.attr("action", `/letter-retur-finance/${uid}`); 
    approvedLetterReturFinanceListModal.modal("show");
}
