function EditSignatureListModal(uid, obj){
    obj = JSON.parse(decodeURIComponent(obj));

    EditSignatureModal.modal("show");
    editSignatureForm.attr("action", `/account-user/${uid}`);
    $.each(obj, (key, value) => {
        $(key).val(value);
    });
    spinner.stopSpinner();
    EditSignatureModal.on("show.bs.modal");
}