@extends('layouts.content')

@section('body_content')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary  pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                SO Gudang
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
                            List SO Gudang
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
                    <div class="container">
                        @include('partials.alert')
                        <div class="mb-5">
                            @foreach ($iniWarehouse as $data)
                                <table height="100px">
                                    <tr>
                                        <td >Description</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $data->description }}</td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-2">Serial Number </th>
                                        <th class="col-2">Weight</th>
                                        <th class="col-2">Koli</th>
                                        <th class="col-2">GDG</th>
                                        <th class="col-2">Kubikasi</th>
                                        <th class="col-2">Name Gudang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warwhouseSN as $item)
                                        <tr class="item-list text-center">
                                            <td class="col-2">{{ $item['serial_number'] }}</td>
                                            <td class="col-2">{{ $item['weight'] }}</td>
                                            <td class="col-2">{{ $item['koli'] }}</td>
                                            <td class="col-2">{{ $item['gdg'] }}</td>
                                            <td class="col-2">{{ $item['kubikasi'] }}</td>
                                            <td class="col-2">{{ $item->user->name }}</td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
