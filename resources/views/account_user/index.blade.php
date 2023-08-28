@extends('layouts.content')
@section('body_content')
    <main>
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
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header fw-bolder">Personal Profil</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <table>
                                                <tr>
                                                    <td style="font-weight:600">Name</td>
                                                    <td> : </td>
                                                    <td style="font-weight: 300"> {{ $user->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:600">Email</td>
                                                    <td> : </td>
                                                    <td style="font-weight: 300">{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600">Position</td>
                                                    <td> : </td>
                                                    <td>{{ $user->position->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:600">Divisi</td>
                                                    <td> : </td>
                                                    <td>{{ $user->division->name }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col">
                        <table id="signature_data_table" width="100%"></table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('account_user.modals.edit')
    <script src="/js/AccountUser/_init.js"></script>
    <script src="/js/AccountUser/dt.js"></script>
    <script src="/js/AccountUser/edit.js"></script>
@endsection
