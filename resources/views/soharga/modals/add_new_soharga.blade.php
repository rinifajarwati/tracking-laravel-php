<div class="modal fade" id="add_new_soharga_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new file SO Harga</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/soharga" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <div class="col-12 mb-3">
                            <label>So Number</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_so_number" placeholder="Number Sales Order" name="so_number"
                                value="{{ old('so_number') }}" maxlength="255" required>

                        </div>
                        <div class="col-12 mb-3">
                            <label>Po Number</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_po_no" placeholder="Number Sales Order" name="po_no"
                                value="{{ old('po_no') }}" maxlength="255" required>

                        </div>
                        <div class="col-12 mb-3">
                            <label>Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_description" placeholder=" Description" name="description"
                                value="{{ old('description') }}" maxlength="255" required>

                        </div>
                        <div class="col-12 mb-3">
                            <label>File</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                id="add_file" placeholder="file" name="file" required>
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
