@extends('layouts.main')

@section('body')
    @include('partials.topnav')

    <div id="layoutSidenav">
        @include('partials.sidenav')

        <div id="layoutSidenav_content">

            @yield('body_content')

            @include('partials.footer')
        </div>
    </div>
@endsection
