<!DOCTYPE html>
<html lang="en" style="margin: 0px; height:100%; overflow:hidden">

@include('partial.headqr')

<body style="margin: 0px; height:100%; overflow:hidden">
@include('partial.headerqr')

@yield('content')

{{-- @include('partial.footer') --}}

@include('partial.js')
</body>

</html>
