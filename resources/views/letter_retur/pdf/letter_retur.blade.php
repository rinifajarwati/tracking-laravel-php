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

            <!-- Receipt signature -->
            <div class="wrapper">

                <table class="table">
                    {{-- Sign Text 1 --}}
                    <tr>
                        <td>Jakarta</td>
                        <td>Jakarta</td>
                        <td>Jakarta</td>
                        <td>Jakarta</td>
                    </tr>
                    {{-- Sign Text 2 --}}
                    <tr>
                        <td>Dibuat Oleh,</td>
                        <td>Gudang,</td>
                        <td>Marketing,</td>
                        <td>Mengetahui,</td>
                    </tr>

                    {{-- Signature --}}
                    <tr>
                        <td> <img class="signature-img" src="{{ asset($signature_sales) }}" alt="Signature"
                            style="width: 100px; height: auto;"> </td>
                    <td> <img class="signature-img" src="{{ asset($signature_warehouse) }}" alt="Signature"
                            style="width: 100px; height: auto;"> </td>
                    <td> <img class="signature-img" src="{{ asset($signature_marketing) }}" alt="Signature"
                            style="width: 100px; height: auto;"> </td>
                    <td> <img class="signature-img" src="{{ asset($signature_scm) }}" alt="Signature"
                            style="width: 100px; height: auto;"> </td>
                    </tr>

                    {{-- Sign Text 2 --}}
                    <tr>
                        <td>{{ $sales_name }}</td>
                        <td>{{ $warehouse_name }}</td>
                        <td>{{ $marketing_name }}</td>
                        <td>{{ $scm_name }}</td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>
