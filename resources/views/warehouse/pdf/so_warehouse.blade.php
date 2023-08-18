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
                        <td>Jakarta</td>
                    </tr>
                    {{-- Sign Text 2 --}}
                    <tr>
                        <td>Dibuat Oleh,</td>
                        <td>Disetujui Oleh,</td>
                        <td>PPIC,</td>
                        <td>Warehouse,</td>
                        <td>Logistics,</td>
                    </tr>

                    {{-- Signature --}}
                    
                    <tr>
                        <td> <img class="signature-img" src="{{ asset($signature_created) }}" alt="Signature" style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_approved) }}" alt="Signature" style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_path) }}" alt="Signature" style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_warehouse) }}" alt="Signature" style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_logistics) }}" alt="Signature" style="width: 100px; height: auto;"> </td>

                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>
