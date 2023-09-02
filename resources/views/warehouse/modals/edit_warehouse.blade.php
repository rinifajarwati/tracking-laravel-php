<div class="modal fade" id="edit_warehouse_item_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit item file SO gudang</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form
                action="/warehouse/{{ session('validatorError') === 'edit' && session('uid') ? '/' . session('uid') : '' }}"
                method="post" autocomplete="off" id="edit_warehouse_item_form">
                @method('put')
                @csrf
                <div class="modal-body">
                    <table class="table-borderless table mb-0">
                        <tbody id="add_warehouse_tbody">
                            <tr>
                                <td>
                                    <label>Item Description</label>
                                    <input type="text"
                                        class="form-control @error('data[0][item_description]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
                                        value="{{ old('item_description') }}" id="edit_item_description" placeholder="Item Description" name="data[0][item_description]"
                                        maxlength="255" required>
                                </td>
                                <td>
                                    <label>Serial Number</label>
                                    <input type="text"
                                        class="form-control @error('data[0][serial_number]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
                                        value="{{ old('serial_number') }}" id="edit_serial_number" placeholder="Serial Number" name="data[0][serial_number]"
                                        maxlength="255" required>
                                    <input type="hidden" name="data[0][warehouse_uid]">
                                </td>
                                <td>
                                    <label>Weight</label>
                                    <input type="number"
                                        class="form-control @error('data[0][weight]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
                                        value="{{ old('wight') }}" id="edit_weight" placeholder="Weight" name="data[0][weight]" step="0.01" maxlength="255"
                                        required>
                                </td>
                                <td>
                                    <label>Koli</label>
                                    <input type="number"
                                        class="form-control @error('data[0][koli]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
                                        value="{{ old('koli') }}" id="edit_koli" placeholder="Koli" name="data[0][koli]" step="0.01" maxlength="255" required>
                                </td>
                                <td>
                                    <label>GDG</label>
                                    <input type="text"
                                        class="form-control @error('data[0][gdg]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
                                        value="{{ old('gdg') }}" id="edit_gdg" placeholder="GDG" name="data[0][gdg]" maxlength="255" required>
                                </td>
                                <td>
                                    <label>Kubikasi</label>
                                    <input type="number"
                                        class="form-control @error('data[0][kubikasi]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
                                        value="{{ old('kubikasi') }}" id="edit_kubikasi" placeholder="Kubikasi" name="data[0][kubikasi]"
                                        maxlength="255" required>
                                </td>
                                <td class="ps-0 pe-0 pt-0 text-left align-middle"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-12 mb-3">
                        <button type="button" class="btn btn-primary" style="margin-left:10px" onclick="addOptions1()">
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
