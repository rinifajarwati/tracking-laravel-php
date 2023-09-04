function deleteDivisionModal(uid, name) {
    deleteDivisionConfirmItem.html(`"${name}"`);
    deleteDivisionForm.attr("action", `/divisions/${uid}`);
    deleteDivisionListModal.modal("show");
}
