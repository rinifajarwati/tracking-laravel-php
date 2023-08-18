@extends('layouts.content')

@section('body_content')
<main>
    <header class="page-header page-header-dark  pb-20">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-2">
                        <hr class="mt-0 mb-2" />
        <div class="row">
            <div class="col-lg-15">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Upload Tanda Tangan</div>
                    <div class="card-body">
                        <form action="/signatureuser" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="small mb-1" for="img">Gambar Tanda tangan</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input type="file" class="form-control" required id="img" name="img" onchange="previewImage">
                            </div>
                            <button class="btn btn-primary" value="Upload" type="submit">Save</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</main>

<script src="/js/signature/add.js"></script>
@endsection