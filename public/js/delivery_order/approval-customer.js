function approvedBtnCustomer(uid) {
    approvedDoCustomerForm.attr("action", `/do-logistics-customer-approved/${uid}`);
    approvedDoCustomerListModal.modal("show");
}
