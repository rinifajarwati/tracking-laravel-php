@extends('layouts.content')

@section('body_content')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Surat Retur
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
                            List Surat Retur
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
                    @if (auth()->user()->division_uid === 'technician' && auth()->user()->position_uid === 'admin')
                        <button
                            class="btn btn-success btn-xl btn-icon position-fixed end-0 me-5 lift floating-button bottom-0 mb-5"
                            type="button" data-bs-toggle="modal" data-bs-target="#add_new_letter_retur_modal">
                            <i class="fas fa-plus fa-fw"></i>
                        </button>
                    @endif

                    <div class="container">
                        @include('partials.alert')

                        <table class="table small" width="100%" id="letter_retur_list_data_table"></table>
                    </div>
                </div>
            </div>
        </div>
    </main>


    @include('letter_retur.modals.add_new_letter_retur')
    @include('letter_retur.modals.approval_warehouse_letter_retur')
    @include('letter_retur.modals.approval_marketing_letter_retur')
    @include('letter_retur.modals.approval_ppic_marketing_letter_retur')
    @include('letter_retur.modals.approval_finish_letter_retur')
    @include('letter_retur.modals.approval_finance')
    @include('letter_retur.modals.edit_letter_retur')

    <script src="/js/letter_retur/_init.js"></script>
    <script src="/js/letter_retur/pdf.js"></script>
    <script src="/js/functions/spinner.js"></script>

    <script>
        const auth_position = {!! json_encode($auth_position, JSON_HEX_TAG) !!}
    </script>
    <script>
        const auth_division = {!! json_encode($auth_division, JSON_HEX_TAG) !!}
    </script>
    @if (auth()->user()->division_uid === 'technician')
        <script src="/js/letter_retur/dt.js"></script>
        <script src="/js/letter_retur/finish/approval-finish.js"></script>
    @elseif(auth()->user()->division_uid === 'warehouse')
        <script src="/js/letter_retur/dt-warehouse.js"></script>
        <script src="/js/letter_retur/approval-warehouse.js"></script>
    @elseif(auth()->user()->division_uid === 'sales')
        <script src="/js/letter_retur/dt-marketing.js"></script>
        <script src="/js/letter_retur/approval-marketing.js"></script>
        <script src="/js/letter_retur/edit.js"></script>
    @elseif(auth()->user()->division_uid === 'scm')
        <script src="/js/letter_retur/dt-marketing.js"></script>
        <script src="/js/letter_retur/approval-ppic-marketing.js"></script>
    @elseif(auth()->user()->division_uid === 'finance')
        <script src="/js/letter_retur/dt.js"></script>
        <script src="/js/letter_retur/finish/approval-finance.js"></script>
        <script src="/js/letter_retur/edit.js"></script>
    @endif
@endsection
