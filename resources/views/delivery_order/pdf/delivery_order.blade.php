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
                        <td class="col-1">Number SO</td>
                        <td class="col-2">:</td>
                        <td>{{ $no_so_do }}</td>
                    </tr>
                    <tr>
                        <td class="col-1">number SJ</td>
                        <td class="col-2">:</td>
                        <td>{{ $no_sj_do }}</td>
                    </tr>
                    <tr>
                        <td class="col-1">Description</td>
                        <td class="col-2">:</td>
                        <td>{{ $description_do }}</td>
                    </tr>
                    <tr>
                        <td class="col-1">No Resi</td>
                        <td class="col-2">:</td>
                        <td>{{ $no_resi_do }}</td>
                    </tr>
                    <tr>
                        <td class="col-1">Jasa Ekspedisi</td>
                        <td class="col-2">:</td>
                        <td>{{ $jasa_ekspedisi_do }}</td>
                    </tr>

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
                        <td>Jakarta</td>
                        <td>Jakarta</td>
                    </tr>
                    {{-- Sign Text 2 --}}
                    <tr>
                        <td>Dibuat Oleh,</td>
                        <td>Hormat Kami,</td>
                        <td>Qc,</td>
                        <td>Dikirim Oleh,</td>
                        <td>Customer,</td>
                    </tr>

                    {{-- Signature --}}
                    <tr>
                        <td> <img class="signature-img" src="{{ asset($signature_sales) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_logistics_coor) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_qc) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_logistics) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>
                        <td> </td>
                    </tr>

                      {{-- Sign Text 2 --}}
                      <tr>
                        <td>{{ $sales_name }}</td>
                        <td>{{ $logistics_coor }}</td>
                        <td>{{ $qc_name }}</td>
                        <td>{{ $logistics_name }}</td>
                        <td>{{ $customer_name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>
