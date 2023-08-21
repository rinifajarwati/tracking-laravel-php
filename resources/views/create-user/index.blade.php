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
                    <div class="col">
                        <div class="card-header mt-5 fw-bolder">Data login User</div>
                        <table id="signature_data_table" width="100%"></table>
                    </div>  
                </div>
            </div>
            
            <div class="card-body">
                    <button
                        class="btn btn-success btn-xl btn-icon position-fixed end-0 me-5 lift floating-button bottom-0 mb-5"
                        type="button" data-bs-toggle="modal" data-bs-target="#add_new_warehouse_modal">
                        <i class="fas fa-plus fa-fw"></i>
                    </button>
            </div>
        </div>
    </main>

    @include('create-user.modals.create')
    <script src="/js/CreateUser/_init.js"></script>
    <script src="/js/CreateUser/dt.js"></script>
    <script src="/js/CreateUser/edit.js"></script>

@endsection
