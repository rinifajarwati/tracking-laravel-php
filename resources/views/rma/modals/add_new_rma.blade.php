<div class="modal fade" id="add_new_rma_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new file RMA</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/rma" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <div class="col-12 mb-3">
                            <label>Number SPK</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_no_spk" placeholder="Number SPK" name="no_spk"
                                value="{{ old('no_spk') }}" maxlength="255" required>

                        </div>
                        <div class="col-12 mb-3">
                            <label>Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_description" placeholder=" Description" name="description"
                                value="{{ old('description') }}" maxlength="255" required>

                        </div>
                        <div class="col-12 mb-3">
                            <label>Status Garansi</label>
                            <select class="form-select" id="add_warranty" name="warranty">
                                <option value="">Choose...</option>
                                <option value="Garansi">Garansi</option>
                                <option value="Non-Garansi">Non Garansi</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label>File</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                id="add_file" placeholder="file" name="file" accept="application/pdf" required>
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
