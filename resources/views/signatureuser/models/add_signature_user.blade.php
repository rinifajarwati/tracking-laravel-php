<div class="modal fade" id="add_new_warehouse_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan tanda tangan user</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/signatureuser" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <div class="col-12 mb-3">
                            <label>Tanda Tangan</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                id="img" placeholder="Tambahkan Gambar tanda tangan" name="img" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" value="Upload" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

    