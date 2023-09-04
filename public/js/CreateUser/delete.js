function deleteUserModal(uid, name) {
    deleteUserConfirmItem.html(`"${name}"`);
    deleteUserForm.attr("action", `/create-user/${uid}`);
    deleteUserListModal.modal("show");
}
