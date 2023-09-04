<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <link rel="stylesheet" href="css/custom_purchase_request_form.css">
</head>

<body>
    <main>
        <div class="container">
            <div class="wrapper patient-data">
                <table class="table-patient-data">
                    <tr>
                        <td class="col-1">No SPK</td>
                        <td class="col-2">:</td>
                        <td>{{ $no_spk_rma }}</td>
                    </tr>
                    <tr>
                        <td class="col-1">Serial Number</td>
                        <td class="col-2">:</td>
                        <td>{{ $no_sn_rma }}</td>
                    </tr>
                    <tr>
                        <td class="col-1">Description</td>
                        <td class="col-2">:</td>
                        <td>{{ $description_rma }}</td>
                    </tr>
                    <tr>
                        <td class="col-1">Kerusakan</td>
                        <td class="col-2">:</td>
                        <td>{{ $kerusakan_rma }}</td>
                    </tr>
                    <tr>
                        <td class="col-1">Perbaikkan</td>
                        <td class="col-2">:</td>
                        <td>{{ $perbaikkan_rma }}</td>
                    </tr>
                    <tr>
                        <td class="col-1">Status Garansi</td>
                        <td class="col-2">:</td>
                        <td>{{ $warranty }}</td>
                    </tr>
         
                    @foreach ($rmaTypes as $item)
                        <tr>
                            <td class="col-2">Serial Number </td>
                            <td class="col-2">:</td>
                            <td class="col-2">{{ $item['sn'] }}</td>
                        </tr>
                        <tr>
                            <td class="col-2">Type </td>
                            <td class="col-2">:</td>
                            <td class="col-2">{{ $item['type'] }}</td>
                        </tr>
                        <tr>
                            <td class="col-2">Date </td>
                            <td class="col-2">:</td>
                            <td class="col-2">{{ $item['tgl'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="wrapper receipt-details">
                <table class="table-receipt-details">
                    <thead>
                        <tr>
                            <th class="col-2">Kelengkapan </th>
                            <th class="col-2">Qty </th>
                            <th class="col-3">Tidak Ada</th>
                            <th class="col-3">Ada</th>
                            <th class="col-4">Fungsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rmaQc as $qc)
                            <tr class="item-list">
                                <td class="col-2">{{ $qc['kelengkapan'] }}</td>
                                <td class="col-2">{{ $qc['qty'] }}</td>
                                <td class="col-3">{{ $qc['no'] }}</td>
                                <td class="col-3">{{ $qc['yes'] }}</td>
                                <td class="col-4">{{ $qc['fungsi'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Receipt signature -->
            <div class="wrapper">

                <table class="table">
                    {{-- Sign Text 1 --}}
                    <tr>
                        <td>Jakarta</td>
                        <td>Jakarta</td>
                        <td>Jakarta</td>
                    </tr>
                    {{-- Sign Text 2 --}}
                    <tr>
                        <td>Prepared By</td>
                        <td>Teknisi</td>
                        <td>Qc,</td>
                    </tr>

                    {{-- Signature --}}
                    <tr>
                        <td> <img class="signature-img" src="{{ asset($signature_sales) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_technician) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_qc) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>

                    </tr>

                    {{-- Sign Text 2 --}}
                    <tr>
                        <td>{{ $sales_name }}</td>
                        <td>{{ $technician_name }}</td>
                        <td>{{ $qc_name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>
