$(document).ready(() => {
    addWarehouseDataModal.on("shown.bs.modal", () => {
        addWarehouseDataItemID.focus();
        addWarehouseDataItemSN.focus();
        addWarehouseDataItemWeight.focus();
        addWarehouseDataItemKoli.focus();
        addWarehouseDataItemGdg.focus();
        addWarehouseDataItemKubikasi.focus();
    });
});
