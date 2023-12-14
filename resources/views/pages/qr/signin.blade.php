@extends('layout.signinqr')
@section('title', 'Home')

@section('content')
    <div class="vh-100 d-flex justify-content-center mx-auto flex-column" style="max-width: 75vw">
        <img src="/assets/img/logo/mlogo.png" class="w-50 mx-auto" alt="Site Logo" />
        <img class="dark-logo" src="/assets/img/logo/mlogo.png" alt="Site Logo" style="display: none;" />
        @if (session('message'))
            &nbsp
            <div class="form-group alert alert-danger" style="background-color: red">
                <h2 class="text-center" style="color:white">{{ session('message') }}. Please re-scan QRCode</h2>
            </div>
        @endif
        @if (session('success'))
            &nbsp
            <div class="form-group alert alert-danger" style="background-color: green">
                <h2 class="text-center" style="color:white">{{ session('success') }}.</h2>
            </div>
        @endif
    </div>

    <style>
    </style>
@endsection
