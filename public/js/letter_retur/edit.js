function EditBtn(uid, obj) {
    obj = JSON.parse(decodeURIComponent(obj));
    console.log(obj);
    const spinner = new CustomSpinner(editLetterReturModalSpinner);
    spinner.createSpinner();
    spinner.startSpinner();

    editLetterReturListModal.modal("show");
    editLetterReturForm.attr("action", `/letter-retur/${uid}`);
    $.each(obj, (key, value) => {
        $(key).val(value);
    });
    spinner.stopSpinner();

    editLetterReturListModal.on("shown.bs.modal", () => {
        editLetterReturNameInput.focus();
    });
}
