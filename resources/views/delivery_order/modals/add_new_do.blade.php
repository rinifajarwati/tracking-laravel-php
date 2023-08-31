<div class="modal fade" id="add_new_delivery_order_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new file delivery order</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/delivery-order" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <div class="col-12 mb-3">
                            <label>Number SO</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_no_so" placeholder="Number SO" name="no_so"
                                value="{{ old('no_so') }}" maxlength="255" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Number SJ</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_no_sj" placeholder="Number SJ" name="no_sj"
                                value="{{ old('no_sj') }}" maxlength="255" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_description" placeholder=" Description" name="description"
                                value="{{ old('description') }}" maxlength="255">

                        </div>
                        <div class="col-12 mb-3">
                            <label>File</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                id="add_file" placeholder="file" name="file" accept="application/pdf" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label>No Resi</label>
                            <input type="text" class="form-control @error('no_resi') is-invalid @enderror"
                                id="add_no_resi" placeholder="No Resi" name="no_resi"
                                value="{{ old('no_resi') }}" maxlength="255">
                        </div>
                        <div class="col-12 mb-3">
                            <label>Jasa Ekspedisi</label>
                            <input type="text" class="form-control @error('jasa_ekspedisi') is-invalid @enderror"
                                id="add_jasa_ekspedisi" placeholder="Jasa Ekspedisi" name="jasa_ekspedisi"
                                value="{{ old('jasa_ekspedisi') }}" maxlength="255">
                        </div>
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
