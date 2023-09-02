<div class="modal fade" id="edit_rma_qc_item_modal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">List QC</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form
                action="/rma-qc/{{ session('validatorError') === 'edit' && session('uid') ? '/' . session('uid') : '' }}"
                method="post" autocomplete="off" id="edit_rma_qc_item_form">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="col-12 mb-3">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="edit_type" placeholder="Type" name="type"
                            value="{{ old('type') }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" id="edit_sn" placeholder="SN" name="sn"
                            value="{{ old('sn') }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="no_spk">No SPK</label>
                        <input type="text" class="form-control" id="edit_no_spk" placeholder="NO SPK" name="no_spk"
                            value="{{ old('no_spk') }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="sn">Date</label>
                        <input type="date" class="form-control" id="edit_tgl" placeholder="Tanggal" name="tgl"
                            value="{{ old('tgl') }}">
                    </div>
                    <table class="table-borderless table mb-0">
                        <tbody id="add_rma_qc_tbody">
                            <tr>
                                <td>
                                    <label>Kelengkapan</label>
                                    <input type="text"
                                        class="form-control @error('data[0][kelengkapan]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
                                        value="{{ old('kelengkapan') }}" id="edit_kelengkapan" placeholder="Kelengkapan"
                                        name="data[0][kelengkapan]" maxlength="255" required>
                                    <input type="hidden" name="data[0][rmas_uid]">
                                </td>
                                <td>
                                    <label>Qty</label>
                                    <input type="number"
                                        class="form-control @error('data[0][qty]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
                                        value="{{ old('qty') }}" id="edit_qty" placeholder="Qty" name="data[0][qty]"
                                        maxlength="255" required>
                                </td>
                                <td>
                                    <label>Tidak Ada</label>
                                    <input type="text"
                                        class="form-control @error('data[0][no]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
                                        value="{{ old('no') }}" id="edit_no" placeholder="Tidak Ada"
                                        name="data[0][no]" maxlength="255">
                                </td>
                                <td>
                                    <label>Ada</label>
                                    <input type="text"
                                        class="form-control @error('data[0][yes]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
                                        value="{{ old('yes') }}" id="edit_yes" placeholder="Ada" name="data[0][yes]"
                                        maxlength="255">
                                </td>
                                <td>
                                    <label>Fungsi</label>
                                    <select class="form-select" id="edit_fungsi" name="data[0][fungsi]">
                                        <option selected disabled>Choose...</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </td>
                                <td class="ps-0 pe-0 pt-0 text-left align-middle"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-12 mb-3">
                        <button type="button" class="btn btn-primary" style="margin-left:10px"
                            onclick="addOptionsQc()">
                            <i class="fas fa-plus fa-fw"></i>
                        </button>
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
