<div class="modal fade" id="add_new_warehouse_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User Baru</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
            </div>
            <form action="/create-user" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <div class="col-12 mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_name" placeholder="Name user" name="name"
                                value="{{ old('name') }}" maxlength="255" required>

                        </div>
                        <div class="col-12 mb-3">
                            <label>Email</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="add_email" placeholder="Email" name="email"
                                value="{{ old('email') }}" maxlength="255" required>

                        </div>
                        <div class="col-12 mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control @error('description') is-invalid @enderror"
                                id="add_password" placeholder="password" name="password"
                                value="{{ old('password') }}" maxlength="255" required>

                        </div>

                        <div class="col-12 mb-3">
                            <label>Position</label>
                            <select name="position_uid" class="form-control selectpicker @error('position_uid') {{ session('validatorError') === 'add' ? 'is-invalid' : ''}} 
                                @enderror" data-live-search="true" required>
                                <option disabled selected>Select position</option>
                                @foreach ($position as $item)
                                    <option value="{{ $item['uid'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-12 mb-3">
                            <label>Division</label>
                            <select name="division_uid" class="form-control selectpicker @error('division_uid') {{ session('validatorError') === 'add' ? 'is-invalid' : ''}} 
                                @enderror" data-live-search="true" required>
                                <option disabled selected>Select devision</option>
                                @foreach ($devision as $item)
                                    <option value="{{ $item['uid'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-12 mb-3">
                            <label>Foto Tanda Tangan</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file" class="form-control @error('img') is-invalid @enderror"
                                id="add_img" placeholder="img" name="img" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" value="submit" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
