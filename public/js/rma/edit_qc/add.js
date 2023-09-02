$(document).ready(() => {
    addRmaQcDataModal.on("shown.bs.modal", () => {
        addRmaQcDataItemKelengkapan.focus();
        addRmaQcDataItemQty.focus();
        addRmaQcDataItemTdkAda.focus();
        addRmaQcDataItemAda.focus();
        addRmaQcDataItemFungsi.focus();
    });
});
