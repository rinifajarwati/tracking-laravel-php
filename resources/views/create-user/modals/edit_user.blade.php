<div class="modal fade" id="edit_user_item_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit item data</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/create-user" method="post" autocomplete="off" id="edit_user_item_form" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="edit_user_item_name"
                            placeholder="Name" name="name" value="{{ old('name') }}">
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="col-6 mb-3 ">
                        <label for="floatingInput">Email</label>
                        <input type="text" class="form-control" id="edit_employee_item_email"
                            placeholder="aa123@gmail.com" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="edit_user_item_division_uid"
                            aria-label="Default select example" name="division_uid">
                        </select>
                        <label for="floatingInput">Division</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="edit_user_item_position_uid"
                            aria-label="Default select example" name="position_uid">
                        </select>
                        <label for="floatingInput">Position</label>
                    </div>
                 
                    <div class="col-12 mb-3">
                        <label>Signature</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" class="form-control @error('img') is-invalid @enderror"
                            id="edit_user_item_img" placeholder="img" name="img">
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
