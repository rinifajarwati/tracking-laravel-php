<div class="modal fade" id="cancel_warehouse_item_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete item data</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/warehouse-cancel/{uid}" method="post" autocomplete="off" id="cancel_warehosue_item_form">
                @method('put')
                @csrf
                <div class="modal-body">
                    Are you sure you want to cancel SO gudang ? <strong class="text-indigo"
                        id="delete_cancel_item_confirm_item"></strong>
                    <input type="text" value="cancel" name="cancel" hidden>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="submit">Yes</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
