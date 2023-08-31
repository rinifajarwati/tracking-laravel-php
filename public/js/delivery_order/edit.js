function EditBtn(uid, obj) {
    obj = JSON.parse(decodeURIComponent(obj));
    console.log(obj);
    const spinner = new CustomSpinner(editDoModalSpinner);
    spinner.createSpinner();
    spinner.startSpinner();

    editDoListModal.modal("show");
    editDoForm.attr("action", `/delivery-order/${uid}`);
    $.each(obj, (key, value) => {
        $(key).val(value);
    });
    spinner.stopSpinner();

    editDoListModal.on("shown.bs.modal", () => {
        editDoNameInput.focus();
    });
}
