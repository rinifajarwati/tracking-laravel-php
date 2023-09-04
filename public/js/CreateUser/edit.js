function editUserModal(uid, obj, division_uid, position_uid) {
    obj = JSON.parse(decodeURIComponent(obj));
    const spinner = new CustomSpinner(editUserModalSpinner);
    spinner.createSpinner();
    spinner.startSpinner();
    console.log(obj);

    getDivisions(editUserDivisionInput, division_uid).then(() => {
        editUserListModal.modal("show");
        editUserForm.attr("action", `/create-user/${uid}`);
        $.each(obj, (key, value) => {
            $(key).val(value);
        });
        spinner.stopSpinner();
    });

    getPositions(editUserPositionInput, position_uid).then(() => {
        editUserListModal.modal("show");
        editUserForm.attr("action", `/create-user/${uid}`);
        $.each(obj, (key, value) => {
            $(key).val(value);
        });
        spinner.stopSpinner();
    });

    // getPositions(editUserPermissionInput, permission_id).then(() => {
    //     editUserListModal.modal("show");
    //     editUserForm.attr("action", `/create-user/${uid}`);
    //     $.each(obj, (key, value) => {
    //         $(key).val(value);
    //     });
    //     spinner.stopSpinner();
    // });


    

    editUserListModal.on("shown.bs.modal", () => {
        editUserNameInput.focus();
    });
}
