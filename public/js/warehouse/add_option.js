var index = 2;

function addOptions1() {
    var newElm = `
    <tr data-index=${index}>
        <td>
            <label>Item Description</label>
            <input type="text" class="form-control @error('data[0][item_description]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
            id="add_item_description" placeholder="Item Description" name="data[${index}][item_description]"
            maxlength="255" required>
        </td>
        <td>
            <label>Serial Number</label>
            <input type="text" class="form-control @error('data[0][serial_number]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror"
            id="add_serial_number" placeholder="Serial Number" name="data[${index}][serial_number]"
            maxlength="255" required>
        </td>
        <td>
            <label>Weight</label>
            <input type="number" class="form-control @error('data[0][weight]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror" 
            id="add_weight" placeholder="Weight" name="data[${index}][weight]" step="0.01"
            maxlenght="255" required>
        </td>
        <td>
            <label>Koli</label>
            <input type="number" class="form-control @error('data[0][koli]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror" 
            id="add_koli" placeholder="Koli" name="data[${index}][koli]" step="0.01"
            maxlenght="255" required>
        </td>
        <td>
            <label>GDG</label>
            <input type="text" class="form-control @error('data[0][gdg]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror" 
            id="add_gdg" placeholder="GDG" name="data[${index}][gdg]"
            maxlenght="255" required>
        </td>
        <td>
            <label>Kubikasi</label>
            <input type="number" class="form-control @error('data[0][kubikasi]') {{ session('validatorError') === 'add' ? 'is-invalid' : '' }} @enderror" 
            id="add_kubikasi" placeholder="Kubikasi" name="data[${index}][kubikasi]"
            maxlenght="255" required>
        </td>
        <td class="ps-0 pe-0 text-left align-middle">
            <button type="button" class="btn btn-danger col-auto" onclick="deleteOption(${index})" style="margin-top:24px">
                <i class="fas fa-trash fa-fw"></i>
            </button>
        </td>
    </tr>`;
    addWarehoseDataOptionsTbody.append(newElm);
    index++;
}

function deleteOption(index) {
    $(`tr[data-index=${index}]`).remove();
}
