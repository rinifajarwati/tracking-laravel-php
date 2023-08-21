@extends('layouts.content')
@section('body_content')
    <main>
        <header class="page-header-dark bg-gradient-primary-to-secondary pb-10">
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon me-4">
                                        <i class="fas fa-handshake-simple fa-fw"></i>
                                    </div>
                                    Account User 
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        <div class="container-xl mt-n10 px-4">
            <div class="card mb-4">
                <div class="card-header">
                    User
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header fw-bolder">
                                        Profil
                                    </div>
                                    <div class="card-body text-center">
                                        <img src="" alt="" style="width: 250px; height: auto;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header fw-bolder">Personal Profil</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <table>
                                                <tr>
                                                    <td style="font-weight:600">Name</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
