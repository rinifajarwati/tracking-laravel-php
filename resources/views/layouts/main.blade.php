<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title }}</title>

    {{-- Website icon --}}
    <link rel="icon" type="image/x-icon" href="/assets/img/logo_interskala.jpeg" style="height: 7rem" />

    {{-- Important styles --}}
    <link rel="stylesheet" href="/css/datatables.css" />
    <link rel="stylesheet" href="/css/styles.css" />
    <link rel="stylesheet" href="/css/dropdowns.css" />

    {{-- Important scripts --}}
    <script src="/js/scripts.js"></script>

    {{-- Styles & Scripts --}}
    @if (env('APP_ENV') === 'production')
        {{-- Production --}}
        {{-- Styles --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.21.1/dist/bootstrap-table.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/css/jquery.treegrid.min.css">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.21.1/dist/extensions/group-by-v2/bootstrap-table-group-by.min.css">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.bootstrap5.min.css" />
        <link rel="stylesheet" href="https://spin.js.org/spin.css">

        {{-- Icon scripts --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>

        {{-- Preloaded scripts --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.21.1/dist/bootstrap-table.min.js" crossorigin="anonymous">
        </script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.21.1/dist/extensions/treegrid/bootstrap-table-treegrid.min.js"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.21.1/dist/extensions/cookie/bootstrap-table-cookie.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.21.1/dist/extensions/group-by-v2/bootstrap-table-group-by.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/js/jquery.treegrid.min.js" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/currency.js@2.0.4/dist/currency.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jsprintmanager@5.0.2/JSPrintManager.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone.min.js"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>
        <script src="https://spin.js.org/spin.umd.js" crossorigin="anonymous"></script>
    @else
        {{-- Development --}}
        {{-- Styles --}}
        <link rel="stylesheet" href="/main/bootstrap-table@1.21.1/bootstrap-table.min.css">
        <link rel="stylesheet" href="/main/jquery-treegrid@0.3.0/jquery.treegrid.css">
        <link rel="stylesheet" href="/main/bootstrap-table@1.21.1/bootstrap-table-group-by.min.css">
        <link rel="stylesheet" href="/main/bootstrap-select@1.14.0-beta2/bootstrap-select.min.css">
        <link rel="stylesheet" href="/main/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" href="/main/selectize.js@0.15.2/selectize.bootstrap5.min.css" />
        <link rel="stylesheet" href="/main/spin.js/spin.css">
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

        {{-- Icon Scrips --}}
        <script src="/main/feather-icons@4.29.0/feather.min.js"></script>
        <script src="/main/font-awesome@6.3.0/all.min.js"></script>

        {{-- Preloaded scripts --}}
        <script src="/main/jquery/jquery-3.6.0.min.js"></script>
        <script src="/main/bootstrap@5.1.3/bootstrap.bundle.min.js"></script>
        <script src="/main/moment@2.29.4/moment.js"></script>
        <script src="/main/bootstrap-table@1.21.1/bootstrap-table.min.js"></script>
        <script src="/main/bootstrap-table@1.21.1/bootstrap-table-treegrid.min.js"></script>
        <script src="/main/bootstrap-table@1.21.1/bootstrap-table-cookie.min.js"></script>
        <script src="/main/bootstrap-table@1.21.1/bootstrap-table-group-by.min.js"></script>
        <script src="/main/jquery-treegrid@0.3.0/jquery.treegrid.min.js"></script>
        <script src="/main/bootstrap-select@1.14.0-beta2/bootstrap-select.min.js"></script>
        <script src="/main/currency.js@2.0.4/currency.min.js"></script>
        <script src="/main/jsprintmanager@5.0.2/JSPrintManager.js"></script>
        <script src="/main/daterangepicker/daterangepicker.js"></script>
        <script src="/main/moment-timezone@0.5.34/moment-timezone.min.js"></script>
        <script src="/main/selectize.js@0.15.2/selectize.min.js"></script>
        <script src="/main/spin.js/spin.umd.js"></script>
    @endif
</head>

{{-- Important Scripts --}}
<script src="/js/datepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/orgchart@3.8.0/dist/js/jquery.orgchart.min.js"></script>

{{-- Custom styles --}}
<link rel="stylesheet" href="/css/custom_styles.css" />
<link rel="stylesheet" href="/css/custom_selectize.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orgchart@3.8.0/dist/css/jquery.orgchart.min.css">

<body class="nav-fixed">
    @yield('body')
</body>
<script>
    const _APP_URL = {!! '"' . env('APP_URL') . '"' !!}
</script>

</html>
