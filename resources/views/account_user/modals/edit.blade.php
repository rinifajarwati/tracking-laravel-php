<div class="modal fade" id="edit_signature_item_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit item data</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form
                action="/account-user{{ session('validatorError') === 'edit' && session('uid') ? '/' . session('uid') : '' }}"
                method="post" autocomplete="off" id="edit_signature_item_form" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                    <label for="floatingInput">Signature Image</label>
                    <div class="form-floating mb-3">
                        <input type="file"
                            class="form-control selectpicker @error('img') {{ session('validatorError') === 'edit' ? 'is-invalid' : '' }} @enderror"
                            id="edit_img_uid" name="img">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
