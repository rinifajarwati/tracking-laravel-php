<div class="modal fade" id="approved_sales_item_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">approved data SO Harga</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/soharga-approval/{uid}" method="post" autocomplete="off"
                id="approved_sales_level_item_form">
                @method('put')
                @csrf
                <div class="modal-body">
                    Are you sure you want to approved SO Harga? <strong class="text-indigo"
                        id="approved_sales_item_confirm_item"></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="submit">Yes</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
