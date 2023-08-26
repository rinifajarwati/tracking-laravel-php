<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signature | imi-tracking</title>
    <link rel="stylesheet" href="css/custom_purchase_request_form.css">
</head>
<body>
    <main>
        <div class="container">
            <div class="wrapper">
                <table class="table">
                    <tr>
                        <td>Jakarta</td>
                        <td>Jakarta</td>
                    </tr>
                    {{-- sign text 2 --}}
                    <tr>
                        <td>Dibuat Oleh,</td>
                        <td>Disetuji Oleh,</td>
                    </tr>

                    {{-- signature --}}
                    <tr>
                        <td><img src="{{ asset($signature_created) }}" alt="Signature" class="signature-img"
                                style="width: 100px; height: auto;"></td>
                        <td><img src="{{ asset($signature_adminsales) }}" alt="Signature" class="signature-img"
                                style="width: 100px; height: auto;"></td>
                        <td><img src="{{ asset($signature_sales) }}" alt="Signature" class="signature-img"
                                style="width: 100px; height: auto;"></td>
                    </tr>

                    <tr>
                        <td>{{ $adminsales_name }}</td>
                        <td>{{ $sales_name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>