function EditBtn(uid, obj) {
    obj = JSON.parse(decodeURIComponent(obj));
    console.log(obj);
    const spinner = new CustomSpinner(editWarehouseModalSpinner);
    spinner.createSpinner();
    spinner.startSpinner();

    editWarehouseListModal.modal("show");
    editWarehouseForm.attr("action", `/warehouse/${uid}`);
    $.each(obj, (key, value) => {
        $(key).val(value);
    });
    spinner.stopSpinner();

    editWarehouseListModal.on("shown.bs.modal", () => {
        editWarehouseNameInput.focus();
    });
}
