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
                        <td class="col-1">Description</td>
                        <td class="col-2">:</td>
                        <td>{{ $description_rma }}</td>
                    </tr>
                    <tr>
                        <td class="col-1">Status Garansi</td>
                        <td class="col-2">:</td>
                        <td>{{ $warranty }}</td>
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
