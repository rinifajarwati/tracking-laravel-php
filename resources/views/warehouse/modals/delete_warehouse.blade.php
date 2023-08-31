<div class="modal fade" id="delete_serial_number_item_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete item data</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/warehouse" method="post" autocomplete="off" id="delete_serial_number_form">
                @method('delete')
                @csrf
                <div class="modal-body">
                    Are you sure you want to delete <strong class="text-indigo"
                        id="delete_serial_number_confirm_item"></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="submit" >Delete</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
