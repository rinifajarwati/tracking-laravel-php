function deletePositionModal(uid, name) {
    deletePositionConfirmItem.html(`"${name}"`);
    deletePositionForm.attr("action", `/positions/${uid}`);
    deletePositionListModal.modal("show");
}
