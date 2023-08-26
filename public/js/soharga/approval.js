function approvedBtnAdminharga(uid) {
    approvedAdminhargaForm.attr("action", `/soharga-approved-adminsales/${uid}`);
    approvedAdminhargaListModal.modal("show");
}
