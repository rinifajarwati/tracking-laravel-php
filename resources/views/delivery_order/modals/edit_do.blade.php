<div class="modal fade" id="edit_do_item_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit item file Delivery Order</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form
                action="/rma/{{ session('validatorError') === 'edit' && session('uid') ? '/' . session('uid') : '' }}"
                method="post" autocomplete="off" id="edit_do_item_form" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="col-12 mb-3">
                        <label for="no_resi">No Resi</label>
                        <input type="text" class="form-control" id="edit_no_resi"
                        placeholder="No Resi" name="no_resi" value="{{ old('no_resi') }}">
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label for="no_resi">Jasa Ekspedisi</label>
                        <input type="text" class="form-control" id="edit_jasa_ekspedisi"
                        placeholder="Jasa Ekspedisi" name="jasa_ekspedisi" value="{{ old('jasa_ekspedisi') }}">
                    </div>

                    <div class="col-12 mb-3">
                        <label>Delivery Photo</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" class="form-control @error('img') is-invalid @enderror"
                            id="edit_img" placeholder="img" name="img"  required>
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
