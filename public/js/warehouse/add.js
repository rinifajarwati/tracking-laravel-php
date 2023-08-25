$(document).ready(() => {
    addWarehouseDataModal.on("shown.bs.modal", () => {
        addWarehouseDataItemSN.focus();
        addWarehouseDataItemWeight.focus();
        addWarehouseDataItemKoli.focus();
        addWarehouseDataItemGdg.focus();
        addWarehouseDataItemKubikasi.focus();
    });
});
