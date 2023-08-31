function EditBtn(uid, obj) {
    obj = JSON.parse(decodeURIComponent(obj));
    console.log(obj);
    const spinner = new CustomSpinner(editRmaModalSpinner);
    spinner.createSpinner();
    spinner.startSpinner();

    editRmaListModal.modal("show");
    editRmaForm.attr("action", `/rma/${uid}`);
    $.each(obj, (key, value) => {
        $(key).val(value);
    });
    spinner.stopSpinner();

    editRmaListModal.on("shown.bs.modal", () => {
        editRmaNameInput.focus();
    });
}
