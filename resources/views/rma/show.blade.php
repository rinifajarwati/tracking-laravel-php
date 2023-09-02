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
                                Surat Perintah Kerja
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
                            List detail
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
                            @foreach ($rma as $data)
                                <table height="100px">
                                    <tr>
                                        <td>No SPK</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $data['no_spk']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Serial Number</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $data['no_sn']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Garansi</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $data['warranty']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kerusakan</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $data['kerusakan']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Perbaikkan</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $data['perbaikkan']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td class="col-1">:</td>
                                        <td>{{ $data['description'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name Teknisi</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $data['name_teknisi']['name'] }}</td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                        <div class="mb-5">
                            @foreach ($rmaType as $item)
                                <table height="100px">
                                    <tr>
                                        <td>Type</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $item['type']}}</td>
                                    </tr>
                                    <tr>
                                        <td>SN</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $item['sn']}}</td>
                                    </tr>
                                    <tr>
                                        <td>No. SPK</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $item['no_spk']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td class="col-1">:</td>
                                        <td >{{ $item['tgl']}}</td>
                                    </tr>
                                </table>
                            @endforeach
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th class="col-1">No</th>
                                        <th class="col-2">Kelengkapan </th>
                                        <th class="col-3">Qty</th>
                                        <th class="col-4">Tidak Ada</th>
                                        <th class="col-4">Ada</th>
                                        <th class="col-4">Fungsi</th>
                                      </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rmaQc as $qc)
                                    <tr class="item-list text-center">
                                        <td class="col-1">{{ $loop->iteration }}</td>
                                        <td class="col-2">{{$qc['kelengkapan'] }}</td>
                                        <td class="col-3">{{$qc['qty'] }}</td>
                                        <td class="col-3">{{$qc['no'] }}</td>
                                        <td class="col-3">{{$qc['yes'] }}</td>
                                        <td class="col-3">{{$qc['fungsi'] }}</td>
                                    </tr>
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
