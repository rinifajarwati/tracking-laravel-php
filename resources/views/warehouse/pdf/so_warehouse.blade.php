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

            <!-- Receipt patient data -->
            <div class="wrapper patient-data">
                <table class="table-patient-data">
                    <tr>
                        <td class="col-1">Description</td>
                        <td class="col-2">:</td>
                        <td>{{ $description_warehouse }}</td>
                    </tr>
                </table>
            </div>
            <div class="wrapper receipt-details">
                <table class="table-receipt-details">
                    <thead>
                        <tr>
                            <th class="col-2">Serial Number </th>
                            <th class="col-3">Weight</th>
                            <th class="col-3">Koli</th>
                            <th class="col-4">GDG</th>
                            <th class="col-5">Kubikasi</th>
                            <th class="col-5">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warehouseSN as $item)
                            <tr class="item-list">
                                <td class="col-2">{{ $item['serial_number'] }}</td>
                                <td class="col-3">{{ $item['weight'] }}</td>
                                <td class="col-3">{{ $item['koli'] }}</td>
                                <td class="col-4">{{ $item['gdg'] }}</td>
                                <td class="col-5">{{ $item['kubikasi'] }}</td>
                                <td class="col-5">{{$item->user->name  }}</td>
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
                        <td> <img class="signature-img" src="{{ asset($signature_created) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_approved) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_path) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_warehouse) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>
                        <td> <img class="signature-img" src="{{ asset($signature_logistics) }}" alt="Signature"
                                style="width: 100px; height: auto;"> </td>

                    </tr>

                    {{-- Sign Text 2 --}}
                    <tr>
                        <td>{{ $created_name }}</td>
                        <td>{{ $approved_name }}</td>
                        <td>{{ $ppic_name }}</td>
                        <td>{{ $warehouse_name }}</td>
                        <td>{{ $logistics_name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>
