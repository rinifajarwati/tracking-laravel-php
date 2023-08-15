@extends('layouts.main-auth')

@section('body')
    @include('partials.auth-topnav')
    @yield('body_content')

    @include('partials.footer')
@endsection
