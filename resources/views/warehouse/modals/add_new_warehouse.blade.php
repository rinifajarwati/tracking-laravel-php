<div class="modal fade" id="add_new_warehouse_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new file SO gudang</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/warehouse" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <div class="col-12 mb-3">
                            <label>Number SO</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_no_so" placeholder="Number Sales Order" name="no_so"
                                value="{{ old('no_so') }}" maxlength="255" required>
                        </div>
                        <div class="col-12">
                            <label>Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" id="add_description"
                                value="{{ old('description') }}" name="description" style="height: 100px" required></textarea>
                            <label for="floatingTextarea2"></label>
                        </div>
                        <div class="col-12 mb-3">
                            <label>File</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                id="add_file" placeholder="file" name="file" accept="application/pdf" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Sales</label>
                            <select class="form-select" aria-label="Default select example" name="sales_name"
                                required>
                                <option value="">Name Sales</option>
                                @foreach ($rowsUser as $item)
                                    <option value="{{ $item['uid'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
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
