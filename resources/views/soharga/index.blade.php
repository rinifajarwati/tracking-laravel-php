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
                                SO Harga
                            </h1>
                            <div class="page-header-subtitle">
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
                            List SO Harga
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
                    @if (auth()->user()->division_uid === 'sales' && auth()->user()->position_uid === 'admin')
                        <button
                            class="btn btn-primary btn-xl btn-icon position-fixed end-0 me-5 lift floating-button bottom-0 mb-5"
                            type="button" data-bs-toggle="modal" data-bs-target="#add_new_soharga_modal">
                            <i class="fas fa-plus fa-fw"></i>
                        </button>
                    @endif
                    <div class="container">
                        @include('partials.alert')

                        <table class="table small" width="100%" id="soharga_list_data_table"></table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('soharga.modals.add_new_soharga')
    @include('soharga.modals.sales')
    @include('soharga.modals.adminsales')

    <script src="/js/soharga/_init.js"></script>
    <script src="/js/soharga/pdf.js"></script>
    <script src="/js/functions/spinner.js"></script>

    @if (auth()->user()->division_uid === 'sales' && auth()->user()->position_uid === 'staff')
        <script src="/js/soharga/dt-sales.js"></script>
        {{-- <script src="/js/soharga/approval.js"></script> --}}
        <script src="/js/soharga/approval-sales.js"></script>

    @elseif(auth()->user()->division_uid === 'sales' && auth()->user()->position_uid === 'admin')
        <script src="/js/soharga/approval-adminsales.js"></script>
        <script src="/js/soharga/dt-adminsales.js"></script>
    @endif
@endsection
