function EditBtnQc(uid, obj) {
    obj = JSON.parse(decodeURIComponent(obj));
    console.log(uid);
    const spinner = new CustomSpinner(editRmaQcModalSpinner);
    spinner.createSpinner();
    spinner.startSpinner();

    editRmaQcListModal.modal("show");
    editRmaQcForm.attr("action", `/rma-qc/${uid}`);
    $.each(obj, (key, value) => {
        $(key).val(value);
    });
    spinner.stopSpinner();

    editRmaQcListModal.on("shown.bs.modal", () => {
        editRmaQcNameInput.focus();
    });
}