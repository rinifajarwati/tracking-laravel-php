<div class="modal fade" id="edit_letter_retur_item_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit item file Surat Retur</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form
                action="/letter-retur/{{ session('validatorError') === 'edit' && session('uid') ? '/' . session('uid') : '' }}"
                method="post" autocomplete="off" id="edit_letter_retur_item_form" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                    @if(auth()->user()->division_uid === 'sales')
                    <div class="col-12 mb-3">
                        <label for="information">Information</label>
                        <input type="text" class="form-control" id="edit_information"
                        placeholder="Information" name="information" value="{{ old('information') }}">
                    </div>
                    @elseif (auth()->user()->division_uid === 'finance')
                    <div class="col-12 mb-3">
                        <label for="information">No Surat Retur</label>
                        <input type="text" class="form-control" id="edit_no_sr"
                        placeholder="No Surat Retur" name="no_sr" value="{{ old('no_sr') }}">
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
