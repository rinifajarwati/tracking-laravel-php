@extends('layouts.content')

@section('body_content')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"> <i class="fa-solid fa-users-between-lines"></i></div>
                                Account User
                            </h1>
                            <div class="page-header-subtitle">Example dashboard overview and content summary
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl mt-n10 px-4">
            <div class="card mb-4">
                <div class="card-header py-2">
                    <div class="row">
                        <div class="me-auto col-auto my-auto">
                            List User
                        </div>
                        <div class="ms-auto col-auto">
                            <div class="dropdown no-caret">
                                <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton"
                                    type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-vertical fa-fw"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end animated--fade-in-up">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="dropdown-header">Export:</h6>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#download_stocks_report_modal">
                                                <div class="dropdown-item-icon">
                                                    <i class="far fa-file-excel fa-fw"></i>
                                                </div>
                                                Export to Excel
                                            </button>
                                        </div>

                                        <div class="col-12">
                                            <h6 class="dropdown-header mt-3">Filter Activity:</h6>
                                            <a class="dropdown-item" href="#!">
                                                <span class="badge bg-green-soft text-green my-1">Something</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('partials.alert')
                    <button
                        class="btn btn-success btn-xl btn-icon position-fixed end-0 me-5 lift floating-button bottom-0 mb-5"
                        type="button" data-bs-toggle="modal" data-bs-target="#add_new_division_modal">
                        <i class="fas fa-plus fa-fw"></i>
                    </button>
                    <div class="card-body">
                        <div class="col">
                            <table id="signature_data_table" width="100%"></table>
                        </div>  
                    </div>

                    <div class="container">
                        <button
                        class="btn btn-success btn-xl btn-icon position-fixed end-0 me-5 lift floating-button bottom-0 mb-5"
                        type="button" data-bs-toggle="modal" data-bs-target="#add_new_warehouse_modal">
                        <i class="fas fa-plus fa-fw"></i>
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('create-user.modals.create')
    @include('create-user.modals.delete_user')
    @include('create-user.modals.edit_user')

    <script src="/js/CreateUser/_init.js"></script>
    <script src="/js/CreateUser/dt.js"></script>
    <script src="/js/CreateUser/delete.js"></script>
    <script src="/js/CreateUser/edit.js"></script>
    <script src="/js/functions/spinner.js"></script>
    <script src="/js/functions/divisions.js"></script>
    <script src="/js/functions/positions.js"></script>
@endsection

