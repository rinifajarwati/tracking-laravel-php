<div class="modal fade" id="add_new_rma_modal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new file Surat Perintah Keja</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/rma" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label>Number SPK</label>
                            <input type="text" class="form-control @error('no_spk') is-invalid @enderror"
                                id="add_no_spk" placeholder="Number SPK" name="no_spk" value="{{ old('no_spk') }}"
                                maxlength="255" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label>Serial Number</label>
                            <input type="text" class="form-control @error('no_sn') is-invalid @enderror"
                                id="add_no_sn" placeholder="Serial Number" name="no_sn" value="{{ old('no_spk') }}"
                                maxlength="255" required>
                        </div>
                        <div class="col-12 mb-6">
                            <label>Kerusakan</label>
                            <textarea class="form-control @error('kerusakan') is-invalid @enderror" placeholder="Kerusakan" id="add_kerusakan"
                                value="{{ old('kerusakan') }}" name="kerusakan" style="height: 100px"></textarea>
                            <label for="floatingTextarea2"></label>
                        </div>
                        <div class="col-12 mb-6">
                            <label>Perbaikkan</label>
                            <textarea class="form-control @error('perbaikkan') is-invalid @enderror" placeholder="Perbaikkan" id="add_perbaikkan"
                            value="{{ old('perbaikkan') }}" name="perbaikkan" style="height: 100px"></textarea>
                        <label for="floatingTextarea2"></label>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="description" id="add_description"
                            value="{{ old('description') }}" name="description" style="height: 100px"></textarea>
                        <label for="floatingTextarea2"></label>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Status Garansi</label>
                            <select class="form-select" id="add_warranty" name="warranty" required>
                                <option value="">Choose...</option>
                                <option value="Garansi">Garansi</option>
                                <option value="Non-Garansi">Non Garansi</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Teknisi</label>
                            <select class="form-select" aria-label="Default select example" name="name_teknisi"
                                required>
                                <option value="">Name Teknisi</option>
                                @foreach ($getUser as $item)
                                    <option value="{{ $item['uid'] }}">{{ $item['name'] }}</option>
                                @endforeach
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
