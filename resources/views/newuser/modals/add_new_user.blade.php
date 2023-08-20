<div class="modal fade" id="add_new_warehouse_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new user</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/warehouse" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <div class="col-12 mb-3">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_no_so" placeholder="Number Sales Order" name="no_so"
                                value="{{ old('no_so') }}" maxlength="255" required>

                        </div>
                        <div class="col-12 mb-3">
                            <label>Email</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_description" placeholder=" Description" name="description"
                                value="{{ old('description') }}" maxlength="255" required>

                        </div>
                        <div class="col-12 mb-3">
                            <label>Password</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="text" class="form-control @error('file') is-invalid @enderror"
                                id="add_file" placeholder="Password" name="file" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Posisi</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="text" class="form-control @error('file') is-invalid @enderror"
                                id="add_file" placeholder="Posisi" name="file" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Devisi</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="text" class="form-control @error('file') is-invalid @enderror"
                                id="add_file" placeholder="Devisi" name="file" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Tanda Tangan</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                id="add_file" placeholder="Tambahkan Gambar tanda tangan" name="file" required>
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
