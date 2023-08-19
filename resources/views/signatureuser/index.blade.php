

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/style/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
<body>
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
        <script>
            function previewImage() {
                const img = document.querySelector('#img');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(img.file[0]);

                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
    </main>
    <main>
        <header class="page-header page-header-dark pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header">Data User</div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Posisi</th>
                                <th>Devisi</th>
                                <th>Tanda tangan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Posisi</th>
                                <th>Devisi</th>
                                <th>Tanda tangan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- @foreach ($users as $user);
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->position_uid }}</td>
                                <td>{{ $user->division_uid }}</td>
                                <td>{{ $user->img }}</td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="/javascript/scripts.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
            <script src="/js/datatables/datatables-simple-demo.js"></script>
            <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
    
@endsection
</body>
</html>