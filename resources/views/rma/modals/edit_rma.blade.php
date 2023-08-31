<div class="modal fade" id="edit_rma_item_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit item file Surat Perintah Kerja</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form
                action="/rma/{{ session('validatorError') === 'edit' && session('uid') ? '/' . session('uid') : '' }}"
                method="post" autocomplete="off" id="edit_rma_item_form">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kerusakan">Kerusakan</label>
                        <textarea class="form-control" id="edit_kerusakan" name="kerusakan" value="{{ old('kerusakan') }}"></textarea>
                    </div>
            
                    <div class="form-group">
                        <label for="perbaikkan">Perbaikkan</label>
                        <textarea class="form-control" id="edit_perbaikkan" name="perbaikkan" value="{{ old('perbaikkan') }}"></textarea>
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
