var index = 2;

function addOptionsQc() {
    var newElm = `
    <tr data-index=${index}>
        <td>
            <label>Kelengkapan</label>
            <input type="text" class="form-control @error('data[0][kelengkapan]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
            id="add_kelengkapan" placeholder="Kelengkapan" name="data[${index}][kelengkapan]"
            maxlength="255" required>
        </td>
        <td>
            <label>Qty</label>
            <input type="text" class="form-control @error('data[0][qty]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
            id="add_qty" placeholder="Qty" name="data[${index}][qty]"
            maxlength="255" required>
        </td>
        <td>
            <label>Tidak Ada</label>
            <input type="text" class="form-control @error('data[0][no]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror" 
            id="add_no" placeholder="Tidak Ada" name="data[${index}][no]"
            maxlenght="255">
        </td>
        <td>
            <label>Ada</label>
            <input type=text" class="form-control @error('data[0][yes]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror" 
            id="add_yes" placeholder="Ada" name="data[${index}][yes]"
            maxlenght="255">
        </td>
        <td>
            <label>Fungsi</label>
            <select class="form-select" id="add_fungsi" name="data[${index}][fungsi]" >
                <option selected>Choose...</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </td>
        <td class="ps-0 pe-0 text-left align-middle">
            <button type="button" class="btn btn-danger col-auto" onclick="deleteOptionQc(${index})" style="margin-top:24px">
                <i class="fas fa-trash fa-fw"></i>
            </button>
        </td>
    </tr>`;
    addRmaQcDataOptionsTbody.append(newElm);
    index++;
}

function deleteOptionQc(index) {
    $(`tr[data-index=${index}]`).remove();
}
