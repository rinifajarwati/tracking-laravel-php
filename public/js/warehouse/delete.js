function deleteSerialModal(uid, serial_number) {
    deleteSNConfirmItem.html(`"${serial_number}"`);
    deleteSNForm.attr("action", `/warehouse/${uid}`);
    deleteSNListModal.modal("show");
}
